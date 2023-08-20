<!-- resources/views/child.blade.php -->
 
@extends('layout')
 
@section('title', 'Welcome')
 
@section('content')
  <h1>Latest blog posts!</h1>
  <div class="col-lg-8 px-0">
    @forelse ($posts as $post)
    <section class="my-4">
      <h5>{{$post->title}}</h5>
      <p>{{ substr($post->description, 0, 150)}}... <a href="{{ route('posts.show', [$post->id]) }}">Read More</a></p>
      <hr>
    </section>

     
    @empty
    <p class="fs-5">
      There are no posts
    </p>
    @endforelse
	</div>
@endsection