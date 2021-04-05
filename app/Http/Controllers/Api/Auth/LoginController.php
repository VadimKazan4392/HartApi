<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'message' => 'Incorrect credentials.',
                ], 401);
            }

            $tokenResult = Auth::user()->createToken('authToken')->plainTextToken;

            return response()->json([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => 'Registration successfull',
                'error' => $error,
            ]);
        }
    }
}
