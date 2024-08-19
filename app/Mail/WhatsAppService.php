<?php

namespace App\Mail;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    protected $apiUrl;
    protected $apiToken;

    public function __construct()
    {
        $this->apiUrl = env('WHATSAPP_API_URL');
        $this->apiToken = env('WHATSAPP_API_TOKEN');
    }

    public function sendWhatsAppMessage($to, $message)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->apiToken,
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, [
            'template_name' => 'ar7ebo_otp_en_190820241318',
            'broadcast_name' => 'ar7ebo_otp_en',
            'parameters' => [
                [
                    'name' => '1',
                    'value' => $to
                ],
                [
                    'name' => 'message',
                    'value' => $message
                ]
            ]
        ]);

        return $response->json();
    }
}
