@extends('layouts.base')

@section('content')
<main class="main-content">
    <div class="fullwidth-block content">
        <div class="container">
            <h2 class="entry-title">Perawatan berkala selesai 1 jam  >>> Harga Tetap, Waktu Hemat</h2>

            <figure class="block">
                <img src="{{ asset('frontend-assets/dummy/figure.jpg') }}" alt="">
            </figure>
            <p>Anda tak perlu menunggu terlalu lama dalam melakukan perawatan berkala Daihatsu Anda di bengkel kami. Kini Anda dapat memanfaatkan Layanan Service Super Cepat.</p>
            <p>Layanan ini merupakan salah satu terobosan untuk memberikan servis berkualitas dengan waktu yang lebih singkat. Dengan fasilitas stall khusus dan peralatan yang lebih lengkap dan dikerjakan oleh 3 orang teknisi, maka Anda akan menemukan pengalaman baru servis kendaraan berkualitas dengan waktu yang lebih singkat dan harga tetap. Untuk sementara layanan ini terdapat di bengkel-bengkel Astrido Daihatsu sebagai berikut:</p>
            <p>Astrido Toyota Pondok Cabe.  Telp : 021-5688670<br>
            Astrido Daihatsu Otista              Telp : 021-8191991</p>
            <p>Demi meningkatkan kepuasan pelanggan, Astrido Daihatsu berkomitmen untuk terus menambah jaringan bengkel Service Super Cepat
            Untuk mendapatkan layanan ini, Anda bisa menghubungi booking servis di tiap-tiap bengkel diatas.</p>

            <div class="feature-grid">
                <div class="feature">
                    <figure class="feature-image"><img src="{{ asset('frontend-assets/images/icon-cpu.png') }}" alt=""></figure>
                    <h2 class="feature-title">CPU Diagnostics</h2>
                    <p>Detect problems long before they cause a breakdown. Diagnostic tools can also check a cars computer system.</p>
                </div>
                <div class="feature">
                    <figure class="feature-image"><img src="{{ asset('frontend-assets/images/icon-suspension.png') }}" alt=""></figure>
                    <h2 class="feature-title">Suspension</h2>
                    <p>Makes it possible to control the vehicle while driving. Car suspension works by absorbing the shock.</p>
                </div>
                <div class="feature">
                    <figure class="feature-image"><img src="{{ asset('frontend-assets/images/icon-engine.png') }}" alt=""></figure>
                    <h2 class="feature-title">Engine</h2>
                    <p>Repair and tune-up to an engine overhaul, Repco Authorised Service have all the skills and expertise.</p>
                </div>
                <div class="feature">
                    <figure class="feature-image"><img src="{{ asset('frontend-assets/images/icon-brake.png') }}" alt=""></figure>
                    <h2 class="feature-title">Brakes</h2>
                    <p>Quick brake repair and replacement services for domestic and import vehicles.</p>
                </div>
                <div class="feature">
                    <figure class="feature-image"><img src="{{ asset('frontend-assets/images/icon-steering.png') }}" alt=""></figure>
                    <h2 class="feature-title">Steering</h2>
                    <p>The system usually contains a power steering pump, steering gear & linkages, drive belts, bearings, valves.</p>
                </div>
                <div class="feature">
                    <figure class="feature-image"><img src="{{ asset('frontend-assets/images/icon-exhaust.png') }}" alt=""></figure>
                    <h2 class="feature-title">Exhaust System</h2>
                    <p>We offer Competitive Precision Exhaust Systems and Repairs including Performance Exhaust Systems.</p>
                </div>
            </div>
        </div>
    </div>
</main> <!-- .main-content -->
@endsection
