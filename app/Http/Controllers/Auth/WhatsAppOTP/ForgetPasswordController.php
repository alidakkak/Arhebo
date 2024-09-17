<?php

namespace App\Http\Controllers\Auth\WhatsAppOTP;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Models\User;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\Request;

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

    public function resendCode(Request $request)
    {
        $input = $request->only('phone');
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $otp = $user->generate_code();

        $whatsApp = new WhatsAppService;
        $whatsApp->sendWhatsAppMessage($input['phone'], $otp);

        return response()->json(['success' => true], 200);
    }

}
