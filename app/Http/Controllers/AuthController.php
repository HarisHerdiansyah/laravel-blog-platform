<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }
}
