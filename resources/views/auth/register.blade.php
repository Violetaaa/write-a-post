@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">


            <form action="{{ route('register') }}" method="post">

                <h3 class="py-4">Please register an account</h3>

                @csrf

                <div class="form-group row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Your name</label>
                    <div class="col-sm-9">
                        <input type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Enter your name">

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                </div>

                <div class="form-group row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Email address</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                </div>

                <div class="form-group row mb-3">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            id="username" placeholder="Enter username">
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" id="password" placeholder="Password">

                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-group row mb-3">
                    <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password_confirmation" id="password_confirmation" placeholder="Password again">

                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-dark mt-4 btn-lg px-5">Register</button>

            </form>
        </div>
    </div>
</div>
@endsection