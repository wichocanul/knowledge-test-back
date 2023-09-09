<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:70|unique:users',
            'password' => 'required|string'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'could not create user',
            ], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'user created',
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'bearer'
        ], 200);
    }
}
