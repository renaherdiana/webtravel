@extends('layouts.frontend.app')

@section('content')

<!-- Notifikasi -->
@if(session('success'))
<div class="container mt-3">
    <div class="alert alert-success alert-dismissible fade show small text-center" role="alert" style="max-width: 400px; margin: 0 auto;">
        {{ session('success') }}
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contact Us</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Contact</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- Contact Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">

        <!-- Intro Text -->
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-5 text-capitalize text-primary mb-3">Contact Us</h1>
            <p class="mb-0">Hubungi kami kapan saja untuk bantuan, pertanyaan, atau reservasi layanan.</p>
        </div>

        <div class="row g-5">

            <!-- Contact Info Cards -->
            <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="contact-add-item p-4 text-center">
                            <div class="contact-icon mb-3">
                                <i class="fa-solid fa-map-marker-alt"></i>
                            </div>
                            <h5>Address</h5>
                            <p class="mb-0">123 Street New York, USA</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="contact-add-item p-4 text-center">
                            <div class="contact-icon mb-3">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <h5>Email</h5>
                            <p class="mb-0">info@example.com</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="contact-add-item p-4 text-center">
                            <div class="contact-icon mb-3">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <h5>Telephone</h5>
                            <p class="mb-0">(+012) 3456 7890</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="contact-add-item p-4 text-center">
                            <div class="contact-icon mb-3">
                                <i class="fa-solid fa-globe"></i>
                            </div>
                            <h5>Website</h5>
                            <p class="mb-0">www.yoursite.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="nama" class="form-control" id="name" placeholder="Your Name" required>
                            <label for="name">Your Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required>
                            <label for="email">Your Email</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Phone">
                            <label for="phone">Your Phone</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                            <label for="subject">Subject</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea name="message" class="form-control" placeholder="Leave a message here" id="message" style="height: 160px" required></textarea>
                            <label for="message">Message</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100 py-3">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection
