<?php

namespace App\Http\Controllers\Auth\EmailOTP;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Mail\EmailService;
use App\Mail\WhatsAppService;
use App\Models\User;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(ForgetPasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->only('phone');
        $user = User::where('phone', $input)->first();
        $otp = $user->generate_code();
        WhatsAppService::sendWhatsAppMessage($user->email, $otp);
        $success['success'] = true;

        return response()->json($success, 200);
    }
}
