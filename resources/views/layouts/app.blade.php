<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
  {{-- <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-4" aria-label="Third navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Write-a-post</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggle"
        aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggle">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home')}}">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard')}}">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('posts')}}" tabindex="-1" aria-disabled="true">Show Posts</a>
  </li>
  </ul>
  <ul class="navbar-nav">
    @auth
    <li class="nav-item"><a href="" class="nav-link "><i class="bi bi-person-fill"></i>{{ auth()->user()->name }}</a>
    </li>
    <li class="nav-item">
      <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-secondary">Logout</button>
      </form>
      @endauth

      @guest
    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Sign up</a></li>
    @endguest
  </ul>
  </div>
  </div>
  </nav> --}}
  <nav class="navbar navbar-expand-sm mb-4">
    <ul class="navbar-nav my-2 mx-3">
      <li class="nav-item">
        <a class="nav-link btn btn-lg btn-warning px-4" href="{{ route('posts')}}" tabindex="-1"
          aria-disabled="true">Show
          Posts</a>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto my-2 mx-3">
      @auth
      <li class="nav-item"><a href="" class="nav-link px-4 text-uppercase link-dark">{{ auth()->user()->name }}</a>
      </li>
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="btn btn-outline-dark">Logout</button>
        </form>
        @endauth

        @guest
      <li class="nav-item"><a href="{{ route('login') }}" class="nav-link btn btn-dark px-4 mx-2">Login</a></li>
      <li class="nav-item"><a href="{{ route('register') }}" class="nav-link btn btn-outline-dark px-3 mx-2">Sign up</a>
      </li>
      @endguest
    </ul>
  </nav>

  <div class="container">
    @yield('content')
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
  </script>
</body>

</html>