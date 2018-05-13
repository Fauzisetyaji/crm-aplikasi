<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Astrido | @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    @yield('scriptsHead')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('auth-home') }}">
                        Astrido
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                @if (!Auth::guest())
                <div class="col-sm-3 col-md-2 sidebar">
                  <ul class="nav nav-sidebar">
                    <li><a href="{{ route('auth-home') }}">Dashboard</a></li>
                    <li class="active"><a class="dropdown-btn">Master <span class="sr-only">(current)</span></a></li>
                    <div class="dropdown-container">
                        <ul class="nav nav-sidebar">
                            <li><a href="{{ route('staff.index') }}">Staff</a></li>
                            <li><a href="{{ route('mekanik.index') }}">Mekanik</a></li>
                            <li><a href="{{ route('reward.index') }}">Reward</a></li>
                            <li><a href="{{ route('operasional.index') }}">Jadwal Operasional</a></li>
                        </ul>
                    </div>
                    <li><a class="dropdown-btn">Promo</a></li>
                    <div class="dropdown-container">
                        <ul class="nav nav-sidebar">
                            <li><a href="">Promo Non Pelanggan</a></li>
                            <li><a href="">Promo Pelanggan</a></li>
                        </ul>
                    </div>
                  </ul>
                  <ul class="nav nav-sidebar">
                    <li><a href="{{ route('service.index') }}">Service</a></li>
                    <li><a href="{{ route('keluhan.index') }}">Keluhan</a></li>
                  </ul>
                  <ul class="nav nav-sidebar">
                    <li><a href="{{ route('testimoni.index') }}">Testimoni</a></li>
                    <li><a class="dropdown-btn">Laporan</a></li>
                    <div class="dropdown-container">
                        <ul class="nav nav-sidebar">
                            <li><a href="">Booking Service</a></li>
                            <li><a href="">Top Service</a></li>
                            <li><a href="">Top Pelanggan</a></li>
                        </ul>
                    </div>
                  </ul>
                </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var dropdownContent = document.getElementsByClassName("dropdown-container");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            (function(i){
                dropdown[i].addEventListener('click', function(event) {
                    if (dropdownContent[i].style.display === "block") {
                        dropdownContent[i].style.display = "none";
                        dropdown[i].style.background = "none";
                    } else {
                        dropdownContent[i].style.display = "block";
                        dropdown[i].style.background = "#eee";
                    }
                }, false);
            })(i);
            
        }
    </script>

    @yield('scripts')
</body>
</html>
