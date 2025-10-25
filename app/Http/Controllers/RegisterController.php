<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|min:8|confirmed',
            'username' => 'required|unique:users,username',
            'fullname' => 'required|string|max:255',
        ]);

        $account = Account::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        $account->user()->create([
            'account_id' => $account->account_id,
            'username' => $validated['username'],
            'fullname' => $validated['fullname']
        ]);

        return redirect()->route('login-form')->with('success', 'Registration successful! Please log in.');
    }
}
