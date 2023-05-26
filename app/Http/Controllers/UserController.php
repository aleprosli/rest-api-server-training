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
}
