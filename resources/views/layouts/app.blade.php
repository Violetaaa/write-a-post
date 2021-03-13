<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a href="{{ route('home')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('dashboard')}}" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="{{ route('posts')}}" class="nav-link">Posts</a></li>
            </ul>  
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item"><a href="" class="nav-link">{{ auth()->user()->name }}</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                @endauth

                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>  
                @endguest
            </ul>
            {{-- <ul class="navbar-nav ms-auto">
                @if (auth()->check())
                        <li class="nav-item"><a href="" class="nav-link">{{ auth()->user()->name }}</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Logout</a></li>
                    @else
                        <li class="nav-item"><a href="" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>  
                    @endif
                </ul> --}}
            </div>
        </nav>
 <div class="container">
    @yield('content')
 </div>
   


   

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>