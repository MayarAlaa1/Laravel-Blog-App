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
            Post::paginate()
//if we need to select how many posts ( here 5 per page)
 //           Post::paginate(5)
    

        );     
    }

    public function show(Post $post)
    {
        return new PostResource(
            //to return one object from posts and route model binding to print 404 not found
            $post
        );
    }
}

