<?php

namespace App\Console\Commands;

use App\Models\Invitation;
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
        $this->url = env('WHATSAPP_API_URL');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function handle()
    {
        $tomorrow = Carbon::now()->addDay()->format('Y-m-d');
        $invitations = Invitation::where('miladi_date', $tomorrow)->get();

        foreach ($invitations as $invitation) {
            $result = $this->sendWhatsAppReminder($invitation);
            if ($result['status']) {
                $this->info('Reminder sent successfully for invitation ID: ' . $invitation->id);
            } else {
                $this->error('Failed to send reminder for invitation ID: ' . $invitation->id . ' with error: ' . $result['message']);
            }
        }
    }

    private function sendWhatsAppReminder($invitation)
    {
        $invitees = $invitation->invitee()->get(['phone', 'name', 'link']);
        if ($invitees->isEmpty()) {
            return ['status' => false, 'message' => 'This Invitation does not have invitees'];
        }

        $receivers = [];
        foreach ($invitees as $invitee) {
            $receivers[] = [
                'whatsappNumber' => $invitee->phone,
                'customParams' => [
                    ['name' => 'product_image_url', 'value' => 'https://api.dev1.gomaplus.tech/templates_image/Wedding Men/Wedding Men - Gold leaf - 1.png'],
                    ['name' => 'messagebody', 'value' => 'لا تنسوا حضور الحفلة'],
                    ['name' => 'any_name', 'value' => $invitee->name],
                    ['name' => 'button_url', 'value' => $invitee->link],
                ],
            ];
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'template_name' => 'ar7ebo_1',
            'broadcast_name' => 'ar7ebo_1',
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
