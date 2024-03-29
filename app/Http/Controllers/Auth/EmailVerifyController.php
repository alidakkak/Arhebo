<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class EmailVerifyController extends Controller
{
    private $otp;

    public function __construct()
    {
        $this->otp = new Otp;
    }

    public function emailVerification(EmailVerifyRequest $request): JsonResponse
    {
        $otp2 = $this->otp->validate($request->email, $request->otp);
        if (! $otp2->status) {
            return response()->json(['error' => $otp2], 401);
        }
        $user = User::where('email', $request->email)->first();
        $user = User::where('code', $request->otp)->first();
        $user->update(['email_verified_at' => Carbon::now()]);
        $success['success'] = true;

        return response()->json($success, 200);

    }
}
