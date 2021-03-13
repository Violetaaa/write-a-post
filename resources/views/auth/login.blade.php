@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Login</h3>

        @if (session('status'))
            <div>{{  session('status')}}</div>
        @endif

        <form action="{{ route('login') }}" method="post" class="form-signin">
            @csrf

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name ="email" id="email" aria-describedby="emailHelp"    placeholder="Enter email">

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
            
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                  Remember me
                </label>
              </div>

            <button type="submit" class="btn btn-primary">Login</button>

          </form>
    </div>
@endsection