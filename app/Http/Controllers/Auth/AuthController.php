<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserProfileResource;
use App\Models\DeviceToken;
use App\Models\Reception;
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

        if ($request->device_token) {
            $device_token = DeviceToken::where('device_token', $request->device_token)->first();
            if ($device_token) {
                $device_token->update([
                    'device_token' => $request->device_token,
                ]);
            } else {
                DeviceToken::create([
                    'user_id' => $user->id,
                    'device_token' => $request->device_token,
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
            'country_code' => 'required|string',
            'country_name' => 'required|string',
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
        $whatsapp_response = $whatsApp->sendWhatsAppMessage($user->phone, $otp);

        DeviceToken::updateOrCreate(
            ['user_id' => $user->id, 'device_token' => $request->device_token],
            ['user_id' => $user->id, 'device_token' => $request->device_token]
        );
        $reception = Reception::where('phone', $request->phone)->first();

        if ($reception) {
            $reception->update([
                'user_id' => $user->id,
            ]);
        }

        if ($whatsapp_response['status'] === false) {
            return response()->json([
                'whatsapp_response' => $whatsapp_response,
            ], 422);
        }

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

    public function userProfile()
    {
        $user = auth()->user();

        return UserProfileResource::make($user);
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        $data = $request->all();

        if ($request->has('phone') && $request->phone != $user->phone) {
            $otp = $user->generate_code();
            $whatsApp = new WhatsAppService;
            $whatsApp->sendWhatsAppMessage($request->phone, $otp);

            return response()->json([
                'message' => 'OTP has been sent. Please verify your phone number.',
                'data' => $data,
            ], 200);
        }

        $user->update($data);

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user,
        ]);
    }

    public function verificationToUpdatePhone(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        if (! $user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        if ($user->verifyOtpReset($request->otp)) {
            $data = $request->input('data');

            if ($data) {
                $user->update($data);

                return response()->json([
                    'message' => 'Phone number verified and user data updated successfully.',
                    'user' => $user,
                ]);
            } else {
                return response()->json(['message' => 'No data to update.'], 400);
            }
        } else {
            return response()->json(['message' => 'Invalid or expired OTP.'], 400);
        }
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
        $user = auth()->user();

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => UserProfileResource::make($user),
        ]);
    }
}
