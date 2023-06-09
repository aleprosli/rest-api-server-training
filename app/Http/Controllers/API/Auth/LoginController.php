<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $user = auth()->user();
            $token = $user->createToken('token')->accessToken;
            $user->token = $token;

            return response()->json([
                'message' => __('auth.success_login'),
                'data' => $user,
                'code' => 200
            ]);
        }

        return response()->json([
            'message' => 'Tidak Dijumpai, Sila Daftar',
            'code' => 500
        ]);
    }
}
