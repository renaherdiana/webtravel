<!-- Topbar Start -->
    <div class="container-fluid topbar bg-secondary d-none d-xl-block w-100">
        <div class="container">
            <div class="row gx-0 align-items-center" style="height: 45px;">
                <div class="col-lg-6 text-center text-lg-start mb-lg-0">
                    <div class="d-flex flex-wrap">
                        <a href="" class="text-muted me-4"><i class="fas fa-phone-alt text-primary me-2"></i>+62 895335053813</a>
                        <a href="" class="text-muted me-0"><i class="fas fa-envelope text-primary me-2"></i>travino@gmail.com</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="https://www.tiktok.com/@_rereee14?_r=1&_t=ZS-91lfagg2Z6u" class="btn btn-light btn-sm-square rounded-circle me-3" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a href="https://www.tiktok.com/@_rereee14?_r=1&_t=ZS-91lfagg2Z6u" class="btn btn-light btn-sm-square rounded-circle me-3" target="_blank">
                        
                    <i class="fab fa-twitter"></i>
                        </a>

                        <a href="https://www.tiktok.com/@_rereee14?_r=1&_t=ZS-91lfagg2Z6u" class="btn btn-light btn-sm-square rounded-circle me-3" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@_rereee14?_r=1&_t=ZS-91lfagg2Z6u" class="btn btn-light btn-sm-square rounded-circle me-0" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Topbar End -->
<!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a href="" class="navbar-brand p-0">
                        <h1 class="display-6 text-primary"><i class="fas fa-car-alt me-3"></i></i>Travino Travel</h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto py-0">
                            <a href="{{ route('frontend.home') }}" class="nav-item nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}">Home</a>
                            <a href="{{ route('frontend.sejarah') }}" class="nav-item nav-link {{ request()->routeIs('frontend.sejarah') ? 'active' : '' }}">Sejarah</a>
                            <a href="{{ route('frontend.service') }}" class="nav-item nav-link {{ request()->routeIs('frontend.service') ? 'active' : '' }}">Service</a>
                            <a href="{{ route('frontend.contact') }}" class="nav-item nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}">Contact</a>
                        </div>
                    </nav>
                </div>
            </div>
<!-- Navbar & Hero End -->