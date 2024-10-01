<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppExtraInviterServices
{
    private $url;

    private $token;

    public function __construct()
    {
        $this->url = env('WHATSAPP_API_URL');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function extraInviterServices($phone, $event_name)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url.$phone, [
            'template_name' => 'extra_inviter_invetation',
            'broadcast_name' => 'extra_inviter_invetation',
            'parameters' => [
                [
                    'name' => 'event_name',
                    'value' => $event_name,
                ],
            ],
        ]);

        $responseData = $response->json();
        $receiver = $responseData['receivers'][0];

        if (! $receiver['isValidWhatsAppNumber']) {
            return [
                'status' => false,
                'message' => 'الرقم '.$phone.' غير متوفر على واتساب',
            ];
        }

        return [
            'status' => true,
            'result' => $responseData,
        ];
    }
}
