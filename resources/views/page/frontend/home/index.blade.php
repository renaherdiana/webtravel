@extends('layouts.frontend.app')

@section('content')

<!-- Carousel Start -->
<div class="header-carousel position-relative">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
            <!-- SLIDE 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('assetsfrontend/img/carousel-2.jpg') }}" class="img-fluid w-100" alt="First slide"/>
                <div class="carousel-caption d-none d-lg-block">
                    <div class="container py-4">
                        <div class="row">
                            <div class="col-lg-6 text-start animate__animated animate__fadeInRight" style="animation-delay: 0.5s;"><br><br><br><br><br><br>
                                <h1 class="display-5 text-white fw-bold">Rencanakan, Jelajahi, dan Nikmati Dunia Bersama Travino.</h1>
                                <p class="text-white mt-3">Rasakan perjalanan yang nyaman, aman, dan berkesan bersama kami.</p>
                                <a href="booking.html" class="btn btn-primary btn-lg mt-3 animate__animated animate__fadeInUp">Booking Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 2 -->
            <div class="carousel-item">
                <img src="{{ asset('assetsfrontend/img/carousel-1.jpg') }}" class="img-fluid w-100" alt="Second slide"/>
                <div class="carousel-caption d-none d-lg-block">
                    <div class="container py-4">
                        <div class="row">
                            <div class="col-lg-6 text-start animate__animated animate__fadeInRight" style="animation-delay: 0.5s;"><br><br><br><br><br><br>
                                <h1 class="display-5 text-white fw-bold">Perjalanan Lebih Mudah dan Aman Bersama Travino.</h1>
                                <p class="text-white mt-3">Temukan pengalaman terbaik setiap kali Anda bepergian.</p>
                                <a href="booking.html" class="btn btn-primary btn-lg mt-3 animate__animated animate__fadeInUp">Booking Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- About Section Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <!-- Image -->
            <div class="col-lg-6 wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s">
                <div class="shadow rounded overflow-hidden">
                    <img src="{{ asset('assetsfrontend/img/features-img.png') }}" class="img-fluid" alt="Travino Car">
                </div>
            </div>

            <!-- Text -->
            <div class="col-lg-6 wow animate__animated animate__fadeInRight" data-wow-delay="0.4s">
                <h2 class="mb-4 text-primary fw-bold">About <span class="text-dark">Travino</span></h2>
                <p class="mb-3 fs-5">Travino Travel hadir sebagai mitra terpercaya dalam setiap perjalanan Anda. Kami percaya bahwa bepergian bukan hanya tentang mencapai tujuan, tetapi juga tentang menciptakan pengalaman yang berkesan di setiap langkah.</p>
                <p class="mb-3 fs-5">Dengan layanan yang mudah, cepat, dan aman, Travino Travel berkomitmen memberikan kenyamanan serta solusi perjalanan terbaik mulai dari pemesanan tiket, akomodasi, hingga paket wisata yang dirancang khusus sesuai kebutuhan Anda.</p>
                <p class="mb-0 fs-5">Bersama Travino, nikmati perjalanan tanpa batas dan wujudkan impian menjelajahi dunia dengan tenang.</p>
                <div class="mt-4">
                    <a href="booking.html" class="btn btn-outline-primary btn-lg">Mulai Perjalanan Anda</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Fact Counter -->
<div class="container-fluid counter py-5">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Pelanggan -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="counter-item text-center">
                    <div class="counter-item-icon mx-auto">
                        <i class="fas fa-users fa-2x text-white"></i>
                    </div>
                    <div class="counter-counting my-3">
                        <span class="text-white fs-2 fw-bold" data-toggle="counter-up">829</span>
                        <span class="h1 fw-bold text-white">+</span>
                    </div>
                    <h4 class="text-white mb-0">Pelanggan</h4>
                </div>
            </div>

            <!-- Terpercaya -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="counter-item text-center">
                    <div class="counter-item-icon mx-auto">
                        <i class="fas fa-shield-alt fa-2x text-white"></i>
                    </div>
                    <div class="counter-counting my-3">
                        <span class="text-white fs-2 fw-bold" data-toggle="counter-up">15</span>
                        <span class="h1 fw-bold text-white">%</span>
                    </div>
                    <h4 class="text-white mb-0">Terpercaya</h4>
                </div>
            </div>

            <!-- Kepuasan -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="counter-item text-center">
                    <div class="counter-item-icon mx-auto">
                        <i class="fas fa-smile fa-2x text-white"></i>
                    </div>
                    <div class="counter-counting my-3">
                        <span class="text-white fs-2 fw-bold" data-toggle="counter-up">98</span>
                        <span class="h1 fw-bold text-white">%</span>
                    </div>
                    <h4 class="text-white mb-0">Kepuasan Pelanggan</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fact Counter -->

