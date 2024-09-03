<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequestJawad;
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
    public function login(LoginRequestJawad $request)
    {
        if (! $token = auth()->attempt($request->only(['email' , 'password']))) {
            return response()->json(['error' => trans('auth.failed')], 403);
        }
        $user = auth()->user();
        if ($user->email_verified_at === null) {
            return response()->json(['error' => 'Your account is not verified.'], 403);
        }

        if ($request->notification_token){
            DeviceToken::updateOrCreate(
                ['user_id' => $user->id, 'device_token' => $request->notification_token],
                ['user_id' => $user->id, 'device_token' => $request->notification_token]
            );
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
        $request->validated($request->all());
        $user->update($request->all());

        return response([
            'Message' => 'User Updated SuccessFully',
            'User' => $user,
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
