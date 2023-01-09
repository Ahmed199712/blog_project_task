<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
   
    public function index()
    {
        $comments = Comment::orderBy('id','DESC')->get();

        return view('comments.index' , compact('comments'));
    }

    
    public function show(Comment $comment)
    {
        return view('comments.show' , compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        session()->flash('success' , 'Comment Deleted Successfully');
        return redirect()->back();
    }
}
