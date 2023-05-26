<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listAllUsers()
    {
        $users = User::all();

        return response()->json([
            'message' => 'Semua list pengguna',
            'data' => $users,
            'code' => 200
        ]);
    }

    public function showUser(Request $request)
    {
        $user = User::find($request->id);

        return response()->json([
            'message' => 'Nama pengguna adalah '.$user->name,
            'data' => $user,
            'code' => 200
        ]);
    }
}
