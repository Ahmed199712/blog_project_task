<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->get();

        return view('posts.index' , compact('posts'));
    }

   
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $author = auth()->user()->id;

        // validation .
        $request->validate([
            'title' => 'required|alpha|min:3|max:255|unique:posts',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:2000',
            'content' => 'required|min:20'
        ]);

        // create post .
        $post = new Post;
        if( $request->image ){
            $image = $request->image;
            $image_new_name = time() .'__'. $image->getClientOriginalName();
            $image->move('uploads/posts/' , $image_new_name);
            $post->image = 'uploads/posts/' . $image_new_name;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->author = $author;
        $post->save();

        session()->flash('success' , 'Post Create Successfully');
        return redirect()->route('posts.index');
    }


    public function show(Post $post)
    {
        return view('posts.show' , compact('post'));
    }


    public function edit(Post $post)
    {
        return view('posts.edit' , compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // validation .
        $request->validate([
            'title' => 'required|alpha|min:3|max:255|unique:posts,title,'.$post->id,
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:2000',
            'content' => 'required|min:20'
        ]);

        // update post .
        if( $request->image ){
            if( $post->image != 'uploads/posts/default.png' ){
                unlink($post->image);
            }
            $image = $request->image;
            $image_new_name = time() .'__'. $image->getClientOriginalName();
            $image->move('uploads/posts/' , $image_new_name);
            $post->image = 'uploads/posts/' . $image_new_name;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        session()->flash('success' , 'Post Updated Successfully');
        return redirect()->route('posts.index');
    }

 
    public function destroy(Post $post)
    {
        if( $post->image != 'uploads/posts/default.png' ){
            unlink($post->image);
        }
        
        $post->delete();

        session()->flash('success' , 'Post Deleted Successfully');
        return redirect()->back();
    }
}
