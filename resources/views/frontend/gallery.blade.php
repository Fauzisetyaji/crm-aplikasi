@extends('layouts.base')

@section('content')
<main class="main-content">
    <div class="fullwidth-block content">
        <div class="container">
            <h2 class="entry-title">Astrido Toyota Pondok Cabe</h2>
            <h3 =>New Rush 2018</h3>

            <div class="text-center">
                <div class="filter-links filterable-nav">
                    <select class="mobile-filter">
                        <option value="*">Show all</option>
                        <option value=".cars">Cars</option>
                        <option value=".interior">Interior</option>
                        <option value=".race">Engine</option>
                        <option value=".other">Body</option>
                    </select>
                    <a href="#" class="current wow fadeInRight" data-filter="*">Show all</a>
                    <a href="#" class="wow fadeInRight" data-wow-delay=".2s" data-filter=".cars">Cars</a>
                    <a href="#" class="wow fadeInRight" data-wow-delay=".4s" data-filter=".interior">Interior</a>
                    <a href="#" class="wow fadeInRight" data-wow-delay=".6s" data-filter=".race">Engine</a>
                    <a href="#" class="wow fadeInRight" data-wow-delay=".8s" data-filter=".other">Body</a>
                </div>
            </div>

            <div class="filterable-items">
                <div class="gallery-item filterable-item interior">
                    <a href="{{ asset('frontend-assets/dummy/large-gallery/Toyota_Rush_SUV_L_7.jpg') }}"><figure class="featured-image">
                            <img src="{{ asset('frontend-assets/dummy/Toyota_Rush_SUV_L_7.jpg') }}" alt="">
                            <figcaption>Interior</figcaption>
                        </figure></a>
                </div>



                <div class="gallery-item filterable-item other">
                    <a href="{{ asset('frontend-assets/dummy/large-gallery/Toyota_Rush_SUV_L_4.jpg') }}"><figure class="featured-image">
                            <img src="{{ asset('frontend-assets/dummy/Toyota_Rush_SUV_L_4.jpg') }}" alt="">
                            <figcaption>Front</figcaption>
                        </figure></a>
                </div>
                <div class="gallery-item filterable-item cars">
                     <a href="{{ asset('frontend-assets/dummy/large-gallery/Toyota_Rush_SUV_L_1.jpg') }}"><figure class="featured-image">
                            <img src="{{ asset('frontend-assets/dummy/Toyota_Rush_SUV_L_1.jpg') }}" alt="">
                            <figcaption>Cars</figcaption>
                        </figure></a>
                </div>
                <div class="gallery-item filterable-item race">
                    <a href="{{ asset('frontend-assets/dummy/large-gallery/mesin.jpg') }}"><figure class="featured-image">
                            <img src="{{ asset('frontend-assets/dummy/mesin.jpg') }}" alt="">
                            <figcaption>Engine</figcaption>
                        </figure></a>
                </div>
                <div class="gallery-item filterable-item other">
                    <a href="{{ asset('frontend-assets/dummy/large-gallery/Toyota_Rush_SUV_L_5.jpg') }}"><figure class="featured-image">
                            <img src="{{ asset('frontend-assets/dummy/Toyota_Rush_SUV_L_5.jpg') }}" alt="">
                            <figcaption>Back</figcaption>
                        </figure></a>
                </div>
                <div class="gallery-item filterable-item other">
                    <a href="{{ asset('frontend-assets/dummy/large-gallery/Toyota_Rush_SUV_L_2.jpg') }}"><figure class="featured-image">
                            <img src="{{ asset('frontend-assets/dummy/Toyota_Rush_SUV_L_2.jpg') }}" alt="">
                            <figcaption>Right</figcaption>
                        </figure></a>
                </div>
            </div>
        </div>
    </div>
</main> <!-- .main-content -->
@endsection
