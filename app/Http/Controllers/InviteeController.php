<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInviteeRequest;
use App\Http\Requests\UpdateInviteeRequest;
use App\Http\Resources\InviteeResource;
use App\Http\Resources\ShowOrdersResource;
use App\Models\Invitation;
use App\Models\Invitee;
use App\Models\QR;
use App\Models\Reception;
use App\Services\WhatsAppDesignerFinishingService;
use App\Statuses\InvitationTypes;
use App\Statuses\InviteeTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InviteeController extends Controller
{
    private $url;

    private $token;

    public function __construct()
    {
        $this->url = env('WHATSAPP_API_URL_SEND_TEMPLATE_MESSAGES');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function sendWhatsAppMessages(array $invitees, $image, $whatsApp_template)
    {
        $receivers = [];
        $validInvitees = [];
        $invalidNumbers = [];

        foreach ($invitees as $invitee) {
            $receivers[] = [
                'whatsappNumber' => $invitee['phone'],
                'customParams' => [
                    ['name' => 'product_image_url', 'value' => $image],
                    ['name' => 'nice_sentence', 'value' => $whatsApp_template],
                    ['name' => 'name', 'value' => $invitee['name']],
                    ['name' => '1', 'value' => $invitee['link']],
                ],
            ];
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'template_name' => 'ar7ebo_invitation_bz',
            'broadcast_name' => 'ar7ebo_invitation_bz',
            'receivers' => $receivers,
        ]);

        // Parse response
        $responseData = $response->json();
        foreach ($responseData['receivers'] as $index => $receiver) {
            if ($receiver['isValidWhatsAppNumber']) {
                // إذا كان الرقم صالحًا، أضفه إلى قائمة الأشخاص الصالحين
                $validInvitees[] = $invitees[$index];
            } else {
                // أضف الأرقام غير الصالحة إلى مصفوفة الأرقام غير الصالحة
                $invalidNumbers[] = [
                    'phone' => $invitees[$index]['phone'],
                    'name' => $invitees[$index]['name'],
                ];
            }
        }

        return [
            'validInvitees' => $validInvitees,
            'invalidNumbers' => $invalidNumbers,
            'whatsAppResponse' => $responseData,
        ];
    }

    public function index(Request $request)
    {
        if ($request->status == InviteeTypes::invited) {
            $invitee = Invitee::where('invitation_id', $request->invitation_id)->get();

            return InviteeResource::collection($invitee);
        } else {
            $invitee = Invitee::where('status', $request->status)
                ->where('invitation_id', $request->invitation_id)
                ->get();

            return InviteeResource::collection($invitee);
        }
    }

    public function getInviteeToUpdate($invitationID)
    {
        $invitation = Invitation::find($invitationID);
        $invitees = $invitation->invitee()
            ->where(function ($query) {
                $query->where('status', InviteeTypes::confirmed)
                    ->orWhere('status', InviteeTypes::waiting);
            })
            ->get();

        return InviteeResource::collection($invitees);
    }

    public function updateInvitee(UpdateInviteeRequest $request)
    {
        DB::beginTransaction();

        try {
            $invitee = Invitee::find($request->invitee_id);
            $old_number_of_people = $invitee->number_of_people;
            $new_number_of_people = $request->number_of_people - $old_number_of_people;

            if (! $invitee) {
                return response()->json(['message' => 'Invitee not found'], 404);
            }

            $invitation = $invitee->invitation;

            $invitee->update([
                'number_of_people' => $request->number_of_people,
            ]);

            $qr = QR::where('invitee_id', $invitee->id)->first();

            if (! $qr) {
                return response()->json(['message' => 'Not found'], 404);
            }

            $qr->update([
                'number_of_people_without_decrease' => $request->number_of_people,
                'number_of_people' => $request->number_of_people,
            ]);

            if ($new_number_of_people > $invitation->number_of_invitees + $invitation->additional_package + $invitation->number_of_compensation) {
                DB::rollBack();

                return response()->json(['message' => 'You have reached the maximum number of invitees allowed'], 422);
            }

            for ($i = 0; $i < $new_number_of_people; $i++) {
                if ($invitation->number_of_invitees > 0) {
                    $invitation->number_of_invitees -= 1;
                } elseif ($invitation->additional_package > 0) {
                    $invitation->additional_package -= 1;
                } elseif ($invitation->number_of_compensation > 0) {
                    $invitation->number_of_compensation -= 1;
                }
            }

            $invitation->save();

            DB::commit();

            return response()->json(['message' => 'Updated Successfully']);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'Update failed: '.$e->getMessage()], 500);
        }
    }

    public function generateQRCodeForInvitee($inviteeId)
    {
        $invitee = Invitee::find($inviteeId);
        $invitation = $invitee->invitation()->where('is_with_qr', 1)->first();
        if ($invitation) {
            $numberOfPeople = $invitee->number_of_people;
            $qrCodeData = json_encode([
                'InviteeName' => $invitee->name,
                'InviteeID' => $invitee->id,
            ]);
            $qrCode = QrCode::format('svg')
                ->size(300)
                ->generate($qrCodeData);
            $fileName = '/qr-codes/'.$invitee->id.'.svg';
            $path = storage_path('app/public/'.$fileName);
            if (! file_exists(dirname($path))) {
                mkdir(dirname($path), 0755, true);
            }
            file_put_contents($path, $qrCode);
            QR::create([
                'invitee_id' => $invitee->id,
                'qr_code' => '/storage'.$fileName,
                'number_of_people_without_decrease' => $numberOfPeople,
                'number_of_people' => $numberOfPeople,
            ]);
        }
    }

    private function processInvitationImage($imagePath)
    {
        // Strip the /var/www/html/dev1/public/ part from the image path
        $publicDir = public_path();
        $relativeImagePath = str_replace($publicDir, '', $imagePath);

        // Correct the path to ensure it's relative
        $fullImagePath = $publicDir.$relativeImagePath;

        if (file_exists($fullImagePath)) {
            $imageExtension = strtolower(pathinfo($fullImagePath, PATHINFO_EXTENSION));

            if ($imageExtension === 'png' || $imageExtension === 'jpg') {
                return $relativeImagePath;  // Return relative path for PNG
            } elseif ($imageExtension === 'webp') {
                // Extract the file name without extension and prepare the PNG path
                $fileName = pathinfo($relativeImagePath, PATHINFO_FILENAME);
                $newPngFileName = $fileName.'.png';
                $tempPngPath = '/temp/'.$newPngFileName;

                // If it's a WEBP image, convert it to PNG
                $webpImage = imagecreatefromwebp($fullImagePath);
                $tempFullPngPath = $publicDir.$tempPngPath;
                imagepng($webpImage, $tempFullPngPath);  // Save as PNG
                imagedestroy($webpImage);

                return $tempPngPath;
            } else {
                throw new \Exception('Unsupported image format.');
            }
        }

        throw new \Exception('Image file not found.');
    }

    /// Api For Flutter
    public function addInvitees(StoreInviteeRequest $request)
    {
        DB::beginTransaction();
        try {
            $invitation = Invitation::find($request->invitation_id);
            $reception = Reception::where('invitation_id', $invitation->id)
                ->where('user_id', auth()->user()->id)
                ->first();

            $inviteesData = $request->input('invitees', []);
            $totalCount = array_sum(array_column($inviteesData, 'count'));

            if ($reception && $reception->type == 2) {
                if ($reception->number_can_invite < $totalCount) {
                    DB::rollBack();

                    return response()->json([
                        'message' => 'لقد تجاوزت العدد المسموح به للمدعوين بالنسبة للداعي الإضافي.',
                        'number_can_invite' => $reception->number_can_invite,
                    ]);
                }
            } else {
                $number_of_people = $invitation->invitee()->sum('number_of_people');
                $number_of_additional_package = $invitation->additional_package;
                $number_can_invitee_new = $invitation->number_of_invitees;
                $number_of_compensation = floor($invitation->number_of_compensation);

                if ($number_can_invitee_new + $number_of_compensation + $number_of_additional_package < $totalCount) {
                    DB::rollBack();

                    return response()->json([
                        'message' => 'لقد تجاوزت العدد المسموح به للمدعوين بالنسبة للداعي النظامي.',
                        'number_of_people' => $number_of_people,
                    ]);
                }
            }

            $storedInvitees = collect();
            foreach ($inviteesData as $invitee) {
                $uuid = Str::uuid();
                $newInvitee = Invitee::create([
                    'name' => $invitee['name'],
                    'phone' => $invitee['number'],
                    'number_of_people' => $invitee['count'],
                    'invitation_id' => $request->input('invitation_id'),
                    'uuid' => $uuid,
                ]);
                $newInvitee->update([
                    'link' => 'invitation-card/'.$newInvitee->id.'?uuid='.$uuid,
                ]);
                $storedInvitees->push($newInvitee);
                $this->generateQRCodeForInvitee($newInvitee->id);
            }

            $inviteesForWhatsapp = $storedInvitees->map(function ($invitee) {
                return [
                    'phone' => $invitee->phone,
                    'name' => $invitee->name,
                    'link' => $invitee->link,
                    'count' => $invitee->number_of_people,
                ];
            });

            $imagePath = $invitation->image;
            $tempPngPath = $this->processInvitationImage($imagePath);
            $whatsApp_template = $this->whatsApp_template($invitation->id);
            $whatsAppResponse = $this->sendWhatsAppMessages($inviteesForWhatsapp->toArray(), url($tempPngPath), $whatsApp_template);
            File::delete($tempPngPath);

            $validInviteesData = collect($whatsAppResponse['validInvitees'])->mapWithKeys(function ($validInvitee) {
                return [$validInvitee['phone'] => $validInvitee['count']];
            });

            // حذف المدعوين غير الصالحين بناءً على الرد من واتساب
            $invalidInvitees = collect($whatsAppResponse['invalidNumbers'])->pluck('phone');
            if ($invalidInvitees->isNotEmpty()) {
                $inviteesToDelete = Invitee::whereIn('phone', $invalidInvitees->toArray())->get();

                $inviteeIds = $inviteesToDelete->pluck('id');

                Invitee::whereIn('id', $inviteeIds)->delete();

                QR::whereIn('invitee_id', $inviteeIds)->delete();
            }
            $validInviteesCount = $validInviteesData->sum();

            if ($reception && $reception->type == 2) {
                $reception->number_can_invite -= $validInviteesCount;
                $reception->save();
            } else {
                for ($i = 0; $i < $validInviteesCount; $i++) {
                    if ($invitation->number_of_invitees > 0) {
                        $invitation->number_of_invitees -= 1;
                    } elseif ($invitation->additional_package > 0) {
                        $invitation->additional_package -= 1;
                    } elseif ($invitation->number_of_compensation > 0) {
                        $invitation->number_of_compensation -= 1;
                    }
                }
            }

            $invitation->save();

            DB::commit();

            if ($validInviteesCount > 0 && $invalidInvitees->isEmpty()) {
                return response()->json([
                    'message' => 'تم إضافة المدعوين وإرسال الرسائل بنجاح. جميع الأرقام كانت صالحة.',
                    'whatsapp_response' => $whatsAppResponse,
                ]);
            } elseif ($validInviteesCount > 0 && $invalidInvitees->isNotEmpty()) {
                return response()->json([
                    'message' => 'تم إضافة المدعوين وإرسال الرسائل بنجاح. بعض الأرقام كانت غير صالحة.',
                    //                    'valid_invitees_count' => $validInviteesCount,
                    //                    'invalid_numbers' => $invalidInvitees->toArray(),
                    'whatsapp_response' => $whatsAppResponse,
                ]);
            } else {
                return response()->json([
                    'message' => 'لم يتم إرسال الرسائل. جميع الأرقام كانت غير صالحة.',
                    //                    'invalid_numbers' => $invalidInvitees->toArray(),
                    'whatsapp_response' => $whatsAppResponse,
                ], 422);
            }
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'حدث خطأ أثناء معالجة الطلب.',
                'err' => $e->getMessage(),
            ], 500);
        }
    }

    //// Api For Support
    public function store(StoreInviteeRequest $request)
    {
        DB::beginTransaction();
        try {
            $invitation = Invitation::find($request->invitation_id);

            $imagePath = $invitation->image;
            $message = $invitation->text_message;
            if ($imagePath == null) {
                DB::rollBack();

                return response()->json(['message' => 'You must add a picture'], 422);
            }

            $inviteesData = $request->input('invitees', []);
            $totalCount = array_sum(array_column($inviteesData, 'count'));

            $number_of_people = $invitation->invitee()->sum('number_of_people');
            $number_of_additional_package = $invitation->additional_package;
            $number_can_invitee_new = $invitation->number_of_invitees;
            $number_of_compensation = floor($invitation->number_of_compensation);

            if ($number_can_invitee_new + $number_of_compensation + $number_of_additional_package < $totalCount) {
                DB::rollBack();

                return response()->json([
                    'message' => 'لقد تجاوزت العدد المسموح به للمدعوين بالنسبة للداعي النظامي.',
                    'number_of_people' => $number_of_people,
                ]);
            }

            $storedInvitees = collect();
            foreach ($inviteesData as $invitee) {
                $uuid = Str::uuid();
                $newInvitee = Invitee::create([
                    'name' => $invitee['name'],
                    'phone' => $invitee['number'],
                    'number_of_people' => $invitee['count'],
                    'invitation_id' => $request->input('invitation_id'),
                    'uuid' => $uuid,
                ]);
                $newInvitee->update([
                    'link' => 'invitation-card/'.$newInvitee->id.'?uuid='.$uuid,
                ]);
                $storedInvitees->push($newInvitee);
                $this->generateQRCodeForInvitee($newInvitee->id);
            }

            $inviteesForWhatsapp = $storedInvitees->map(function ($invitee) {
                return [
                    'phone' => $invitee->phone,
                    'name' => $invitee->name,
                    'link' => $invitee->link,
                    'count' => $invitee->number_of_people,
                ];
            });

            $tempPngPath = $this->processInvitationImage($imagePath);
            $whatsApp_template = $this->whatsApp_template($invitation->id);
            $whatsAppResponse = $this->sendWhatsAppMessages($inviteesForWhatsapp->toArray(), url($tempPngPath), $whatsApp_template);
            File::delete($tempPngPath);

            $validInviteesData = collect($whatsAppResponse['validInvitees'])->mapWithKeys(function ($validInvitee) {
                return [$validInvitee['phone'] => $validInvitee['count']];
            });

            // حذف المدعوين غير الصالحين بناءً على الرد من واتساب
            $invalidInvitees = collect($whatsAppResponse['invalidNumbers'])->pluck('phone');
            if ($invalidInvitees->isNotEmpty()) {
                $inviteesToDelete = Invitee::whereIn('phone', $invalidInvitees->toArray())->get();

                $inviteeIds = $inviteesToDelete->pluck('id');

                Invitee::whereIn('id', $inviteeIds)->delete();

                QR::whereIn('invitee_id', $inviteeIds)->delete();
            }

            $validInviteesCount = $validInviteesData->sum();

            for ($i = 0; $i < $validInviteesCount; $i++) {
                if ($invitation->number_of_invitees > 0) {
                    $invitation->number_of_invitees -= 1;
                } elseif ($invitation->additional_package > 0) {
                    $invitation->additional_package -= 1;
                } elseif ($invitation->number_of_compensation > 0) {
                    $invitation->number_of_compensation -= 1;
                }
            }

            $invitation->save();

            DB::commit();

            if ($validInviteesCount > 0 && $invalidInvitees->isEmpty()) {
                return response()->json([
                    'message' => 'تم إضافة المدعوين وإرسال الرسائل بنجاح. جميع الأرقام كانت صالحة.',
                    'whatsapp_response' => $whatsAppResponse,
                ]);
            } elseif ($validInviteesCount > 0 && $invalidInvitees->isNotEmpty()) {
                return response()->json([
                    'message' => 'تم إضافة المدعوين وإرسال الرسائل بنجاح. بعض الأرقام كانت غير صالحة.',
                    //                    'valid_invitees_count' => $validInviteesCount,
                    //                    'invalid_numbers' => $invalidInvitees->toArray(),
                    'whatsapp_response' => $whatsAppResponse,
                ]);
            } else {
                return response()->json([
                    'message' => 'لم يتم إرسال الرسائل. جميع الأرقام كانت غير صالحة.',
                    //                    'invalid_numbers' => $invalidInvitees->toArray(),
                    'whatsapp_response' => $whatsAppResponse,
                ], 422);
            }
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'حدث خطأ أثناء معالجة الطلب.',
                'err' => $e->getMessage(),
            ], 500);
        }
    }

    public function whatsApp_template($InvitationID)
    {
        $invitation = Invitation::find($InvitationID);

        if (! $invitation) {
            return response()->json(['error' => 'Invitation not found'], 404);
        }
        $whatsAppTemplateCategory = $invitation->category->whatsApp_template;

        $whatsAppTemplateFilter = $invitation->filter ? $invitation->filter->whatsApp_template : null;

        $whatsAppTemplate = $whatsAppTemplateFilter ?? $whatsAppTemplateCategory;

        $templateData = [
            'event_name' => $invitation->event_name,
            'from' => Carbon::parse($invitation->from)->locale('ar')->translatedFormat('h:i A'),
            'to' => Carbon::parse($invitation->to)->locale('ar')->translatedFormat('h:i A'),
            'miladi_date' => Carbon::parse($invitation->miladi_date)->locale('ar')->translatedFormat('Y/m/d'),
            'hijri_date' => Carbon::parse($invitation->hijri_date)->locale('ar')->translatedFormat('Y/m/d'),
        ];

        $invitationInputs = $invitation->invitationInput()->with('input')->get();

        foreach ($invitationInputs as $invitationInput) {
            $inputName = $invitationInput->input->input_name;
            $templateData[$inputName] = $invitationInput->answer;
        }

        $output = preg_replace_callback('/{{\s*([a-zA-Z0-9_\'\\s]+)\s*}}/', function ($matches) use ($templateData) {
            $key = trim($matches[1]);

            return $templateData[$key] ?? $matches[0];
        }, $whatsAppTemplate);

        return $output;
    }

    /// API For Support To Get Image And Message
    public function getImage($invitationID)
    {
        $invitation = Invitation::find($invitationID);
        if (! $invitation) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json([
            'image' => url($invitation->image),
            'message' => $invitation->message,
        ]);
    }

    /// API To Store Image And Message
    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            //            'message' => 'required|string',
            'invitation_id' => 'required|exists:invitations,id',
        ]);
        $invitation = Invitation::find($request->invitation_id);
        if (! $invitation) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $user = $invitation->user;
        $invitation->update([
            'image' => $request->file('image'),
            'text_message' => $request->input('message'),
            'status' => InvitationTypes::active,
        ]);

        $whatsAppDesignerFinishingService = new WhatsAppDesignerFinishingService;
        $whatsAppDesignerFinishingService->WhatsAppDesignerFinishing($user->phone, $invitation->event_name, $invitation->inviter);

        return response()->json(['message' => 'Added Successfully']);
    }

    /// API For conformed Or Rejected Invitation
    public function update(UpdateInviteeRequest $request, Invitee $invitee)
    {
        if ($request->uuid !== $invitee->uuid) {
            return Response()->json(['message' => 'Access denied. Invalid identifier.'], 403);
        }
        $invitee->update($request->validated());

        $rejectedInviteeIds = Invitee::where('invitation_id', $invitee->invitation_id)
            ->where('status', InviteeTypes::rejected)
            ->where('is_benefit', false)
            ->pluck('id');
        if ($rejectedInviteeIds->isNotEmpty()) {
            Invitee::whereIn('id', $rejectedInviteeIds)->update(['is_benefit' => true]);
            $totalRejectedCount = $rejectedInviteeIds->count();
        } else {
            $totalRejectedCount = 0;
        }
        $discount = $invitee->invitation->package->discount;
        $compensation = ($totalRejectedCount * $discount) / 100;
        $number_of_compensation = $invitee->invitation->number_of_compensation;
        $total = $compensation + $number_of_compensation;
        $invitee->invitation->update([
            'number_of_compensation' => $total,
        ]);
        if (! $request->status) {
            return response()->json(['message' => 'تم التحديث بنجاح']);
        }

        return response()->json(['message' => $request->status == 1 ? 'تم قبول الدعوة بنجاح' : 'تم رفض الدعوة بنجاح']);
    }

    public function showInvitationInfo(Request $request, Invitee $invitee)
    {
        if ($invitee->uuid !== $request->uuid) {
            return response()->json(['message' => 'هذه الدعوة غير مخصصة لك'], 403);
        }

        return ShowOrdersResource::make($invitee);
    }
}
/*
    public function addInvitees(StoreInviteeRequest $request)
    {
        DB::beginTransaction();
        try {
            $invitation = Invitation::find($request->invitation_id);
            $reception = Reception::where('invitation_id', $invitation->id)
                ->where('user_id', auth()->user()->id)
                ->first();

            $inviteesData = $request->input('invitees', []);
            $totalCount = array_reduce($inviteesData, function ($carry, $item) {
                return $carry + $item['count'];
            }, 0);

            if ($reception && $reception->type == 2) {
                if ($reception->number_can_invite < $totalCount) {
                    DB::rollBack();

                    return response()->json([
                        'message' => 'لقد تجاوزت العدد المسموح به للمدعوين بالنسبة للداعي الإضافي.',
                        'number_can_invite' => $reception->number_can_invite,
                    ]);
                }

                $reception->number_can_invite -= $totalCount;
                $reception->save();
            } else {
                $number_of_people = $invitation->invitee()->sum('number_of_people');
                $number_of_additional_package = $invitation->additional_package;
                $number_can_invitee_new = $invitation->number_of_invitees;
                $number_of_compensation = floor($invitation->number_of_compensation);

                if ($number_can_invitee_new + $number_of_compensation + $number_of_additional_package < $totalCount) {
                    DB::rollBack();

                    return response()->json([
                        'message' => 'لقد تجاوزت العدد المسموح به للمدعوين بالنسبة للداعي النظامي.',
                        'number_of_people' => $number_of_people,
                    ]);
                }

                foreach ($inviteesData as $invitee) {
                    for ($i = 0; $i < $invitee['count']; $i++) {
                        if ($invitation->number_of_invitees > 0) {
                            $invitation->number_of_invitees -= 1;
                        } elseif ($invitation->additional_package > 0) {
                            $invitation->additional_package -= 1;
                        } elseif ($invitation->number_of_compensation > 0) {
                            $invitation->number_of_compensation -= 1;
                        }
                    }
                }
            }

            $inviteesForWhatsapp = collect();
            foreach ($inviteesData as $invitee) {
                $uuid = Str::uuid();
                $newInvitee = Invitee::create([
                    'name' => $invitee['name'],
                    'phone' => $invitee['number'],
                    'number_of_people' => $invitee['count'],
                    'invitation_id' => $request->input('invitation_id'),
                    'uuid' => $uuid,
                ]);
                $newInvitee->update([
                    'link' => 'invitation-card/'.$newInvitee->id.'?uuid='.$uuid,
                ]);
                $inviteesForWhatsapp->push([
                    'phone' => $newInvitee->phone,
                    'link' => $newInvitee->link,
                    'name' => $newInvitee->name,
                ]);
                $this->generateQRCodeForInvitee($newInvitee->id);
            }

            $invitation->save();

            $imagePath = $invitation->image;
            $tempPngPath = $this->processInvitationImage($imagePath);
            $whatsApp_template = $this->whatsApp_template($invitation->id);
            $whatsAppResponse = $this->sendWhatsAppMessages($inviteesForWhatsapp->toArray(), url($tempPngPath), $whatsApp_template);
            File::delete($tempPngPath);
            DB::commit();

            return response()->json([
                'message' => 'تم إضافة المدعوين وإرسال الرسائل بنجاح.',
                'whatsapp_response' => $whatsAppResponse,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'حدث خطأ أثناء معالجة الطلب.',
                'err' => $e->getMessage(),
            ], 500);
        }
    }*/

