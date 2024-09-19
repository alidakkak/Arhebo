<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestInvitationController extends Controller
{
    private $url;

    private $token;

    public function __construct()
    {
        $this->url = env('WHATSAPP_API_URL');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function testInvitation(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url.$request->input('phone'), [
            'template_name' => 'trial_invitation_ar_ph',
            'broadcast_name' => 'trial_invitation_ar_ph',
            'parameters' => [
                [
                    'name' => 'product_image_url',
                    'value' => 'https://api.dev1.gomaplus.tech/test_invitation/test.png"',
                ],
                [
                    'name' => 'name',
                    'value' => $request->input('username'),
                ],
                [
                    'name' => '1',
                    'value' => 'invitation-card/1?uuid=859db51a-0580-46d6-bd59-3bd01453c15c',
                ],
            ],
        ]);

        return $response->json();
    }
}
