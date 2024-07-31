<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\OTPRequest;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class EmailVerificationsController extends Controller
{
    public function emailVerification(OTPRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        if ($user->verifyOtp($request->otp)) {
            $token = JWTAuth::fromUser($user);

            return response()->json([
                'message' => 'OTP verified successfully.',
                'access_token' => $token,
                'user' => $user,
            ]);
        } else {
            return response()->json(['message' => 'Invalid or expired OTP.'], 400);
        }
    }
}
