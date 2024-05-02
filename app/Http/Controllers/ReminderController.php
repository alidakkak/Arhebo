<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReminderRequest;
use App\Http\Resources\ReminderResource;
use App\Models\Reminder;
use Illuminate\Support\Facades\Http;

class ReminderController extends Controller
{
    private $url;

    private $token;

    public function __construct()
    {
        $this->url = env('WHATSAPP_API_URL');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function index()
    {
        $reminder = Reminder::all();

        return ReminderResource::collection($reminder);
    }

    public function store(StoreReminderRequest $request)
    {
        try {
            $user = auth()->user();
            $reminder = Reminder::create(array_merge(['user_id' => $user->id], $request->all()));

            return ReminderResource::make($reminder);
        } catch (\Exception $e) {
            return response()->json(['message' => 'error'],500);
        }
    }

    public function sendWhatsAppReminder() {
        $receivers = [];
        foreach ($invitees as $invitee) {
            $receivers[] = [
                'whatsappNumber' => $invitee['phone'],
                'customParams' => [
                    ['name' => 'product_image_url', 'value' => $invitee['template_photo']],
                    ['name' => 'messagebody', 'value' => 'تتشرف غيداء بنت محمد وعائشة بنت بندر بدعوتك لحضور حفل زفاف ليان محمد وسالم أحمد.'],
                    ['name' => 'any_name', 'value' => $invitee['name']],
                    ['name' => 'button_url', 'value' => $invitee['link']],
                ],
            ];
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'template_name' => 'ar7ebo_1',
            'broadcast_name' => 'ar7ebo_1',
            'receivers' => $receivers,
        ]);

        return $response->json();
    }
}
