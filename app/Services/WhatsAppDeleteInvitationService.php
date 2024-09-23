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

    public function sendWhatsAppMessages(array $invitees, string $eventName)
    {
        // Prepare the receivers' data
        $receivers = array_map(function ($invitee) use ($eventName) {
            return [
                'whatsappNumber' => $invitee['phone'], // Ensure phone number exists in the invitee
                'customParams' => [
                    [
                        'name' => 'event_name',
                        'value' => $eventName
                    ]
                ]
            ];
        }, $invitees);

        // Send the HTTP POST request to the WhatsApp API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiToken, // Authorization header
            'Content-Type' => 'application/json', // Ensure JSON content-type
        ])->post($this->apiUrl, [
            'template_name' => 'cancel_invitation', // Name of the template
            'broadcast_name' => 'cancel_invitation', // Broadcast name for the message
            'receivers' => $receivers, // List of receivers with their custom params
        ]);

        // Return the response in JSON format
        return $response->json();
    }
}
