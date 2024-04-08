<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\share;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(){

        $totalUsers = User::count();

        $totalShare = Share::count();

        $totalComment = Comment::count();


        return view('admin.dashboard', 
        compact('totalUsers','totalShare', 'totalComment'));
    }
} 