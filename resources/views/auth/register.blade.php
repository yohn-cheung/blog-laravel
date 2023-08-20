 @extends('layout')
 
@section('title', 'Register')
 
@section('content')
  <h1>Register</h1>

  <form method="POST" action="{{route('register')}}">
    @csrf
    <div class="row mb-3">
      <label for="name" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" name='name'  value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name">
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email"  name='email' value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" class="form-control" placeholder="Enter your email">
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
    </div>
    <div class="row mb-3">
      <label for="password" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
         <input type="password" name='password' value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
    </div>
     <div class="row mb-3">
      <div class="col-sm-10 offset-sm-2 d-grid">
        <button type="submit" class="btn btn-primary btn-sm">Register</button>  
      </div>
    </div>
     <div class="row mb-3">
      <div class="col-sm-10 offset-sm-2 text-center">
        If your already have an account, to go <a href="{{route('login')}}">login</a>
      </div>
    </div>
  </form> 

@endsection