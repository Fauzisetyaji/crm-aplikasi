@extends('layouts.base')

@section('content')
<main class="main-content">
    <div class="fullwidth-block content">
        <div class="container">
            <h2 class="entry-title">Lakukan service berkla di Astrido Toyota Pondok Cabe</h2>

            <figure class="block">
                <img src="{{ asset('frontend-assets/dummy/figure.jpg') }}" alt="">
            </figure>  
            <h2>Apa manfaat dari Servis Berkala?</h2> 
            <p>• Servis Berkala secara RUTIN sangat penting untuk menjaga kendaraan TOYOTA Anda tetap dalam kondisi PRIMA
            <br>• Servis Berkala cukup dilakukan setiap kelipatan 10.000Km/6 bulan, biaya lebih HEMAT, kualitas pengerjaan standar TOYOTA.
            <br>• Servis Berkala merupakan syarat berlakunya WARRANTY. 
            <br>• Servis Berkala merupakan pekerjaan pemeriksaan dan pemeliharaan yang KOMPLIT untuk seluruh bagian mobil.
            <br>• Seluruh pekerjaan dilakukan dengan peralatan khusus Toyota oleh Teknisi terlatih dan berpengalaman</p>

            <h2>Periode Servis Berkala:</h2>
            <b><font size="5">1.000km</font></b>
            <p>Analisa dan pengaturan:
            <br>Emisi gas buang, chassis dan body, oli mesin, sistem dan saluran pendinginan mesin, minyak (rem, kopling, & power steering) </p>
            <h2>10.000, 30.000, 50.000, 70.000 & 90.000 km</h2>
            <p>Semua pekerjaan di Servis Berkala 1.000 km, ditambah dengan Ganti oli mesin
            <br>Analisa dan pengaturan:
            <br>Performa mesin, sistem rem, serta ban (Tekanan, rotasi + balancing roda depan)</p>

            <h2>20.000, 60.000 & 100.000 km</h2>
            <p>Semua pekerjaan di Servis Berkala 10.000 km, ditambah dengan:</p>
            <h2>40.000, 80.000 & 120.000 km</h2>
            <p>Semua pekerjaan di Servis Berkala 20.000 km, ditambah dengan:
            <br>» Ganti busi.
            <br>» Ganti oli (transmisi dan diferensial).
            <br>» Ganti minyak rem dan saringan udara
            <br>» Ganti saringan bahan bakar (tiap kelipatan 80.000 km).</p>

            <p>Astrido Toyota Pondok Cabe.  Telp : 021-7421888<br>
            <p>Demi meningkatkan kepuasan pelanggan, Astrido Toyota Pondok Cabe berkomitmen untuk terus meningkatkan kualitas pelayanan.
            Untuk mendapatkan layanan ini, Anda bisa menghubungi booking servis bengkel Astrido Toyota Pondok Cabe.</p>

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
