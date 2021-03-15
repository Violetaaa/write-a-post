@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-8">

            @if (session('status'))
            <div class="alert alert-danger" role="alert">{{ session('status') }}</div>
            @endif

            <form action="{{ route('login') }}" method="post" class="form-signin">

                <h3 class="p-3 text-center">Please sign in</h3>

                @csrf

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name="email"
                        id="email" aria-describedby="emailHelp" placeholder="Enter email">

                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        id="password" placeholder="Password">

                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark col-12">Sign in</button>
                </div>

            </form>

            <p class="text-center mt-4">
                <a href="{{ route('register') }}" class="link-dark">Not a member? Create an account</a>
            </p>
        </div>
    </div>

</div>
@endsection