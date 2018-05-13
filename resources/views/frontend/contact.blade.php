@extends('layouts.base')

@section('content')
<main class="main-content">
    <div class="fullwidth-block content">
        <div class="container">
            <h2 class="entry-title">Omnis iste natus error sit voluptatem doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto</h2>

            <div class="row">
                <div class="col-md-5">
                    <form action="#" class="contact-form">
                        <input type="text" id="name" placeholder="Name...">
                        <input type="text" id="email" placeholder="Email...">
                        <input type="text" id="website" placeholder="Website...">
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
                            <strong>Company Name INC.</strong>
                            <a href="mailto:office@companyname.com">office@companyname.com</a> <br>
                            <span>40 Sibley St, Detroit</span>
                            <a href="tel:532930098891">(532) 930 098 891</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> <!-- .main-content -->
@endsection
