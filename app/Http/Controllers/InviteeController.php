<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInviteeRequest;
use App\Http\Requests\UpdateInviteeRequest;
use App\Http\Resources\InviteeResource;
use App\Http\Resources\ShowOrdersResource;
use App\Models\Invitation;
use App\Models\Invitee;
use App\Models\QR;
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

        return $response->json();
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
                return response()->json(['message' => 'QR code not found'], 404);
            }

            $qr->update([
                'number_of_people_without_decrease' => $request->number_of_people,
                'number_of_people' => $request->number_of_people,
            ]);

            if ($request->number_of_people > $invitation->number_of_invitees + $invitation->additional_package + $invitation->number_of_compensation) {
                DB::rollBack();

                return response()->json(['message' => 'You have reached the maximum number of invitees allowed']);
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
            $number_of_people = $invitation->invitee()->sum('number_of_people');
            $inviteesData = $request->input('invitees', []);

            $totalCount = array_reduce($inviteesData, function ($carry, $item) {
                return $carry + $item['count'];
            }, 0);

            $availableInvitee = $invitation->number_of_invitees + floor($invitation->number_of_compensation) + $invitation->additional_package;

            if ($availableInvitee < $totalCount) {
                DB::rollBack();
                return response()->json([
                    'message' => 'You have reached the maximum number of invitees allowed, including compensations.',
                    'number_of_people' => $number_of_people,
                ]);
            }

            $inviteesForWhatsapp = [];
            $inviteesToProcess = [];
            $invalidInvitees = [];

            foreach ($inviteesData as $index => $invitee) {
                $uuid = Str::uuid();

                $newInvitee = Invitee::create([
                    'name' => $invitee['name'],
                    'phone' => $invitee['number'],
                    'number_of_people' => $invitee['count'],
                    'invitation_id' => $request->input('invitation_id'),
                    'uuid' => $uuid,
                ]);

                $link = 'invitation-card/' . $newInvitee->id . '?uuid=' . $uuid;

                $newInvitee->update([
                    'link' => $link,
                ]);

                // Generate QR code for the invitee
                $this->generateQRCodeForInvitee($newInvitee->id);

                $inviteesForWhatsapp[] = [
                    'phone' => $newInvitee->phone,
                    'link' => $link,
                    'name' => $newInvitee->name,
                    'index' => $index, // Include index to map responses
                ];

                $inviteesToProcess[$index] = $newInvitee;
            }

            $imagePath = $invitation->Template ? $invitation->Template->image : null;
            $tempPngPath = $this->processInvitationImage($imagePath);
            $whatsApp_template = $this->whatsApp_template($invitation->id);

            $whatsAppResponse = $this->sendWhatsAppMessages($inviteesForWhatsapp, url($tempPngPath), $whatsApp_template);

            File::delete($tempPngPath);

            $receivers = $whatsAppResponse['receivers'];
            $validInvitees = [];
            $totalValidInviteesCount = 0;

            foreach ($receivers as $receiver) {
                $index = $receiver['index'] ?? null;

                if ($index !== null && isset($inviteesToProcess[$index])) {
                    $invitee = $inviteesToProcess[$index];

                    if ($receiver['isValidWhatsAppNumber']) {
                        $validInvitees[] = $invitee;
                        $totalValidInviteesCount += $invitee->number_of_people;
                    } else {
                        $invitee->delete();

                        $invalidInvitees[] = [
                            'name' => $invitee->name,
                            'phone' => $invitee->phone,
                            'number_of_people' => $invitee->number_of_people,
                            'invitation_id' => $invitee->invitation_id,
                            'uuid' => $invitee->uuid,
                            'link' => $invitee->link,
                            'index' => $index,
                        ];
                    }
                }
            }

            // Recalculate total count for valid invitees
            if ($availableInvitee < $totalValidInviteesCount) {
                DB::rollBack();
                return response()->json([
                    'message' => 'You have reached the maximum number of invitees allowed, including compensations.',
                    'number_of_people' => $number_of_people,
                ]);
            }

            // Adjust invitation counts based on valid invitees
            foreach ($validInvitees as $invitee) {
                for ($i = 0; $i < $invitee->number_of_people; $i++) {
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

            return response()->json([
                'message' => 'Invitees Added and Messages Sent Successfully',
                'invalid_invitees' => $invalidInvitees,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'An error occurred while processing your request.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /* public function addInvitees(StoreInviteeRequest $request)
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
             $imagePath = $invitation->Template ? $invitation->Template->image : null;

             // Process the image (convert from WEBP to PNG)
             $tempPngPath = $this->processInvitationImage($imagePath);
             $whatsApp_template = $this->whatsApp_template($invitation->id);
             $whatsAppResponse = $this->sendWhatsAppMessages($inviteesForWhatsapp->toArray(), url($tempPngPath), $whatsApp_template);
             File::delete($tempPngPath);
             DB::commit();

             return response()->json([
                 'message' => 'Invitees Added and Messages Sent Successfully',
                 'whatsapp_response' => $whatsAppResponse,
             ]);
         } catch (\Exception $e) {
             DB::rollBack();

             return response()->json(['message' => 'An error occurred while processing your request.',
                 'err' => $e->getMessage(),
             ], 500);
         }
     }*/

    //// Api For Support
    public function store(StoreInviteeRequest $request)
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
            if ($imagePath == null || $message == null) {
                DB::rollBack();

                return response()->json(['message' => 'You must add a picture and a message'], 422);
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
        $invitation = Invitation::find($request->invitation_id);
        if (! $invitation) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $invitation->update([
            'image' => $request->file('image'),
            'text_message' => $request->input('message'),
        ]);

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
