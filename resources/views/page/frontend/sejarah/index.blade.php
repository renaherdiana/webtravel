@extends('layouts.frontend.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Sejarah</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Sejarah</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- About Start -->
<div class="container-fluid overflow-hidden about py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item">
                    <div class="pb-5"><br><br><br><br>
                        <h1 class="display-5 text-capitalize">Sejarah <span class="text-primary">Travino</span></h1><br><br>
                        <p class="mb-0">
                            Travino Rent Car berdiri pada tahun 2018 di kota Bandung, berawal dari sebuah usaha kecil penyewaan mobil keluarga. Didirikan oleh sekelompok anak muda yang memiliki visi untuk memberikan layanan transportasi yang nyaman, aman, dan terpercaya bagi masyarakat Indonesia.
                            Awalnya, Travino hanya memiliki dua unit mobil, yang disewakan secara offline kepada pelanggan sekitar. Dengan komitmen terhadap pelayanan yang ramah dan kualitas kendaraan yang selalu terjaga, nama Travino mulai dikenal luas oleh para pelanggan.
                            Seiring dengan meningkatnya permintaan, pada tahun 2020, Travino memperluas jangkauan layanannya dengan menghadirkan sistem pemesanan online melalui website dan aplikasi mobile. Inovasi ini memudahkan pelanggan untuk melakukan reservasi, memilih kendaraan, dan menentukan durasi sewa hanya dalam beberapa klik.
                            Kini, Travino telah memiliki lebih dari 100 armada kendaraan berbagai tipe — mulai dari city car, SUV, hingga minibus — yang siap melayani kebutuhan transportasi pribadi, bisnis, maupun wisata.
                            Dengan moto “Your Journey, Our Priority”, Travino terus berkomitmen untuk menjadi mitra perjalanan terbaik bagi setiap pelanggan, mengutamakan keamanan, kenyamanan, dan kepuasan dalam setiap perjalanan.
                        </p>
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-img">
                    <div class="img-1 mb-3">
                        <img src="{{ asset('assetsfrontend/img/about-img.jpg') }}" class="img-fluid rounded h-100 w-100" alt="">
                    </div>
                    <div class="img-2">
                        <img src="{{ asset('assetsfrontend/img/about-img-1.jpg') }}" class="img-fluid rounded w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection
