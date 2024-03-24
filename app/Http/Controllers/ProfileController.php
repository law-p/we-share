<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user;

class ProfileController extends Controller
{
    public function show(User $user){


        return view('users.show', compact('user'));

    }

    public function edit(User $user){


        return view('users.edit', compact('user'));

    }

    public function update(User $user){


       //

    }
} 
