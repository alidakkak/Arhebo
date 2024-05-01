<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TestInvitationController extends Controller
{
    private $url;

    private $token;

    public function __construct()
    {
        $this->url = env('WHATSAPP_API_URL1');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function testInvitation(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url . $request->input('phone'), [
            'template_name' => 'ar7ebo_1',
            'broadcast_name' => 'ar7ebo_1',
            'parameters' => [
                [
                    'name' => 'product_image_url',
                    'value' => 'https://api.dev1.gomaplus.tech/templates_image/Wedding Men/Wedding Men - Gold leaf - 1.png',
                ],
                [
                    'name' => 'any_name',
                    'value' => $request->input('username'),
                ],
                [
                    'name' => 'messagebody',
                    'value' => 'تتشرف غيداء بنت محمد وعائشة بنت بندر بدعوتك لحضور حفل زفاف ليان محمد وسالم أحمد.',
                ],
                [
                    'name' => 'button_url',
                    'value' => 'https://booking.ar7ebo.com/invitaion-card/1?uuid=1ed8bf6c-7f2f-4c92-bf96-528bcaf318aa",
        "uuid": "1ed8bf6c-7f2f-4c92-bf96-528bcaf318aa',
                ]
            ],
        ]);

        return $response->json();
    }
}
