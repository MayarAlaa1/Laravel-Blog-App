@extends('layouts.app')


@section('content')
  @if ($errors->any())
  {{--  to display error messages --}}
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <div class="row h-50 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
<form method="POST" action="{{route('posts.update',['post' => $post->id])}}">
    @method('PUT')
    @csrf
    <div class="form-group">
      <label >Title</label>
      <input name="title" type="text" class="form-control" aria-describedby="emailHelp" value="{{$post->title}}">
      
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea name="description" class="form-control">
        {{$post->description}}
      </textarea>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Users</label>
      <select name="user_id" class="form-control">
        @foreach($users as $user)  
      <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
  </form>
      </div>
  </div>
{{-- </div> --}}
  @endsection