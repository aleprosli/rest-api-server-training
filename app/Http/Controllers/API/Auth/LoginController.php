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
            return response()->json([
                'message' => 'Berjaya Login',
                'data' => auth()->user(),
                'code' => 200
            ]);
        }

        return response()->json([
            'message' => 'Tidak Dijumpai, Sila Daftar',
            'code' => 500
        ]);
    }
}
