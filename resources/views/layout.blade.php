<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Blog - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Mini Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{request()->routeIs('home') ? 'active' : ''}}" aria-current="page" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{request()->routeIs('about') ? 'active' : ''}}" aria-current="page" href="{{route('about')}}">About</a>
            </li>
            @auth
              <li class="nav-item">
                <a class="nav-link {{request()->routeIs('posts.create') ? 'active' : ''}}" aria-current="page" href="{{route('posts.create')}}">Create Post</a>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link {{request()->routeIs('register') ? 'active' : ''}}" aria-current="page" href="{{route('register')}}">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{request()->routeIs('login') ? 'active' : ''}}" aria-current="page" href="{{route('login')}}">Login</a>
              </li>
            @endauth
            
          </ul>
          @auth
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
              <ul class="dropdown-menu">
                <li> <span class="dropdown-item">User: {{ucfirst(Auth::user()->name)}}</span></li>
                <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
              </ul>
            </li>
          </ul>
          @endauth
        </div>
      </div>
    </nav>

    
    <div class="container my-5">
      @includeWhen($errors->any(), '_errors')
      @if (session('success'))
        <div class="alert alert-success" role="alert">
          {{session('success')}}
        </div>
      @endif
      @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>