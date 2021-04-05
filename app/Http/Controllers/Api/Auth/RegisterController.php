<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        try {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(10);

            $user->save();

            return response()->json($user);

        } catch (Exception $error) {
            return response()->json([
                'message' => 'Error in Registration',
                'error' => $error,
            ], 500);
        }
    }
}
