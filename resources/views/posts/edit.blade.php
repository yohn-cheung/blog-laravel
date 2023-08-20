@extends('layout')
 
@section('title', 'Update post')
 
@section('content')
  <h1>Update post - {{$post->title}}</h1>
  
  <form method="POST" action="{{route('posts.update', ['post' => $post->id]) }}">
		@csrf
        @method("PUT")

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name='title' value="{{ old('title', $post->title) }}" class="form-control @error('title') is-invalid @enderror"/>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">
                    {{ old('description', $post->description) }}
                </textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2 d-grid">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </div>
        
    </form>
@endsection