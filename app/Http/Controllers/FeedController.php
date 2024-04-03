<?php

namespace App\Http\Controllers;

use App\Models\share;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $user =auth()->user();

        $followingID = $user->followings()->pluck('user_id');

        $shares = Share::query()->whereIn('user_id', $followingID)->latest(); // Initialize $shares as a query builder instance

        if (request()->has('search')) {
            $shares = $shares->where('content', '%' . request()->input('search') . '%');
        }

        $shares = $shares->paginate(10);

        return view('feed', compact('shares'));
    }
}
