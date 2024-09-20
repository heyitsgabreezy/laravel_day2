<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAccountRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {

    }

    public function register(RegisterAccountRequest $request) 
    {
        User::create($request->only(
            'name',
            'email',
            'password',
        ));
    }
}
