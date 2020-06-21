@extends('layouts.app')

@section('content')
<section class="my-login-page h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="brand">
                    <img src="{{ asset('img/P4.png') }}" alt="logo">
                </div>
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title text-center">Login</h4>
                        <form method="POST" class="my-login-validation" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                <div class="invalid-feedback" role="alert"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="float-right"> Forgot Password? </a>
                                    @endif
                                </label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required data-eye autocomplete="current-password">
                                <div class="invalid-feedback"> Password is required </div>
                                @error('password')
                                <div class="invalid-feedback" role="alert"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                    <label for="remember" class="custom-control-label">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block"> Login </button>
                            </div>
                            <div class="mt-4 text-center"> Don't have an account? <a
                                    href="{{ route('register') }}">Create One</a> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection