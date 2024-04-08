<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\share;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function index(){

        $shares = share::latest()->paginate(10);

        return view('admin.shares.index', compact('shares'));
    }
    
}
