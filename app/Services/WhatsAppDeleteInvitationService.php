<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppDeleteInvitationService
{
    protected $url;

    protected $token;

    public function __construct()
    {
        $this->url = env('WHATSAPP_API_URL_SEND_TEMPLATE_MESSAGES');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function sendWhatsAppMessages(array $invitees, $event_name)
    {
        $receivers = [];

        foreach ($invitees as $invitee) {
            $receivers[] = [
                'whatsappNumber' => $invitee['phone'],
                'customParams' => [
                    ['name' => 'event_name', 'value' => $event_name],
                ],
            ];
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'template_name' => 'cancel_invitation',
            'broadcast_name' => 'cancel_invitation',
            'receivers' => $receivers,
        ]);

        return $response->json();
    }
}
