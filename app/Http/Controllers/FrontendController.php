<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class FrontendController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(6);
        
        return view('welcome' , compact('posts'));
    }
    
    public function show($id)
    {
        $post = Post::find($id);

        return view('Frontend.posts.show' , compact('post'));
    }

    public function addComment(Request $request)
    {
        $request->validate([
            'comment' => 'required|min:5|max:255'
        ]);

        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = auth()->user()->id;
        $comment->comment = $request->comment;
        $comment->save();
        session()->flash('success' , 'Comment added to post successfully');
        return redirect()->back();
    }
}
