<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Astrido') }}</title>
    
    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Titillium+Web:300,400,700|" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Loading main css file -->
    <link href="{{ asset('frontend-assets/style.css') }}" rel="stylesheet">
    
    <!--[if lt IE 9]>
    <script src="js/ie-support/html5.js"></script>
    <script src="js/ie-support/respond.js"></script>
    <![endif]-->

</head>
<body class="{{ Request::path() == '/' ? 'header-collapse' : '' }}">
    
    <div id="site-content">
        <header class="site-header">
            <div class="container">
                <a id="branding" href="index.html">
                    <img src="{{ asset('frontend-assets/images/logo.png') }}" alt="Company Logo" class="logo">
                    <h1 class="site-title">Astrido<span>Indonesia</span></h1>
                </a>

                <nav class="main-navigation">
                    <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                    <ul class="menu">
                        <li class="menu-item {{ Request::path() == '/' ? 'current-menu-item' : '' }}"><a href="{{ route('user-home') }}">Home</a></li>
                        <li class="menu-item {{ Request::path() == 'about' ? 'current-menu-item' : '' }}"><a href="{{ route('user-about') }}">About</a></li>
                        <li class="menu-item {{ Request::path() == 'service' ? 'current-menu-item' : '' }}"><a href="{{ route('user-service') }}">Services</a></li>
                        <li class="menu-item {{ Request::path() == 'gallery' ? 'current-menu-item' : '' }}"><a href="{{ route('user-gallery') }}">Gallery</a></li>
                        <li class="menu-item {{ Request::path() == 'contact' ? 'current-menu-item' : '' }}"><a href="{{ route('user-contact') }}">Contact</a></li>
                        @if (Auth::guest())
                            <li class="menu-item"><a href="{{ route('login') }}">Login</a></li>
                        @else
                            @if(Auth::user()->roles === 'staff')
                                <li class="menu-item"><a href="{{ route('auth-home') }}">Dashboard</a></li>
                            @elseif(Auth::user()->roles === 'pelanggan')
                                <li class="menu-item"><a href="{{ route('auth-home-user') }}">Dashboard</a></li>
                            @elseif(Auth::user()->roles === 'kepala-cabang')
                                <li class="menu-item"><a href="{{ route('auth-home-branch') }}">Dashboard</a></li>
                            @endif
                        @endif

                    </ul>
                </nav>
                <nav class="mobile-navigation"></nav>
            </div>
        </header> <!-- .site-header -->

        @yield('content')

        <footer class="site-footer">
            <div class="container">
                <div class="social-links">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
                <div class="copy">
                    <p>Copyright 2018 {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
                </div>
            </div>
        </footer> <!-- .site-footer -->

    </div> <!-- #site-content -->

    

    <script src="{{ asset('frontend-assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script src="{{ asset('frontend-assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/app.js') }}"></script>
    
</body>

</html>