<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::paginate(3);
        // $posts = Post::all();

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

    public function store(StorePostRequest $request)
    {
        //get the request data
        // $request = request(); replaced with storePostRequest


        // $validatedData = $request->validate([
        //     'title'=>'required|min:3|unique:posts',
        //     'description' =>'required|min:10'
        // ],[
        //     // to overide validation message
        //     'title.min' => 'The title has to be more than 3 characters'
        // ]);
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

    public function edit()
    {
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        $users = User::all();

        return view('posts.edit',[
            'post'=>$post,
            'users'=>$users,
        ]);

    }


    public function update(StorePostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $users = User::all();
        $post->user_id = $request->user_id;
        $post->save();
        //redirect to /posts
        return redirect()->route('posts.index');
    }
}