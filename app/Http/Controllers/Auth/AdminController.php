<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'phone' => 'required|max:20|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'type' => 'required|numeric',
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
}
