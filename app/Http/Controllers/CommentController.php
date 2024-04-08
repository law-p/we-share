<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Share;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Share $share)
    {

        // Create a new comment instance
        $comment = new Comment();
        $comment->share_id = $share->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get('content');
        $comment->save();

        // Redirect back to the share page with a success message
        return redirect()->route('weshare.show', $share->id)->with('flash-msg', 'Comment successfully sent');
    }

    public function destroy(Comment $comment)

    {
    
        if (Gate::denies('delete-comment', $comment)) {
            return back()->with('error', 'Unauthorized to delete this comment');
        }    

        // Delete the comment
        $comment->delete();

        // Redirect back with success message
        return back()->with('flash-msg', 'Comment deleted successfully');
        

    }

    

}