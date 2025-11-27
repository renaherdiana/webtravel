@extends('layouts.frontend.app')

@section('content')

<style>
    /* ===== CUSTOM STYLE FOR SERVICE SECTION ===== */
    .categories-content h4 {
        font-weight: 600;
        margin-bottom: 4px;
    }

    .categories-content h6 {
        font-weight: 500;
        letter-spacing: .4px;
        color: #6c757d !important;
        margin-bottom: 12px;
        margin-top: -2px;
    }

    .categories-item {
        transition: .3s ease-in-out;
    }

    .categories-item:hover {
        transform: translateY(-6px);
        box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
    }

    .categories-img img {
        transition: .3s;
    }

    .categories-item:hover img {
        transform: scale(1.05);
    }
</style>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Service</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Service</a></li>
            <li class="breadcrumb-item active text-primary">Booking</li>
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

            @foreach ($services as $service)
            <div class="categories-item p-4">
                <div class="categories-item-inner">
                    <div class="categories-img rounded-top">
                        @if ($service->photo)
                            <img src="{{ asset('storage/' . $service->photo) }}" class="img-fluid w-100 rounded-top" alt="{{ $service->nama_mobil }}">
                        @else
                            <img src="{{ asset('assetsfrontend/img/default-car.png') }}" class="img-fluid w-100 rounded-top" alt="Default Car">
                        @endif
                    </div>
                    <div class="categories-content rounded-bottom p-4">
                        <h4 class="fw-bold mb-0">{{ $service->nama_mobil }}</h4>
                        <h6>{{ $service->merk_mobil }}</h6>
                        <div class="mb-4">
                            <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">
                                Rp {{ number_format($service->harga_sewa,0,',','.') }}/Hari
                            </h4>
                        </div>
                        <!-- Tombol Book Now kirim mobil_id ke booking -->
                        <a href="{{ route('frontend.booking.form', ['mobil_id' => $service->id]) }}" 
                           class="btn btn-primary rounded-pill d-flex justify-content-center py-3">
                           Book Now
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Car categories End -->

@endsection
