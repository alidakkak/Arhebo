<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\DeviceToken;
use App\Models\User;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            $credentials = $request->only(['phone', 'password']);
            if (! $token = auth()->attempt($credentials)) {
                return response()->json(['error' => trans('auth.failed')], 403);
            }
        }
        $user = auth()->user();
        if ($user->email_verified_at === null) {
            $otp = $user->generate_code();
            $whatsApp = new WhatsAppService;
            $whatsApp->sendWhatsAppMessage($user->phone, $otp);
            return response()->json(['error' => 'Your account is not verified.', 'is_verified' => $user->is_verified, 'phone' => $user->phone], 200);
        }

        if ($request->device_token){
            $device_token = DeviceToken::where('device_token' , $request->device_token)->first();
            if ($device_token){
                $device_token->update([
                    "device_token" => $request->device_token
                ]);
            }else{
                DeviceToken::create([
                    'user_id' => $user->id,
                    'device_token' => $request->device_token
                ]);
            }
        }
        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $existingUser = User::where(function ($query) use ($request) {
            $query->where('email', $request->email)
                ->orWhere('phone', $request->phone);
        })->where('is_verified', 0)
            ->first();
        if ($existingUser) {
            $existingUser->delete();
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'phone' => 'required|max:20|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'type' => 'prohibited',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));
        $otp = $user->generate_code();
        $whatsApp = new WhatsAppService;
        $whatsApp->sendWhatsAppMessage($user->phone, $otp);

        DeviceToken::updateOrCreate(
            ['user_id' => $user->id, 'device_token' => $request->device_token],
            ['user_id' => $user->id, 'device_token' => $request->device_token]
        );

        return response()->json([
            'message' => 'Verify Your Email',
        ], 201);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        $user = auth()->user();

        return $user;
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        $data = $request->except('phone');

        // التحقق من إذا ما كان هناك رقم هاتف جديد
        if ($request->has('phone') && $request->phone != $user->phone) {
            if ($user->is_phone_verified) {
                // إذا تم التحقق من الرقم الحالي، يمكن السماح بالتحديث
                $data['phone'] = $request->phone;

                // إعادة تعيين التحقق إلى false حتى يتم التحقق من الرقم الجديد
                $user->is_phone_verified = false;

                // يمكنك هنا إرسال رسالة تحقق إلى الرقم الجديد
            } else {
                // إذا لم يتم التحقق من الرقم القديم
                return response()->json([
                    'message' => 'You cannot change the phone number without verification.',
                ], 400);
            }
        }

        $user->update($data);

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user,
        ]);
    }


    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = auth()->user();

        if (! Hash::check($request->password, $user->password)) {
            return response()->json(['error' => trans('auth.failed')], 403);
        }

        try {
            $user->delete();

            return response()->json(['message' => 'Profile deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting your profile'], 500);
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string  $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user(),
        ]);
    }
}
