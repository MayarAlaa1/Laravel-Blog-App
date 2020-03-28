
@extends('layouts.app')

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ITI Blog</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('posts.index')}}">All Posts<span class="sr-only">(current)</span></a>
      </li>
    </ul>
   
 
</nav>

@section('content')


      <div class="card" name="post">
        <h5 class="card-header">Post Info</h5>
        <div class="card-body">
          <h5 class="card-title">Title: {{$post->title}}</h5>
          <p class="card-text">Description: {{$post->description}}</p>
          
        </div>
      </div>

<br>
<br> 
<br>
<br>
      <div class="card" name="author">
        <h5 class="card-header">Post Creator Info</h5>
        <div class="card-body">
          <h5 class="card-title">Name: {{$post->user->name}}</h5>
          <p class="card-text">Email: {{$post->user->email}}</p>
          <h5 class="card-title">Created At: {{$post->created_at}}</h5>

          
        </div>
      </div>
@endsection
