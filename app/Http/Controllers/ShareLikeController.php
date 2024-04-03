<?php

namespace App\Http\Controllers;

use App\Models\share;
use Illuminate\Http\Request;

class ShareLikeController extends Controller
{
    public function like(Share $share){

        $liker = auth()->user();

        $liker ->likes()->attach($share);

        return redirect()->route('dashboard', $share->id)->with('flash-msg', 'You just like successfully');

    }

    public function unlike(Share $share){
        $liker = auth()->user();

        $liker->likes()->detach($share);

        return redirect()->route('dashboard', $share->id)->with('flash-msg', 'You just unlike successfully');
    }
}
