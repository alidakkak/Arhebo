<?php

namespace App\Http\Controllers;

use App\Http\Requests\PushNotificationsRequest;
use App\Models\DeviceToken;
use App\Services\FirebaseService;

class PushNotificationsController extends Controller
{
    public function sendNotificationToAllUsers(PushNotificationsRequest $request)
    {
        $fcmTokens = DeviceToken::all()->pluck('device_token')->toArray();

        $firebaseNotification = new FirebaseService;
        $firebaseNotification->BasicSendNotification(
            $request->input('title'),
            $request->input('body'),
            $fcmTokens,
            $request->input('data', [])
        );

        return response()->json(['message' => 'Notifications sent successfully'], 200);
    }
}
