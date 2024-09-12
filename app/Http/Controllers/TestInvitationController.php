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
            'template_name' => 'trial_invitation_ar_bz',
            'broadcast_name' => 'trial_invitation_ar_bz',
            'parameters' => [
                [
                    'name' => 'product_image_url',
                    'value' => 'https://api.dev1.gomaplus.tech/templates_image/Wedding Men/Wedding Men - Gold leaf - 1.png',
                ],
                [
                    'name' => 'name',
                    'value' => $request->input('username'),
                ],
                [
                    'name' => '1',
                    'value' => 'invitation-card/26?uuid=0aea3a0c-513a-4d52-ac94-51aeed82fe11',s
                ],
            ],
        ]);

        return $response->json();
    }
}
