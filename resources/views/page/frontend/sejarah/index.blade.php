@extends('layouts.frontend.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown">Sejarah</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Sejarah</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- Sejarah Start -->
<div class="container-fluid overflow-hidden about py-5">
    <div class="container py-5">
        <div class="row g-5">

            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item">
                    <h1 class="display-5 text-capitalize">
                        {{ $sejarah->title ?? 'Sejarah' }} 
                        <span class="text-primary">Travino</span>
                    </h1>

                    <p class="mb-0 mt-4">
                        {!! nl2br(e($sejarah->description ?? 'Belum ada data sejarah.')) !!}
                    </p>
                </div>
            </div>

            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-img">

                    @if(!empty($sejarah->photo) && file_exists(storage_path('app/public/' . $sejarah->photo)))
                        <img src="{{ asset('storage/' . $sejarah->photo) }}" class="img-fluid rounded h-100 w-100" style="object-fit:cover;">
                    @else
                        <img src="{{ asset('assetsfrontend/img/about-img.jpg') }}" class="img-fluid rounded h-100 w-100" style="object-fit:cover;">
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Sejarah End -->

@endsection
