@extends('layouts.base')

@section('content')
<main class="main-content">
    <div class="hero hero-slider">
        <ul class="slides">
            <li data-bg-image="{{ asset('frontend-assets/dummy/slide-1.jpg') }}">
                <div class="container">
                    <h2 class="slide-title">Place the header here</h2>
                    <p class="slide-desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, <br> totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p>
                    <a href="#" class="button">Read more</a>
                </div>
            </li>
            <li data-bg-image="{{ asset('frontend-assets/dummy/slide-2.jpg') }}">
                <div class="container">
                    <h2 class="slide-title">Place the slide 2 header here</h2>
                    <p class="slide-desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, <br> totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p>
                    <a href="#" class="button">Read more</a>
                </div>
            </li>
            <li data-bg-image="{{ asset('frontend-assets/dummy/slide-3.jpg') }}">
                <div class="container">
                    <h2 class="slide-title">Place third slide header here</h2>
                    <p class="slide-desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, <br> totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p>
                    <a href="#" class="button">Read more</a>
                </div>
            </li>
        </ul>
    </div> <!-- .hero-slider -->

    <div class="fullwidth-block">
        <div class="container">
            <h2 class="section-title">Welcome to our website</h2>
            <p class="section-desc">Occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>

            <div class="row">
                
                <div class="counter">
                    <img src="{{ asset('frontend-assets/images/icon-car.png') }}" class="counter-icon">
                    <h3 class="counter-num">1500</h3>
                    <small class="counter-label">car repaired</small>
                </div>
                
                
                <div class="counter">
                    <img src="{{ asset('frontend-assets/images/icon-wrench.png') }}" class="counter-icon">
                    <h3 class="counter-num">5000</h3>
                    <small class="counter-label">diagnoses</small>
                </div>
                
                
                <div class="counter">
                    <img src="{{ asset('frontend-assets/images/icon-gears.png') }}" class="counter-icon">
                    <h3 class="counter-num">6000</h3>
                    <small class="counter-label">gears changed</small>
                </div>
                
                
                <div class="counter last">
                    <img src="{{ asset('frontend-assets/images/icon-oil.png') }}" class="counter-icon">
                    <h3 class="counter-num">1200</h3>
                    <small class="counter-label">oil litres used</small>
                </div>
                
            </div>
        </div> <!-- .container -->
    </div> <!-- .fullwidth-block -->

    <div class="fullwidth-block dark-bg" data-bg-color="#1b1b1b">
        <div class="container">
            <h2 class="section-title">Testimoni</h2>
            <div class="row">
                <div class="hero hero-slider">
                    <ul class="slides cut-slide">
                        <li>
                            <div class="container">
                                <h4 class="slide-title">Place the header here</h2>
                                <p class="slide-desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, <br> totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p>
                            </div>
                        </li>
                        <li>
                            <div class="container">
                                <h4 class="slide-title">Place the header here</h2>
                                <p class="slide-desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, <br> totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p>
                            </div>
                        </li>
                        <li>
                            <div class="container">
                                <h4 class="slide-title">Place the header here</h2>
                                <p class="slide-desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, <br> totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p>
                            </div>
                        </li>
                    </ul>
                </div> <!-- .hero-slider -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .fullwidth-block -->

    <div class="fullwidth-block">
        <div class="container">
            <h2 class="section-title">Why choose us?</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature">
                        <div class="feature-icon">
                            <img src="{{ asset('frontend-assets/images/icon-wheel-white.png') }}">
                        </div>
                        <h3 class="feature-title">Sed ut perspiciatis unde omnis</h3>
                        <p>Iste natus error sit voluptatem accusantium laudantium totam rem aperiam eaque ipsa quae dolor inventore dolor sit.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <div class="feature-icon">
                            <img src="{{ asset('frontend-assets/images/icon-wrench-white.png') }}">
                        </div>
                        <h3 class="feature-title">Nemo enim ipsam voluptatem</h3>
                        <p>Iste natus error sit voluptatem accusantium laudantium totam rem aperiam eaque ipsa quae dolor inventore dolor sit.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <div class="feature-icon">
                            <img src="{{ asset('frontend-assets/images/icon-key-white.png') }}">
                        </div>
                        <h3 class="feature-title">Temporibus autem quibusdam</h3>
                        <p>Iste natus error sit voluptatem accusantium laudantium totam rem aperiam eaque ipsa quae dolor inventore dolor sit.</p>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .fullwidth-block -->

    <div class="fullwidth-block dark-bg" data-bg-color="#f63f3f">
        <div class="container">
            <h2 class="section-title">Blog news</h2>
            <ul class="news">
                <li>
                    <div class="entry-date"><span class="date">3</span><span class="month">July</span></div>
                    <div class="entry-summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit alias nihil cumque ratione soluta ut laborum quod architecto vitae, eum magnam totam cupiditate accusantium. Perspiciatis iusto ex perferendis reprehenderit fugiat!</div>
                </li>
                <li>
                    <div class="entry-date"><span class="date">30</span><span class="month">June</span></div>
                    <div class="entry-summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit autem quasi nisi iure. Asperiores placeat enim id excepturi quas delectus error aliquam. Sed quo magnam dolor ratione voluptatum facere, nihil.</div>
                </li>
                <li>
                    <div class="entry-date"><span class="date">28</span><span class="month">June</span></div>
                    <div class="entry-summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente eaque culpa optio voluptas rem, iusto soluta at temporibus commodi repellat dicta facilis sequi, quisquam a quia animi ad mollitia ab.</div>
                </li>
            </ul>
            <div class="text-center">
                <a href="#" class="button invert">Show more news</a>
            </div>
        </div>
    </div>

</main> <!-- .main-content -->
@endsection