<!-- Gallery Start -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="mb-4 text-primary fw-bold">Gallery <span class="text-dark">Travino</span></h2>
        <p class="mb-0">Temukan koleksi kendaraan kami di galeri Travino. Dari mobil keluarga yang nyaman hingga armada mewah<br> untuk perjalanan istimewa, setiap gambar menceritakan kenyamanan dan layanan terbaik yang siap kami berikan untuk setiap perjalanan Anda.
        </p>
    </div>


    <div class="row g-4">

        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="gallery-card">
                <img src="{{ asset('assetsfrontend/img/blog-1.jpg') }}" class="gallery-img" alt="Alphard">
                <div class="gallery-body">
                    <h5 class="title">Alphard Executive</h5>
                    <p class="desc">Mobil mewah premium untuk perjalanan bisnis, tamu penting, atau acara istimewa Anda.</p>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="gallery-card">
                <img src="{{ asset('assetsfrontend/img/blog-2.jpg') }}" class="gallery-img" alt="Hiace">
                <div class="gallery-body">
                    <h5 class="title">Hiace Commuter</h5>
                    <p class="desc">Pilihan ideal untuk rombongan wisata atau perjalanan grup besar dengan fasilitas lengkap.</p>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="gallery-card">
                <img src="{{ asset('assetsfrontend/img/blog-3.jpg') }}" class="gallery-img" alt="Avanza">
                <div class="gallery-body">
                    <h5 class="title">Toyota Avanza</h5>
                    <p class="desc">Mobil keluarga yang nyaman, irit, dan cocok untuk perjalanan dalam kota maupun wisata.</p>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Gallery End -->

<!-- Team Start -->
        <div class="container-fluid testimonial pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">Tenaga<span class="text-primary"> Kerja</span></h1>
                    <p class="mb-0">Di balik setiap perjalanan menyenangkan bersama Travino, ada tim tenaga kerja yang ramah, kompeten, dan siap membantu. Kami berkomitmen memberikan pengalaman perjalanan yang aman, nyaman, dan tak terlupakan untuk setiap pelanggan kami.
                    </p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item">
                        <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="testimonial-inner p-4">
                            <img src="{{ asset('assetsfrontend/img/testimonial-1.jpg') }}" class="img-fluid" alt="">
                            <div class="ms-4">
                                <h4>Vina</h4>
                                <p>Profession</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="testimonial-inner p-4">
                            <img src="{{ asset('assetsfrontend/img/testimonial-2.jpg') }}" class="img-fluid" alt="">
                            <div class="ms-4">
                                <h4>Rena</h4>
                                <p>Profession</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="testimonial-inner p-4">
                             <img src="{{ asset('assetsfrontend/img/testimonial-3.jpg') }}" class="img-fluid" alt="">
                            <div class="ms-4">
                                <h4>Dwi Intan</h4>
                                <p>Profession</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Team End -->

<!-- Partners Start -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="mb-4 text-primary fw-bold">Partners <span class="text-dark">Travino</span></h2>
        <p class="mb-0">Travino bangga bekerja sama dengan mitra terpercaya yang mendukung setiap perjalanan Anda.<br> Dari kendaraan premium hingga layanan tambahan, setiap partner kami dipilih untuk <br>menjamin kenyamanan, keamanan, dan pengalaman terbaik bagi setiap pelanggan.
        </p>
    </div>

    <div class="row g-4 justify-content-center">

        <!-- Partner 1 -->
        <div class="col-md-4 col-lg-2 text-center">
            <div class="partner-card p-3 border rounded shadow-sm">
                <img src="{{ asset('assetsfrontend/img/car-1.png') }}" class="img-fluid mb-2" alt="Partner 1">
                <h6 class="fw-bold">Partner 1</h6>
            </div>
        </div>

        <!-- Partner 2 -->
        <div class="col-md-4 col-lg-2 text-center">
            <div class="partner-card p-3 border rounded shadow-sm">
                <img src="{{ asset('assetsfrontend/img/car-2.png') }}" class="img-fluid mb-2" alt="Partner 2">
                <h6 class="fw-bold">Partner 2</h6>
            </div>
        </div>

        <!-- Partner 3 -->
        <div class="col-md-4 col-lg-2 text-center">
            <div class="partner-card p-3 border rounded shadow-sm">
                <img src="{{ asset('assetsfrontend/img/car-3.png') }}" class="img-fluid mb-2" alt="Partner 3">
                <h6 class="fw-bold">Partner 3</h6>
            </div>
        </div>

        <!-- Partner 4 -->
        <div class="col-md-4 col-lg-2 text-center">
            <div class="partner-card p-3 border rounded shadow-sm">
                <img src="{{ asset('assetsfrontend/img/car-4.png') }}" class="img-fluid mb-2" alt="Partner 4">
                <h6 class="fw-bold">Partner 4</h6>
            </div>
        </div>

    </div>
