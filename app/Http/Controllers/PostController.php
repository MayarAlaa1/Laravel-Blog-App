<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show()
    {
        $request = request();
        $postId = $request->post;

       
        $post = Post::find($postId);
        
        return view('posts.show',[
            'post' => $post,
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', [
            'users' => $users
        ]);
    }

    public function store()
    {
        //get the request data
        $request = request();

        //store the request data in the db
        Post::create([
            'title' => $request->title,
            'description' =>  $request->description,
            'user_id' =>  $request->user_id,
        ]);

        //redirect to /posts
        return redirect()->route('posts.index');
    }

    public function destroy()

    {
        $request = request();
        $postId = $request->post;

       
        Post::find($postId)->delete();
        return redirect()->route('posts.index');
    }
}