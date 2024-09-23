<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppDeleteInvitationService
{
    protected $apiUrl;

    protected $apiToken;

    public function __construct()
    {
        $this->apiUrl = env('WHATSAPP_API_URL');
        $this->apiToken = env('WHATSAPP_API_URL_SEND_TEMPLATE_MESSAGES');
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
        dd($receivers);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->apiToken,
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, [
            'template_name' => 'cancel_invitation',
            'broadcast_name' => 'cancel_invitation',
            'receivers' => $receivers,
        ]);

        return $response->json();
    }
}
