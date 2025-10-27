<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
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

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // attempt to login and confirm if the user details provided is same as in the db. Also returns a boolean true if successful and false if otherwise
        if(Auth::attempt($validated)){
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Logged in!');
        }; 

        throw ValidationException::withMessages([
            'email' => 'Sorry, incorrect credentials'
        ]);

    }

    public function logout(Request $request){
        Auth::logout(); // logout the user out

        $request->session()->invalidate(); // remove any other data associated with the session completely
        $request->session()->regenerateToken(); // regenerate the csrf token for the next session 

        return redirect('/login');
    }
}
