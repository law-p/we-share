<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    public function login(){

        return view ('login');
    }

    public function auth(){

        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt( $validated)) {
           request()->session()->regenerate();
           return redirect()->route('profile')->with('flash-msg', 'Logged in successfully' );
        }
    
        return redirect()->route('login')->withErrors([
            'email' => "Email and Password did not matched, please try again"
        ]);
    }

    public function logout(){
        auth() -> logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard')->with('flash-msg', 'Logged out successfully' );
    }
    
}
