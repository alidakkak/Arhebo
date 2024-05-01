<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestInvitation;
use App\Http\Requests\StorTestInvitation;
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

    public function testInvitation()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
            'whatsappNumber' => '+966540269079',
        ])->post($this->url, [
            'template_name' => 'ar7ebo_reservation_message',
            'broadcast_name' => 'ar7ebo_reservation_message',
            'parameters' => [
                [
                    "name" => "product_image_url",
                    "value" => "https://api.dev1.gomaplus.tech/templates_image/Wedding Men/Wedding Men - Gold leaf - 1.png"
                ],
                [
                    "name" => "cat_name_ar_oradb",
                    "value" => "ارحبو ل اسم الداعي: احمد"
                ],
                [
                    "name" => "app_time",
                    "value" => "المكرم/ة الاء"
                ],
                [
                    "name" => "contact",
                    "value" => "+966540269079"
                ],
                [
                    "name" => "button_url",
                    "value" => "uuid=12"
                ]
            ]
        ]);

        return $response->json();
    }

}
