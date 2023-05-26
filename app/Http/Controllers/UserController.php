<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    use ResponseAPI;
    
    public function listAllUsers()
    {
        return $this->success(UserResource::collection(User::all()));
    }

    public function showUser(Request $request)
    {
        $user = User::find($request->id);
        
        return $this->success($user, 'Nama pengguna adalah '.$user->name);
    }
}
