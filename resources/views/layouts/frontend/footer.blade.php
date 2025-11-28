<!-- =======================  AESTHETIC FOOTER START  ======================= -->

<style>
    /* Links Footer */
    .footer-links li a {
        color: #d5d5d5;
        text-decoration: none;
        display: block;
        padding: 6px 0;
        transition: 0.3s;
        font-weight: 300;
        font-size: 15px;
    }
    .footer-links li a:hover {
        color: #ffffff;
        padding-left: 6px;
    }

    /* Footer Titles */
    .footer-title {
        font-weight: 600;
        font-size: 22px;
    }

    /* Social Card Base */
    .social-card {
        transition: all 0.3s ease;
        cursor: pointer;
        border-radius: 18px;
        padding: 12px 18px;
        display: flex;
        align-items: center;
        background: #1a1a1a;
        color: #fff;
        margin-bottom: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    .social-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.35);
    }
    .social-card img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 15px;
        border: 2px solid #fff3;
    }
    .social-card p {
        margin: 0;
        font-weight: 600;
        font-size: 16px;
    }
    .social-card a {
        color: #ccc;
        font-size: 14px;
        text-decoration: none;
        transition: 0.3s;
    }
    .social-card a:hover {
        color: #fff;
    }

    /* Specific Social Color Accent */
    .social-instagram { border-left: 4px solid #E1306C; }
    .social-tiktok    { border-left: 4px solid #000; }
    .social-twitter   { border-left: 4px solid #1DA1F2; }
    .social-facebook  { border-left: 4px solid #3b5998; }
</style>

<div class="container-fluid py-5" style="background: #0E0E0E;">
    <div class="container py-5">
        <div class="row g-5 align-items-start">

            <!-- Quick Links -->
            <div class="col-md-4">
                <h4 class="text-white mb-4 footer-title">Quick Links</h4>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ route('frontend.home') }}"><i class="fas fa-chevron-right me-2"></i>Home</a></li>
                    <li><a href="{{ route('frontend.sejarah') }}"><i class="fas fa-chevron-right me-2"></i>Sejarah</a></li>
                    <li><a href="{{ route('frontend.service') }}"><i class="fas fa-chevron-right me-2"></i>Service</a></li>
                    <li><a href="{{ route('frontend.contact') }}"><i class="fas fa-chevron-right me-2"></i>Contact</a></li>
                </ul>
            </div>

             <!-- Social Media (Right Side) -->
            <div class="col-md-4">
                <h4 class="text-white mb-4 footer-title">Social Media</h4>

                @foreach($socials as $social)
                    <div class="social-card social-{{ strtolower($social->name) }}">
                        <img src="{{ asset('storage/' . $social->photo) }}" alt="{{ $social->name }}">
                        <div>
                            <p>{{ $social->name }}</p>
                            <a href="{{ $social->link }}" target="_blank">{{ $social->account_name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Business Hours (Right Aligned) -->
            <div class="col-md-4 d-flex flex-column align-items-md-end">
                <h4 class="text-white mb-4 footer-title">Business Hours</h4>
                <div class="mb-3 text-md-end">
                    <h6 class="text-muted mb-1">Mon - Fri</h6>
                    <p class="text-white mb-0 fw-light">09.00 AM – 07.00 PM</p>
                </div>
                <div class="mb-3 text-md-end">
                    <h6 class="text-muted mb-1">Saturday</h6>
                    <p class="text-white mb-0 fw-light">10.00 AM – 05.00 PM</p>
                </div>
                <div class="text-md-end">
                    <h6 class="text-muted mb-1">Sunday</h6>
                    <p class="text-white mb-0 fw-light">Closed</p>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Copyright -->
<div class="container-fluid py-4" style="background:#080808;">
    <div class="container text-center">
        <p class="mb-0 text-white-50" style="font-size:14px;">
            © 2025 <span class="text-white">Travino Travel</span> — All rights reserved.
        </p>
    </div>
</div>

<!-- =======================  AESTHETIC FOOTER END  ======================= -->
