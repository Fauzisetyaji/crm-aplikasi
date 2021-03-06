@extends('layouts.base')

@section('content')

<main class="main-content">

    <div class="hero hero-slider">
        <ul class="slides">
            <li data-bg-image="{{ asset('frontend-assets/dummy/banner1.png') }}">
                <div class="container">

                   <h1 class="slide-title"><b> </h1>
                    <p class="slide-desc">
<br>   </b>
</p>
<br><br><br><br><br><br><br><br>
                    <a href="http://localhost:8000/user/my-booking/create" class="button">Booking now</a>
                </div>
            </li>
            <li data-bg-image="{{ asset('frontend-assets/dummy/banner4.png') }}"> 
                <div class="container">
                    <h2 class="slide-title"><b></h2>
                    <p class="slide-desc"> </p></b>
                    <br><br><br><br><br><br><br><br><br><br><br>
                    <a href="http://localhost:8000/register" class="button">Registasi Sekarang!</a>
                   
                </div>
            </li>
            <li data-bg-image="{{ asset('frontend-assets/dummy/banner2.png') }}">
                <div class="container">
                    <!--<h2 class="slide-title"><b>Mekanik handal</h2>
                    <p class="slide-desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, <br> totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p></b>
                    <a href="#" class="button">Read more</a>
                </div>-->
            </li>
            </li>
            <li data-bg-image="{{ asset('frontend-assets/dummy/banner3.png') }}">
                <div class="container">
                    
                    <br><br><br><br><h2 class="slide-title"><font color=”#000000″><b>My Reward</font></h2>
                    <p class="slide-desc"> </p></b>
                    <a href="http://localhost:8000/user/my-profile" class="button">Claim Now</a>

                </div>
            </li>
        </ul>
    </div> <!-- .hero-slider -->

    <div class="fullwidth-block">
        <div class="container">
            <h2 class="section-title">Welcome to Astrido Toyota Pondok Cabe</h2>
            <p class="section-desc">Kami sudah berpengalaman di dunia otomotif khususnya roda empat.</p>
            <div class="row">
                
                <div class="counter">
                    <img src="{{ asset('frontend-assets/images/icon-car.png') }}" class="counter-icon">
                    <h3 class="counter-num">>10000</h3>
                    <small class="counter-label">Unit kendaraan kami service</small>
                </div>
                
                
                <div class="counter">
                    <img src="{{ asset('frontend-assets/images/icon-wrench.png') }}" class="counter-icon">
                    <h3 class="counter-num">>5000</h3>
                    <small class="counter-label">Diagnosa ditangani dengan baik </small>
                </div>
                
                
                <div class="counter">
                    <img src="{{ asset('frontend-assets/images/icon-gears.png') }}" class="counter-icon">
                    <h3 class="counter-num">>6000</h3>
                    <small class="counter-label">Penggantian suku cadang</small>
                </div>
                
                
                <div class="counter last">
                    <img src="{{ asset('frontend-assets/images/icon-oil.png') }}" class="counter-icon">
                    <h3 class="counter-num">>1200</h3>
                    <small class="counter-label">Oil liter terpakai</small>
                </div>
                
            </div>
        </div> <!-- .container -->
    </div> <!-- .fullwidth-block -->

    <div class="fullwidth-block dark-bg" data-bg-color="#1b1b1b">
        <div class="container">
            <h2 class="section-title">Testimoni</h2>
            <div class="row">
                <div class="hero hero-slider">
                    <ul class="slides cut-slide ">
                        <li>
                            <div class="container">

                                <h4 class="slide-title">Bpk.Fauzi </h2>
                                <p class="slide-desc">Layanan booking service online,  sangat berguna.</p>
                            </div>
                        </li>
                        <li>
                            <div class="container">
                                <h4 class="slide-title">Kop Telkomsel</h2>
                                <p class="slide-desc">Kami sudah pelanggan tetap sini, fasilitas yang ditawarkan sangat bagus.</p>
                            </div>
                        </li>
                        <li>
                            <div class="container">
                                <h4 class="slide-title">Ibu.Rumah tangga</h2>
                                <p class="slide-desc">Fasilitas dari easy service sangat bagus, karena memudahkan untuk ibu rumah tangga seperti saya.</p>
                            </div>
                        </li>
                    </ul>
                </div> <!-- .hero-slider -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .fullwidth-block -->

    <div class="fullwidth-block">
        <div class="container">
            <h2 class="section-title">Kenapa Astrido Toyota Pondok Cabe?</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature">
                        <div class="feature-icon">
                            <img src="{{ asset('frontend-assets/images/icon-wheel-white.png') }}">
                        </div>
                        <h3 class="feature-title">Astrido Toyota Pondok Cabe</h3>
                        <p>Kami sudah berpengalaman di dunia otomotif sejak 2011.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <div class="feature-icon">
                            <img src="{{ asset('frontend-assets/images/icon-wrench-white.png') }}">
                        </div>
                        <h3 class="feature-title">Service berkala</h3>
                        <p>Silahkan lakukan service berkala kendaraan ada di Astrido Toyota Pondok Cabe.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <div class="feature-icon">
                            <img src="{{ asset('frontend-assets/images/icon-key-white.png') }}">
                        </div>
                        <h3 class="feature-title">Pengamanan ketat</h3>
                        <p>Pengamanan kendaraan saat masuk dan keluar akan di periksa.</p>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .fullwidth-block -->

    <div class="fullwidth-block dark-bg" data-bg-color="#C43232">
        <div class="container">
            <h2 class="section-title">Berita - Artikel</h2>
            <ul class="news">
                <li>
                    <div class="entry-date"><span class="date">1</span><span class="month">Februari</span></div>
                    <div class="entry-summary">LAYANAN BOOKING SERVICE ONLINE<br> Layanan booking service online sudah dapat digunakan diwebsite pada ini, silahkan daftar terlebih dahulu untuk melakukan service booking online.<a href="http://localhost:8000/user/my-booking/create"</a> (link)<!--<br><a href="http://localhost:8000/user/my-booking/create" class="button">Read more</a></div>--></a>
                </li>
                <li>
                    <div class="entry-date"><span class="date">19</span><span class="month">April</span></div>
                    <div class="entry-summary">CLAIM REWAD<br> Kumpulkan poin, claim rewardnya. <a href="http://localhost:8000/user/my-profile"</a> (link)<br><!--<a href="http://localhost:8000/user/my-booking/create" class="button">Read more</a></div>--></a>
                </li>
                <li>
                    <div class="entry-date"><span class="date">28</span><span class="month">June</span></div>
                    <div class="entry-summary">CARA MENGATASI AKI SOAK<br> Cara memulihkan aki yang telah ngedrop, rusak maupun soak dapat diterapkan dengan trik yang begitu ringan dan tentunya tak usah mengeluarkan banyak uang alias hemat. Aki motor maupun aki mobil pada dasarnya lama kelamaan pastinya akan terjadi kerusakan.<br><!--<a href="#" class="button">Read more</a></div>-->

                </li>
            </ul>
            <div class="text-center">
                <a href="#" class="button invert">Show more news</a>
            </div>

        </div>
    </div>

</main> <!-- .main-content -->
@endsection