</div>
<!-- Partners End -->

<!-- Testimonial Start -->
        <div class="container-fluid testimonial pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">Our Clients<span class="text-primary"> Riviews</span></h1>
                    <p class="mb-0">Travino selalu memberikan pengalaman perjalanan yang luar biasa. Layanan yang cepat, nyaman, dan aman membuat setiap perjalanan kami menjadi lebih menyenangkan. Saya sangat merekomendasikan Travino untuk siapa pun yang ingin bepergian tanpa khawatir.
                    </p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item">
                        <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="testimonial-inner p-4">
                            <img src="{{ asset('assetsfrontend/img/testimonial-1.jpg') }}" class="img-fluid" alt="">
                            <div class="ms-4">
                                <h4>Rena</h4>
                                <div class="d-flex text-primary">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-body"></i>
                                </div>
                            </div>
                        </div>
                        <div class="border-top rounded-bottom p-4">
                            <p class="mb-0">Perjalanan bersama Travino selalu menyenangkan! Layanannya cepat, ramah, dan kendaraan yang digunakan sangat nyaman. Setiap perjalanan terasa aman dan menyenangkan. Saya pasti akan memilih Travino lagi untuk trip berikutnya.</p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="testimonial-inner p-4">
                            <img src="{{ asset('assetsfrontend/img/testimonial-2.jpg') }}" class="img-fluid" alt="">
                            <div class="ms-4">
                                <h4>Dwi Intan</h4>
                                <div class="d-flex text-primary">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-body"></i>
                                    <i class="fas fa-star text-body"></i>
                                </div>
                            </div>
                        </div>
                        <div class="border-top rounded-bottom p-4">
                            <p class="mb-0">Travino memudahkan perjalanan bisnis saya. Proses pemesanan mudah, supir profesional, dan kendaraan bersih serta nyaman. Hanya satu bintang yang kurang karena sempat sedikit delay, tapi pengalaman keseluruhan tetap memuaskan.</p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="testimonial-inner p-4">
                             <img src="{{ asset('assetsfrontend/img/testimonial-3.jpg') }}" class="img-fluid" alt="">
                            <div class="ms-4">
                                <h4>Vina</h4>
                                <div class="d-flex text-primary">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-body"></i>
                                    <i class="fas fa-star text-body"></i>
                                    <i class="fas fa-star text-body"></i>
                                </div>
                            </div>
                        </div>
                        <div class="border-top rounded-bottom p-4">
                            <p class="mb-0">Pengalaman liburan keluarga kami dengan Travino luar biasa! Anak-anak senang, perjalanan aman, dan supir sangat membantu. Travino benar-benar membuat liburan kami lebih berkesan dan bebas stres.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Testimonial End -->

<style>
.partner-card {
    transition: transform 0.3s, box-shadow 0.3s;
    background-color: #fff;
}
.partner-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

    .gallery-card {
    background: #ffffff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    transition: 0.3s;
    cursor: pointer;
}

.gallery-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.gallery-img {
    width: 100%;
    height: 210px;
    object-fit: cover;
    transition: 0.4s ease;
}

.gallery-card:hover .gallery-img {
    transform: scale(1.05);
}

.gallery-body {
    padding: 18px 20px;
    background: #fafafa;
}

.gallery-body .title {
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 6px;
    color: #333;
}

.gallery-body .desc {
    font-size: 0.92rem;
    color: #666;
    margin: 0;
    line-height: 1.45;
}
</style>
@endsection
