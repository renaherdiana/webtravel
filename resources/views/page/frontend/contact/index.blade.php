@extends('layouts.frontend.app')

@section('content')

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
            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-secondary p-5 rounded">
                    <h4 class="text-primary mb-4">Send Your Message</h4>
                    <form>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="phone" placeholder="Phone">
                                    <label for="phone">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="project" placeholder="Project">
                                    <label for="project">Your Project</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Branch Info -->
            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="p-5 bg-light rounded">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="bg-white rounded p-4 mb-4">
                            <h5 class="mb-3">Our Branch 0{{ $i }}</h5>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                <p class="mb-0">123 Street New York, USA</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">(+012) 3456 7890</p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->

@endsection
