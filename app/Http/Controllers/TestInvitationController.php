<?php

namespace App\Http\Controllers;

use App\Models\TestInvitation;
use Carbon\Carbon;
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
        $user = auth()->user();
        $lastInvitation = TestInvitation::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        if ($lastInvitation && $lastInvitation->created_at->gt(Carbon::now()->subDay())) {
            return response()->json([
                'message' => 'لا يمكنك إرسال دعوة جديدة. يرجى المحاولة بعد 24 ساعة.',
            ], 422);
        }
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url.$request->input('phone'), [
            'template_name' => 'trial_invitation_ar_ph',
            'broadcast_name' => 'trial_invitation_ar_ph',
            'parameters' => [
                [
                    'name' => 'product_image_url',
                    'value' => 'https://api.dev1.gomaplus.tech/test_invitation/test.png',
                ],
                [
                    'name' => 'name',
                    'value' => $request->input('username'),
                ],
                [
                    'name' => '1',
                    'value' => 'invitation-card/1?uuid=test_invitation',
                ],
            ],
        ]);
        $TestInvitation = TestInvitation::create([
            'user_id' => $user->id,
        ]);

        return [
            $response->json(),
            'created_at' => $TestInvitation->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
