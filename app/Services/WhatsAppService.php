<?php

namespace App\Services;

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

    public function sendWhatsAppMessage($to, $otp)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$this->apiToken,
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl.$to, [
                'template_name' => 'ar7ebo_otp_ar_bz',
                'broadcast_name' => 'ar7ebo_otp_ar_bz',
                'parameters' => [
                    [
                        'name' => '1',
                        'value' => $otp,
                    ],
                ],
            ]);

            $responseData = $response->json();
            $receiver = $responseData['receivers'][0];

            if (! $receiver['isValidWhatsAppNumber']) {
                return [
                    'status' => false,
                    'result' => $responseData,
                ];
            }

            return [
                'status' => true,
                'result' => $responseData,
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'An error occurred while sending the message',
                'details' => $e->getMessage(),
            ];
        }
    }
}
