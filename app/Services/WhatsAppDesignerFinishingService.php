<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppDesignerFinishingService
{
    private $url;

    private $token;

    public function __construct()
    {
        $this->url = env('WHATSAPP_API_URL');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function WhatsAppDesignerFinishing($phone, $event_name, $name)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url.$phone, [
            'template_name' => 'designer_finishing',
            'broadcast_name' => 'designer_finishing',
            'parameters' => [
                [
                    'name' => 'event_name',
                    'value' => $event_name,
                ],
                [
                    'name' => 'name',
                    'value' => $name,
                ],
            ],
        ]);

        return $response->json();
    }
}
