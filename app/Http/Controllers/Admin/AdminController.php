<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $users = User::where('is_admin', false)->latest()->paginate(5);

        return view('admin.users.index', compact('users'));
    }
}
