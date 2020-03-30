<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
        
    }

    public function show($post)
    {
        return new PostResource(
            Post::find($post)
        );
    }
}

