<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReminderRequest;
use App\Http\Resources\ReminderResource;
use App\Models\Reminder;

class ReminderController extends Controller
{
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

    }
}
