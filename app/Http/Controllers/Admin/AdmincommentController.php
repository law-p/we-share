<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

use Illuminate\Http\Request;

class AdmincommentController extends Controller
{
    public function index(){

        $comments = Comment::latest()->paginate(10);

        return view('admin.comments.index', compact('comments'));
    }
    
}
