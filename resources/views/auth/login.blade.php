 @extends('layout')
 
@section('title', 'Login')
 
@section('content')
  <h1>Login</h1>
  <form method="POST" action="{{route('login')}}">
     @csrf
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Email</label>
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
        <button type="submit" class="btn btn-primary btn-sm">Log in</button>
      </div>
    </div>
     <div class="row mb-3">
      <div class="col-sm-10 offset-sm-2 text-center">
         Please <a href="{{route('register')}}">register</a> if you do not have an account.
      </div>
    </div>
  </form>
@endsection