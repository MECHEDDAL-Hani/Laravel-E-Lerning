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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">&nbsp;</span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link text-white" href="#">Cources</a></li>
                        <li class="nav-item active"><a class="nav-link text-white" href="#">Teachers</a></li>
                        @auth
                        <li class="nav-item active"><a class="nav-link text-white" href="{{ url('/home') }}">Home</a>
                        </li>
                        @else
                        <li class="nav-item active"><a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item active"><a class="nav-link text-white"
                                href="{{ route('register') }}">Register</a></li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <section id="Imag-slid" class="carousel slide row" data-ride="carousel">
            <div class="carousel-inner ">
                <div class="carousel-item active">
                    <img class="d-block img-fluid w-100" src="{{ asset('img/P1.png') }}" alt="E-Lerning Image 01">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid w-80" src="{{ asset('img/P2.png') }}" alt="E-Lerning Image 02">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid w-80" src="{{ asset('img/P3.png') }}" alt="E-Lerning Image 03">
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#Imag-slid" data-slide-to="0" class="active">&nbsp;</li>
                <li data-target="#Imag-slid" data-slide-to="1">&nbsp;</li>
                <li data-target="#Imag-slid" data-slide-to="2">&nbsp;</li>
            </ol>
        </section>
        <section class="page-section bg-primary text-white row">
            <div class="card-body text-center">
                <h3>E-lerning</h3>
                <h5 class="card-title">New Educational Technology</h5>
                <p class="lead card-text">Used Technologies For Learning And Self Development.</p>
            </div>
        </section>
    </div>
    <div class="copyright container py-4 text-center text-white">
        <div class="container"><small>Copyright © Your Website 2020</small></div>
    </div>
 <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
