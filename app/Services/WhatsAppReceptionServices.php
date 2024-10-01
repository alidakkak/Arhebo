<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppReceptionServices
{
    private $url;

    private $token;

    public function __construct()
    {
        $this->url = env('WHATSAPP_API_URL');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function receptionServices($phone, $event_name)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url.$phone, [
            'template_name' => 'reception_invetation',
            'broadcast_name' => 'reception_invetation',
            'parameters' => [
                [
                    'name' => 'event_name',
                    'value' => $event_name,
                ],
            ],
        ]);

        $responseData = $response->json();
        $receiver = $responseData['receivers'][0];

        if (!$receiver['isValidWhatsAppNumber']) {
            return response()->json([
                'message' => 'الرقم ' . $phone . ' غير متوفر على WhatsApp.',
            ], 422);
        }

        return response()->json([
            'result' => $responseData,
        ]);
    }
}
