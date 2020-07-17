<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 ,shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header id="header" class="header-section">
        <div class="container  font-weight-bold mon-nav">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="{{ asset('img/P0.png') }}" width="30" height="30" class="d-inline-block align-top"
                        alt="E-Lerning">
                    <span>E-Lerning</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">&nbsp;</span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link text-white" href="{{ route('course.index') }}">Cources</a></li>
                        <li class="nav-item active"><a class="nav-link text-white" href="#">Teachers</a></li>
                        @guest
                        <li class="nav-item active"><a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item active"><a class="nav-link text-white"
                                href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                {{ Auth::user()->name }} <span class="caret">&nbsp;</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right bg-info" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>