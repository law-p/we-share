<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\share;

class ShareController extends Controller
{
    public function store()
    {
       
        $validated = request()->validate([
            'content' => 'required|min:10|max:250',
        ]);

        $validated['user_id'] = auth() -> id();
        
        share::create($validated);
        
        return redirect()->route('dashboard')->with('flash-msg', 'You just posted on we-share!!' );
    }

    public function destroy(Share $id){
        
        $this->authorize('delete', $id);

        $id->delete();
        
        return redirect()->route('dashboard')->with('flash-msg', 'Share deleted successfully.');
    }

    public function show(Share $share) {
        
        return view('show', compact('share'));
    } 

    public function edit(Share $share) {

        $editting = true;

        return view('show', compact('share', 'editting'));
    }   
    
    public function update(Request $request, Share $share) {
        
        $request->validate(['content' => 'required|min:10|max:250']);
    
        $share->update(['content' => $request->content]);
    
        return redirect()->route('dashboard', $share)->with('flash-msg', 'Updated successfully.');
    }
    
    
}
