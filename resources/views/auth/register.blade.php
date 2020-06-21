@extends('layouts.app')

@section('content')
<section class="h-100 my-login-page">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="brand">
                    <img src="{{ asset('img/P4.png') }}" alt="logo">
                </div>
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title text-center">Register</h4>
                        <form method="POST" class="my-login-validation" novalidate="" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" required autofocus value="{{ old('name') }}" autocomplete="name">
                                @error('name')
                                <div class="invalid-feedback" role="alert"> {{ $message }} </div>
                                @enderror
                                <div class="invalid-feedback">
                                    What's your name?
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <div class="invalid-feedback" role="alert"> {{ $message }} </div>
                                @enderror
                                <div class="invalid-feedback">
                                    Your email is invalid
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required data-eye autocomplete="new-password">
                                @error('password')
                                <div class="invalid-feedback" role="alert"> {{ $message }} </div>
                                @enderror
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input id="password-2" type="password" class="form-control" name="password_confirmation"
                                    required data-eye>
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>
                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Register
                                </button>
                            </div>
                            <div class="mt-4 text-center">
                                Already have an account? <a href="{{ route('login') }}">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection