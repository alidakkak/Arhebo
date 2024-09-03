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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'template_name' => 'ar7ebo_invitation_ar_customized',
            'broadcast_name' => 'ar7ebo_invitation_ar_customized',
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

    public function generateQRCodeForInvitee($inviteeId)
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
                    'link' => url('invitation-card/'.$newInvitee->id.'?uuid='.$uuid),
                ]);
                $inviteesForWhatsapp->push([
                    'phone' => $newInvitee->phone,
                    'link' => $newInvitee->link,
                    'name' => $newInvitee->name,
                ]);
                $this->generateQRCodeForInvitee($newInvitee->id);
            }
            $invitation->save();
            $image = $invitation->Template ? $invitation->Template->image : null;
            $whatsApp_template = $this->whatsApp_template($invitation->id);
            $this->sendWhatsAppMessages($inviteesForWhatsapp->toArray(), url($image), $whatsApp_template);

            DB::commit();

            return response()->json([
                'message' => 'Invitees Added and Messages Sent Successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'An error occurred while processing your request.',
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
                    'link' => url('invitation-card/'.$newInvitee->id.'?uuid='.$uuid),
                ]);
                $inviteesForWhatsapp->push([
                    'phone' => $newInvitee->phone,
                    'link' => $newInvitee->link,
                    'name' => $newInvitee->name,
                ]);
                $this->generateQRCodeForInvitee($newInvitee->id);
            }

            $invitation->save();
            $image = $invitation->image;
            $message = $invitation->text_message;
            if ($image == null || $message == null) {
                DB::rollBack();

                return response()->json(['message' => 'You must add a picture and a message']);
            }
            $whatsApp_template = $this->whatsApp_template($invitation->id);
            $this->sendWhatsAppMessages($inviteesForWhatsapp->toArray(), url($image), $whatsApp_template);
            DB::commit();

            return response()->json([
                'message' => 'Invitees Added Successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'An error occurred while processing your request.'], 500);
        }
    }

    public function whatsApp_template($InvitationID)
    {
        $invitation = Invitation::find($InvitationID);

        if (! $invitation) {
            return response()->json(['error' => 'Invitation not found'], 404);
        }
        $whatsAppTemplateCategory = $invitation->category->whatsApp_template;
        $whatsAppTemplateFilter = $invitation->filter->whatsApp_template;

        $whatsAppTemplate = $whatsAppTemplateFilter ?? $whatsAppTemplateCategory;
        return $whatsAppTemplate;

        $templateData = [
            'event_name' => $invitation->event_name,
            'from' => $invitation->from,
            'to' => $invitation->to,
            'miladi_date' => $invitation->miladi_date,
            'hijri_date' => $invitation->hijri_date,
        ];

        $invitationInputs = $invitation->invitationInput()->with('input')->get();

        foreach ($invitationInputs as $invitationInput) {
            $inputName = $invitationInput->input->input_name;
            $templateData[$inputName] = $invitationInput->answer;
        }

        foreach ($templateData as $key => $value) {
            $whatsAppTemplate = str_replace("{{{$key}}}", $value, $whatsAppTemplate);
        }

        return $whatsAppTemplate;
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
