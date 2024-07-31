<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class ResetPasswordController extends Controller
{
    public function resetPassword(ResetPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        if ($user->verifyOtp($request->otp)) {
            $user->password = Hash::make($request->password);
            $user->save();

            $token = JWTAuth::fromUser($user);

            return response()->json([
                'message' => 'OTP verified and password updated successfully.',
                'access_token' => $token,
                'user' => $user,
            ]);
        } else {
            return response()->json(['message' => 'Invalid or expired OTP.'], 400);
        }
    }
}
