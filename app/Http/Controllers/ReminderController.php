<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReminderRequest;
use App\Http\Resources\ReminderResource;
use App\Models\Invitation;
use App\Models\Reminder;
use App\Statuses\InviteeTypes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ReminderController extends Controller
{
    private $url;

    private $token;

    public function __construct()
    {
        $this->url = env('WHATSAPP_API_URL_SEND_TEMPLATE_MESSAGES');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function index()
    {
        $reminder = Reminder::all();

        return ReminderResource::collection($reminder);
    }

    public function store(StoreReminderRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = auth()->user();
            $invitationId = $request->input('invitation_id');

            $existingReminders = Reminder::where('user_id', $user->id)
                ->where('invitation_id', $invitationId)
                ->first();

            if ($existingReminders) {
                DB::rollBack();
                return response()->json(['message' => trans('message.reminder')], 400);
            }

            $reminder = Reminder::create(array_merge(['user_id' => $user->id], $request->all()));

            $invitation = Invitation::find($invitationId);

            $invitees = $invitation->invitee()
                ->where('status', InviteeTypes::confirmed)
                ->orwhere('status', InviteeTypes::waiting)
                ->get();

            if ($invitees->isEmpty()) {
                DB::rollBack();
                return response()->json(['message' => 'This Invitation does not have invitees'], 404);
            }

            $event_name = $invitation->event_name;
            $event_time = $invitation->created_at->format('Y-m-d H:i:s');
            $receivers = [];
            foreach ($invitees as $invitee) {
                $receivers[] = [
                    'whatsappNumber' => $invitee->phone,
                    'customParams' => [
                        ['name' => 'name', 'value' => $invitee->name],
                        ['name' => 'event_name', 'value' => $event_name],
                        ['name' => 'event_time', 'value' => $event_time],
                    ],
                ];
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->token,
                'Content-Type' => 'application/json',
            ])->post($this->url, [
                'template_name' => 'reminder_ar',
                'broadcast_name' => 'reminder_ar',
                'receivers' => $receivers,
            ]);

            $responseData = json_decode($response->body(), true);
            $result = $responseData['result'] ?? false;

            if ($result) {
                DB::commit();
                return response()->json(['status' => true, 'message' => 'Reminder sent successfully']);
            } else {
                DB::rollBack();
                $errors = $responseData['errors'] ?? [];
                return response()->json(['status' => false, 'message' => 'Failed to send reminder', 'errors' => $errors]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }
}
/*
    public function sendWhatsAppReminder($invitationID)
    {
        $invitation = Invitation::where('id', $invitationID)->first();
        if (! $invitation) {
            return response()->json(['message' => 'Invitation not found'], 404);
        }

        $invitees = $invitation->invitee()->get(['phone', 'name', 'link']);

        if ($invitees->isEmpty()) {
            return response()->json(['message' => 'This Invitation does not have invitees'], 404);
        }
        $image = $invitation->image;
        $receivers = [];
        foreach ($invitees as $invitee) {
            $receivers[] = [
                'whatsappNumber' => $invitee->phone,
                'customParams' => [
                    ['name' => 'product_image_url', 'value' => url($image)],
                    ['name' => 'messagebody', 'value' => request('message')],
                    ['name' => 'any_name', 'value' => $invitee->name],
                    ['name' => 'button_url', 'value' => $invitee->link],
                ],
            ];
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'template_name' => 'ar7ebo_1',
            'broadcast_name' => 'ar7ebo_1',
            'receivers' => $receivers,
        ]);

        $responseData = json_decode($response->body(), true);
        $result = $responseData['result'] ?? false;

        if ($result) {
            if ($invitation->reminder) {
                collect($invitation->reminder)->map(fn ($remnid) => $remnid->delete()
                );
            }

            return response()->json(['message' => 'Reminder sent and deleted successfully'], 200);
        } else {
            $errors = $responseData['errors'] ?? [];

            return response()->json(['message' => 'Failed to send reminder', 'errors' => $errors], 500);
        }
    }
}*/
