<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function showRegister(){
        return Inertia::render('auth/Register');
    }

    public function showLogin(){
        return Inertia::render('auth/Login');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create($validated);
        Auth::login($user);

        return redirect('/')->with('success', 'Account Created!');
    }

    public function login(){
    }
}
