<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\share;

class DashboadController extends Controller
{
    public function index()
    {
        $shares = Share::query()->with('user', 'comments.user')->latest(); // Initialize $shares as a query builder instance

        if (request()->has('search')) {
            $searchTerm = '%' . request()->input('search') . '%';
            $shares = $shares->where('content', 'LIKE', $searchTerm);
        }

        $shares = $shares->paginate(10);
    
        return view( 'dashboard', compact('shares'));
    }
}
