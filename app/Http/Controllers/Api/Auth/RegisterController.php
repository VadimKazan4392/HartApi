<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Dotenv\Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
     //   dd(__METHOD__);
        try {
            $validator = FacadesValidator::make($request->all(), [
                'name' => 'string|max:20',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|max:255|confirmed',
            ]);

            if($validator->fails()) {
                return response()
                ->json([
                    'message' => $validator->errors()->first()
                ],422);
            }
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
