@extends('layouts.base')

@section('content')
<main class="main-content">
    <div class="fullwidth-block content">
        <div class="container">
            <h2 class="entry-title">Natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto</h2>

            <figure class="block">
                <img src="{{ asset('frontend-assets/dummy/figure.jpg') }}" alt="">
            </figure>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p>

            <div class="feature-grid">
                <div class="feature">
                    <figure class="feature-image"><img src="{{ asset('frontend-assets/images/icon-cpu.png') }}" alt=""></figure>
                    <h2 class="feature-title">CPU Diagnostics</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas dicta earum aliquam</p>
                </div>
                <div class="feature">
                    <figure class="feature-image"><img src="{{ asset('frontend-assets/images/icon-suspension.png') }}" alt=""></figure>
                    <h2 class="feature-title">Suspension</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas dicta earum aliquam</p>
                </div>
                <div class="feature">
                    <figure class="feature-image"><img src="{{ asset('frontend-assets/images/icon-engine.png') }}" alt=""></figure>
                    <h2 class="feature-title">Engine</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas dicta earum aliquam</p>
                </div>
                <div class="feature">
                    <figure class="feature-image"><img src="{{ asset('frontend-assets/images/icon-brake.png') }}" alt=""></figure>
                    <h2 class="feature-title">Brakes</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas dicta earum aliquam</p>
                </div>
                <div class="feature">
                    <figure class="feature-image"><img src="{{ asset('frontend-assets/images/icon-steering.png') }}" alt=""></figure>
                    <h2 class="feature-title">Steering</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas dicta earum aliquam</p>
                </div>
                <div class="feature">
                    <figure class="feature-image"><img src="{{ asset('frontend-assets/images/icon-exhaust.png') }}" alt=""></figure>
                    <h2 class="feature-title">Exhaust System</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas dicta earum aliquam</p>
                </div>
            </div>
        </div>
    </div>
</main> <!-- .main-content -->
@endsection
