<?php

namespace App\Http\Controllers\Auth\WhatsAppOTP;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Models\User;
use App\Services\WhatsAppService;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(ForgetPasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->only('phone');
        $user = User::where('phone', $input)->first();
        $otp = $user->generate_code();
        $whatsApp = new WhatsAppService;
        $whatsApp->sendWhatsAppMessage($user->phone, $otp);
        $success['success'] = true;

        return response()->json($success, 200);
    }
}