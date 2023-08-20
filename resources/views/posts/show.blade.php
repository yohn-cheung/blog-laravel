<!-- resources/views/child.blade.php -->
 
@extends('layout')
 
@section('title', $post->title)
 
@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">{{$post->title}} </h5>
      <p class="card-text">{{$post->description}}</p>
       @if($post->user_id === Auth::user()->id)
       <div class="d-grid gap-2">
        <a class="btn btn-secondary btn-sm" href="{{ route('posts.edit', [$post->id]) }}">UPDATE</a>
        <form method="POST" action="{{ route('posts.destroy', [$post->id]) }}">
          @csrf
          @method("DELETE")
          <button class="btn btn-danger btn-sm" style="width: 100%" "submit">DELETE</button>
        </form>
       </div>
          <div class="row">
            <div class="col-2">
               
            </div>
            <div class="col-2">
              
            </div>
          </div>
        @endif
    </div>
    <div class="card-footer text-body-secondary text-center">
      Posted by {{ucfirst($user->name)}}
    </div>
  </div>
@endsection