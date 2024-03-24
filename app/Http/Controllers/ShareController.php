<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\share;

class ShareController extends Controller
{
    public function store()
    {
       

        $validated = request()->validate([
            'share' => 'required|min:10|max:250',
        ]);

               // Create a new Share instance
               $share = new Share();

               // Set the content of the share
            $share->content = $validated['share'];
    
              // Set the user_id to the authenticated user's ID
            $share->user_id = auth()->id();
    
              // Save the Share instance
             $share->save();
        

        return redirect()->route('dashboard')->with('flash-msg', 'You just posted on we-share!!' );
    }

    public function destroy(Share $id){
        
        if (auth()->id() !== $id -> user_id){
            abort(404,'You dont have permission to perform this action');
        }

    $id->delete();
    return redirect()->route('dashboard')->with('flash-msg', 'Share deleted successfully.');
    }

    public function show(Share $share) {

        if (auth()->id() !== $share -> user_id){
            abort(404);
        }

        return view('show', compact('share'));
    } 

    public function edit(Share $share) {

        if (auth()->id() !== $share -> user_id){
            abort(404);
        }

        $editting = true;
        return view('show', compact('share', 'editting'));
    }   
    
    public function update(Request $request, Share $share) {

        if (auth()->id() !== $share -> user_id){
            abort(404);
        }
        
        $request->validate(['content' => 'required|min:10|max:250']);
    
        $share->update(['content' => $request->content]);
    
        return redirect()->route('dashboard', $share)->with('flash-msg', 'Updated successfully.');
    }
    
    
}
