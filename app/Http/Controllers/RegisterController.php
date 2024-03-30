<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register(){

        return view('register');
    }

    public function store(){

        $validated = request()->validate([
            'name' => 'required|min:3|max:40', 
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
    
       $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Mail::to($user->email)->send(new WelcomeMail($user));


        return redirect()->route('dashboard')->with('flash-msg', 'Account successfully created' );
    }
    
}
