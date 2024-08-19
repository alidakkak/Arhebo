<?php

namespace App\Http\Controllers\Auth\WhatsAppOTP;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Mail\EmailService;
use App\Models\User;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(ForgetPasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->only('email');
        $user = User::where('email', $input)->first();
        $otp = $user->generate_code();
        EmailService::sendHtmlEmail($user->email, $otp);
        $success['success'] = true;

        return response()->json($success, 200);
    }
}
