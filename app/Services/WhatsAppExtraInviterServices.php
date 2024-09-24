<?php

namespace App\Services;

use Illuminate\Http\Request;
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
            'template_name' => 'extra_inviter_intation_request',
            'broadcast_name' => 'extra_inviter_intation_request',
            'parameters' => [
                [
                    'name' => 'event_name',
                    'value' => $event_name,
                ],
            ],
        ]);

        return $response->json();
    }
}
