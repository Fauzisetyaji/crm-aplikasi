@extends('layouts.base')

@section('content')
<main class="main-content">
    <div class="fullwidth-block content">
        <div class="container">
            <h2 class="entry-title">Lebih dekat dengan Astrido Toyota Pondok Cabe</h2>

            <div class="text-center">
                <div class="filter-links filterable-nav">
                    <select class="mobile-filter">
                        <option value="*">Show all</option>
                        <option value=".cars">Cars</option>
                        <option value=".interior">Interior</option>
                        <option value=".race">Mekanik</option>
                        <option value=".other">Other</option>
                    </select>
                    <a href="#" class="current wow fadeInRight" data-filter="*">Show all</a>
                    <a href="#" class="wow fadeInRight" data-wow-delay=".2s" data-filter=".cars">Cars</a>
                    <a href="#" class="wow fadeInRight" data-wow-delay=".4s" data-filter=".interior">Interior</a>
                    <a href="#" class="wow fadeInRight" data-wow-delay=".6s" data-filter=".race">Mekanik</a>
                    <a href="#" class="wow fadeInRight" data-wow-delay=".8s" data-filter=".other">Other</a>
                </div>
            </div>

            <div class="filterable-items">
                <div class="gallery-item filterable-item interior">
                    <a href="{{ asset('frontend-assets/dummy/large-gallery/gallery-1.jpg') }}"><figure class="featured-image">
                            <img src="{{ asset('frontend-assets/dummy/gallery-1.jpg') }}" alt="">
                            <figcaption>Lorem ipsum dolor sit amet</figcaption>
                        </figure></a>
                </div>
                <div class="gallery-item filterable-item other">
                    <a href="{{ asset('frontend-assets/dummy/large-gallery/gallery-2.jpg') }}"><figure class="featured-image">
                            <img src="{{ asset('frontend-assets/dummy/gallery-2.jpg') }}" alt="">
                            <figcaption>Consectetur adipisicing elit</figcaption>
                        </figure></a>
                </div>
                <div class="gallery-item filterable-item cars">
                    <a href="{{ asset('frontend-assets/dummy/large-gallery/gallery-3.jpg') }}"><figure class="featured-image">
                            <img src="{{ asset('frontend-assets/dummy/gallery-3.jpg') }}" alt="">
                            <figcaption>Repellat fugit tenetur </figcaption>
                        </figure></a>
                </div>
                <div class="gallery-item filterable-item race">
                    <a href="{{ asset('frontend-assets/dummy/large-gallery/gallery-4.jpg') }}"><figure class="featured-image">
                            <img src="{{ asset('frontend-assets/dummy/gallery-4.jpg') }}" alt="">
                            <figcaption>Asperiores quas voluptatem</figcaption>
                        </figure></a>
                </div>
                <div class="gallery-item filterable-item other">
                    <a href="{{ asset('frontend-assets/dummy/large-gallery/gallery-5.jpg') }}"><figure class="featured-image">
                            <img src="{{ asset('frontend-assets/dummy/gallery-5.jpg') }}" alt="">
                            <figcaption>Ex quos ab perspiciatis</figcaption>
                        </figure></a>
                </div>
                <div class="gallery-item filterable-item other">
                    <a href="{{ asset('frontend-assets/dummy/large-gallery/gallery-6.jpg') }}"><figure class="featured-image">
                            <img src="{{ asset('frontend-assets/dummy/gallery-6.jpg') }}" alt="">
                            <figcaption>Natus dolores ad et ipsam</figcaption>
                        </figure></a>
                </div>
            </div>
        </div>
    </div>
</main> <!-- .main-content -->
@endsection
