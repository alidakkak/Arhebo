<?php

namespace App\Http\Controllers\Auth\WhatsAppOTP;

use App\Http\Controllers\Controller;
use App\Http\Requests\OTPRequest;
use App\Http\Resources\UserProfileResource;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class WhatsAppVerificationsController extends Controller
{
    public function whatsAppVerification(OTPRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if (! $user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        if ($user->verifyOtp($request->otp)) {
            $user->is_verified = true;
            $user->save();
            $token = JWTAuth::fromUser($user);

            return response()->json([
                'message' => 'OTP verified successfully.',
                'access_token' => $token,
                'user' => UserProfileResource::make($user),
            ]);
        } else {
            return response()->json(['message' => 'Invalid or expired OTP.'], 400);
        }
    }
}
