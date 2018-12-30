<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        if (isset($user->id)) {
            return view('user', ['name' => $user->name]);
        }

        return view('user', ['name' => false]);
    }
}
