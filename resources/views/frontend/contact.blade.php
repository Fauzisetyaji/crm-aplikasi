@extends('layouts.base')

@section('content')
<main class="main-content">
    <div class="fullwidth-block content">
        <div class="container">
            <h2 class="entry-title">Silahkan Hubungi Kami</h2>

            <div class="row">
                <div class="col-md-5">
                    <form action="#" class="contact-form">
                        <input type="text" id="name" placeholder="Name...">
                        <input type="text" id="email" placeholder="Email...">
                        
                        <textarea name="" id="message" placeholder="Message..."></textarea>
                        <div class="text-right">
                            <input type="submit" value="Send message">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <div class="map-container">
                        <div class="map"></div>
                        <address>
                            <strong>Astrido Toyota Pondok Cabe.</strong>
                            <a href="https://www.google.com/maps/place/Astrido+Toyota+-+Pondok+Cabe/@-6.3379088,106.7637966,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69efabebb64fdd:0x62426c13032373fb!8m2!3d-6.3379088!4d106.7659853">office@astridotoyotapondokcabe.com</a> <br>
                            <span>Jl. Pondok Cabe Raya Blok CA/1 Ciputat, Tangerang 15418</span> <br>
                            <a href="tel:532930098891">Showroom: 021-7410888, Service: 021-7421888</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> <!-- .main-content -->
@endsection
