<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function profile()
    {
        return view('users/profile', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('users/edit', ['user' => Auth::user()]);
    }

    public function show($id)
    {
        return view('users/show', ['user' => User::findOrFail($id)]);
    }

    public function favoriteGardens($id)
    {
        return view('users/favoriteGardens', ['user' => User::findOrFail($id)]);
    }
}
