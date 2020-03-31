<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        // return Post::all();
        return PostResource::collection(
            Post::with('User')->paginate(5)
//if we need to select total pages 
 //           Post::paginate()
    

        );     
    }

    public function show(Post $post)
    {
        return new PostResource(
            //to return one object from posts and route model binding to print 404 not found
            $post
        );
    }

    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'description' =>  $request->description,
            'user_id' =>  $request->user_id,
            
        ]);
        return new PostResource($post);
    }
}

