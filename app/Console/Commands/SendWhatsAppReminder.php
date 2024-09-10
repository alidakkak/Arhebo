<?php

namespace App\Console\Commands;

use App\Models\Invitation;
use App\Statuses\InviteeTypes;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendWhatsAppReminder extends Command
{
    protected $signature = 'send:whatsapp-reminder';

    protected $description = 'Send a reminder for events happening tomorrow.';

    private $url;

    private $token;

    public function __construct()
    {
        parent::__construct();
        $this->url = env('WHATSAPP_API_URL_SEND_TEMPLATE_MESSAGES');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function handle()
    {
        $tomorrow = Carbon::now()->addDay()->format('Y-m-d');
        $invitations = Invitation::where('miladi_date', $tomorrow)->get();

        foreach ($invitations as $invitation) {
            $result = $this->sendWhatsAppReminder($invitation);
            if ($result['status']) {
                $this->info('Reminder sent successfully for invitation ID: '.$invitation->id);
            } else {
                $this->error('Failed to send reminder for invitation ID: '.$invitation->id.' with error: '.$result['message']);
            }
        }
    }

    private function sendWhatsAppReminder($invitation)
    {
        $invitees = $invitation->invitee()->where('status', InviteeTypes::confirmed)
        ->orwhere('status', InviteeTypes::waiting)
        ->get(['phone', 'name', 'link']);
        if ($invitees->isEmpty()) {
            return ['status' => false, 'message' => 'This Invitation does not have invitees'];
        }

        $event_name = $invitation->event_name;
        $event_time = $invitation->created_at->format('H:i');
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
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'template_name' => 'reminder_24_ar_bz',
            'broadcast_name' => 'reminder_24_ar_bz',
            'receivers' => $receivers,
        ]);

        $responseData = json_decode($response->body(), true);
        $result = $responseData['result'] ?? false;

        if ($result) {
            return ['status' => true, 'message' => 'Reminder sent successfully'];
        } else {
            $errors = $responseData['errors'] ?? [];

            return ['status' => false, 'message' => 'Failed to send reminder', 'errors' => $errors];
        }
    }
}
