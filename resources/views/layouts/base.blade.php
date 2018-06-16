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
                    <img src="{{ asset('img/logo-astrido.png') }}" alt="Company Logo" class="logo">
                    <h1 class="site-title">Astrido Toyota <span> Pondok Cabe</span></h1>
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
                    <!--<a href="https://www.twitter.com"><i  class=>share twitter</a>></i>
                    <a href="https://www.facebook.com"><i  class=>share facebook</a>></i>-->
                   <div id="fb-root"></div>
<!--<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="box_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Bagikan</a></div>-->

<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_google_plus"></a>
</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->

                    <a href="#"><i class=twitter></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
                <div class="copy">
                    <p>Fauzi Setyaji Copyright 2018  {{ config('app.name', 'Laravel') }}. <a href="https://www.budiluhur.ac.id"><i  class=>Universitas Budi Luhur</a></i>.</p>
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