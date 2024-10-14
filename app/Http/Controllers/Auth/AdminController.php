<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\OTPRequest;
use App\Http\Resources\UserProfileResource;
use App\Models\User;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminController extends Controller
{
    public function addAdminSupport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'phone' => 'required|max:20|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'type' => 'required|numeric|check_user:1,3',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'User successfully registered',
            'access_token' => $token,
            'user' => $user,
        ], 201);
    }

    public function deleteUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100',
            'phone' => 'required|max:20',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = User::where('email', $request->email)->where('phone', $request->phone)->first();

        if (!$user) {
            return response()->json(['message' => 'المستخدم غير موجود'], 422);
        }

        $otp = $user->generate_code();
        $whatsApp = new WhatsAppService;
        $whatsApp->sendWhatsAppMessage($user->phone, $otp);

        return response()->json(['message' => 'Success']);
    }

    public function whatsAppVerificationToDeleteUser(OTPRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if (! $user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        if ($user->verifyOtp($request->otp)) {
            $user->is_verified = true;
            $user->save();

            $user->update([
               'isActive' => 0,
            ]);

            return response()->json([
                'message' => 'OTP verified successfully.',
                'user' => UserProfileResource::make($user),
            ]);
        } else {
            return response()->json(['message' => 'Invalid or expired OTP.'], 400);
        }
    }

    public function getUserToDelete(){

    }
}
