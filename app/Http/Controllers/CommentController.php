<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

use App\Models\share;

class CommentController extends Controller
{
    public function store(Share $share){
      
      $comment = new Comment();
      $comment->share_id = $share->id;
      $comment->user_id = auth()->id(); // Set the user_id to the authenticated user's ID
      $comment->content = request()->get('content');
      $comment->save();
      

      return redirect()->route('weshare.show', $share->id)->with('flash-msg', 'comment successfully sent' );
    }
}
