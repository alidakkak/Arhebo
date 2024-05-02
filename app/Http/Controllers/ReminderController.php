<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReminderRequest;
use App\Http\Resources\ReminderResource;
use App\Models\Invitation;
use App\Models\Reminder;
use App\Statuses\InviteeTypes;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class ReminderController extends Controller
{
    private $url;

    private $token;

    public function __construct()
    {
        $this->url = env('WHATSAPP_API_URL');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function index()
    {
        $reminder = Reminder::all();

        return ReminderResource::collection($reminder);
    }

    public function store(StoreReminderRequest $request)
    {
        try {
            $user = auth()->user();
            $reminder = Reminder::create(array_merge(['user_id' => $user->id], $request->all()));

            return ReminderResource::make($reminder);
        } catch (\Exception $e) {
            return response()->json(['message' => 'error'],500);
        }
    }

    public function sendWhatsAppReminder($invitationID) {
        $invitation = Invitation::where('id' , $invitationID)->first();
        $invitees = $invitation->invitee()->get(['phone','name','link']);
        $receivers = [];
        foreach ($invitees as $invitee) {
            $receivers[] = [
                'whatsappNumber' => $invitee['phone'],
                'customParams' => [
                    ['name' => 'product_image_url', 'value' => 'https://api.dev1.gomaplus.tech/templates_image/Wedding Men/Wedding Men - Gold leaf - 1.png'],
                    ['name' => 'messagebody', 'value' => \request('message')],
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
        if ($result){
            $invitation->reminder->delete();
        }else
            return response([
                'message' => "sent successfully"
            ] , 200);
    }
}
///'https://api.dev1.gomaplus.tech/templates_image/Wedding Men/Wedding Men - Gold leaf - 1.png'
