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

    public function extraInviterServices()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url.$request->input('phone'), [
            'template_name' => 'extra_inviter_intation_request',
            'broadcast_name' => 'extra_inviter_intation_request',
            'parameters' => [
                [
                    'name' => 'event_name',
                    'value' => 'https://api.dev1.gomaplus.tech/test_invitation/test1.jpg',
                ],
            ],
        ]);

        return $response->json();
    }
}