/*public function store(StoreInviteeRequest $request)
{
    DB::beginTransaction();
    try {
        $invitation = Invitation::find($request->invitation_id);
        $number_of_people = $invitation->invitee()->sum('number_of_people');
        $inviteesData = $request->input('invitees', []);
        $totalCount = array_reduce($inviteesData, function ($carry, $item) {
            return $carry + $item['count'];
        }, 0);
        $number_of_additional_package = $invitation->additional_package;
        $number_can_invitee_new = $invitation->number_of_invitees;
        $number_of_compensation = floor($invitation->number_of_compensation);
        if ($number_can_invitee_new + $number_of_compensation + $number_of_additional_package < $totalCount) {
            DB::rollBack();

            return response()->json([
                'message' => 'You have reached the maximum number of invitees allowed, including compensations.',
                'number_of_people' => $number_of_people,
            ]);
        }

        $inviteesForWhatsapp = collect();

        foreach ($inviteesData as $invitee) {
            for ($i = 0; $i < $invitee['count']; $i++) {
                if ($invitation->number_of_invitees > 0) {
                    $invitation->number_of_invitees -= 1;
                } elseif ($invitation->additional_package > 0) {
                    $invitation->additional_package -= 1;
                } elseif ($invitation->number_of_compensation > 0) {
                    $invitation->number_of_compensation -= 1;
                }
            }

            $uuid = Str::uuid();
            $newInvitee = Invitee::create([
                'name' => $invitee['name'],
                'phone' => $invitee['number'],
                'number_of_people' => $invitee['count'],
                'invitation_id' => $request->input('invitation_id'),
                'uuid' => $uuid,
            ]);

            $newInvitee->update([
                'link' => 'invitation-card/'.$newInvitee->id.'?uuid='.$uuid,
            ]);
            $inviteesForWhatsapp->push([
                'phone' => $newInvitee->phone,
                'link' => $newInvitee->link,
                'name' => $newInvitee->name,
            ]);
            $this->generateQRCodeForInvitee($newInvitee->id);
        }

        $invitation->save();
        $imagePath = $invitation->image;
        $message = $invitation->text_message;
        if ($imagePath == null) {
            DB::rollBack();

            return response()->json(['message' => 'You must add a picture'], 422);
        }

        $tempPngPath = $this->processInvitationImage($imagePath);
        $whatsApp_template = $this->whatsApp_template($invitation->id);
        $this->sendWhatsAppMessages($inviteesForWhatsapp->toArray(), url($imagePath), $whatsApp_template);
        File::delete($tempPngPath);
        DB::commit();

        return response()->json([
            'message' => 'Invitees Added Successfully',
        ]);
    } catch (\Exception $e) {
        DB::rollBack();

        return response()->json(['message' => 'An error occurred while processing your request.', $e->getMessage()], 500);
    }
}*/
/* public function sendWhatsAppMessages(array $invitees, $image, $whatsApp_template)
  {
      $receivers = [];
      $validInvitees = [];
      $invalidNumbers = [];

      foreach ($invitees as $invitee) {
          $receivers[] = [
              'whatsappNumber' => $invitee['phone'],
              'customParams' => [
                  ['name' => 'product_image_url', 'value' => $image],
                  ['name' => 'nice_sentence', 'value' => $whatsApp_template],
                  ['name' => 'name', 'value' => $invitee['name']],
                  ['name' => '1', 'value' => $invitee['link']],
              ],
          ];
      }

      $response = Http::withHeaders([
          'Authorization' => 'Bearer '.$this->token,
          'Content-Type' => 'application/json',
      ])->post($this->url, [
          'template_name' => 'ar7ebo_invitation_bz',
          'broadcast_name' => 'ar7ebo_invitation_bz',
          'receivers' => $receivers,
      ]);

      // Parse response
      return $response->json();
  }*/

/* public function generateQRCodeForInvitee($inviteeId)
    {
        $invitee = Invitee::find($inviteeId);
        $invitation = $invitee->invitation()->where('is_with_qr', 1)->first();
        if ($invitation) {
            $numberOfPeople = $invitee->number_of_people;
            for ($i = 0; $i < $numberOfPeople; $i++) {
                $qrCodeData = json_encode([
                    'InviteeNumber' => $i + 1,
                    'InviteeName' => $invitee->name,
                    'InviteeID' => $invitee->id,
                ]);
                $qrCode = QrCode::format('svg')
                    ->size(300)
                    ->generate($qrCodeData);
                $fileName = '/qr-codes/'.$invitee->id.'_'.($i + 1).'.svg';
                $path = storage_path('app/public/'.$fileName);
                if (! file_exists(dirname($path))) {
                    mkdir(dirname($path), 0755, true);
                }
                file_put_contents($path, $qrCode);
                QR::create([
                    'invitee_id' => $invitee->id,
                    'qr_code' => '/storage'.$fileName,
                    'InviteeNumber' => $i + 1,
                ]);
            }
        }
    }*/
