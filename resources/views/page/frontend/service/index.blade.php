@extends('layouts.frontend.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Service</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Service</li>
        </ol>    
    </div>
</div><br><br>
<!-- Header End -->

<!-- Car categories Start -->
<div class="container-fluid categories pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-5 text-capitalize mb-3">Service<span class="text-primary">Travino</span></h1>
            <p class="mb-0">Layanan transportasi nyaman, aman, dan tepat waktu untuk setiap perjalanan Anda.</p>
        </div>
        <div class="categories-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">

            <div class="categories-item p-4">
                <div class="categories-item-inner">
                    <div class="categories-img rounded-top">
                        <img src="{{ asset('assetsfrontend/img/car-1.png') }}" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="categories-content rounded-bottom p-4">
                        <h4>Mercedes Benz R3</h4>
                        <div class="mb-4">
                            <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">$150/Hari</h4>
                        </div>
                        <a href="{{ route('frontend.booking') }}" class="btn btn-primary rounded-pill d-flex justify-content-center py-3">Book Now</a>
                    </div>
                </div>
            </div>

            <div class="categories-item p-4">
                <div class="categories-item-inner">
                    <div class="categories-img rounded-top">
                        <img src="{{ asset('assetsfrontend/img/car-2.png') }}" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="categories-content rounded-bottom p-4">
                        <h4>Toyota Corolla Cross</h4>
                        <div class="mb-4">
                            <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">$150/Hari</h4>
                        </div>
                        <a href="{{ route('frontend.booking') }}" class="btn btn-primary rounded-pill d-flex justify-content-center py-3">Book Now</a>
                    </div>
                </div>
            </div>

            <div class="categories-item p-4">
                <div class="categories-item-inner">
                    <div class="categories-img rounded-top">
                        <img src="{{ asset('assetsfrontend/img/car-3.png') }}" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="categories-content rounded-bottom p-4">
                        <h4>Tesla Model S Plaid</h4>
                        <div class="mb-4">
                            <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">$170/Hari</h4>
                        </div>
                        <a href="{{ route('frontend.booking') }}" class="btn btn-primary rounded-pill d-flex justify-content-center py-3">Book Now</a>
                    </div>
                </div>
            </div>

            <div class="categories-item p-4">
                <div class="categories-item-inner">
                    <div class="categories-img rounded-top">
                        <img src="{{ asset('assetsfrontend/img/car-4.png') }}" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="categories-content rounded-bottom p-4">
                        <h4>Hyundai Kona Electric</h4>
                        <div class="mb-4">
                            <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">$187/Hari</h4>
                        </div>
                        <a href="{{ route('frontend.booking') }}" class="btn btn-primary rounded-pill d-flex justify-content-center py-3">Book Now</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Car categories End -->

@endsection
