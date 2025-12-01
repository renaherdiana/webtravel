<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="" class="navbar-brand p-0">
                <h1 class="display-6 text-primary">
                    <i class="fas fa-car-alt me-3"></i>Travino Travel
                </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Left menu -->
                <div class="navbar-nav mx-auto py-0">
                    <a href="{{ route('frontend.home') }}" class="nav-item nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('frontend.sejarah') }}" class="nav-item nav-link {{ request()->routeIs('frontend.sejarah') ? 'active' : '' }}">Sejarah</a>
                    <a href="{{ route('frontend.service') }}" class="nav-item nav-link {{ request()->routeIs('frontend.service') ? 'active' : '' }}">Service</a>
                    <a href="{{ route('frontend.contact') }}" class="nav-item nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}">Contact</a>
                </div>

                <!-- Right menu -->
                <div class="navbar-nav ms-auto">

                    @guest
                        <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                        <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                    @endguest

                    @auth
                        <!-- Dropdown Welcome + Logout -->
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome, <strong>{{ auth()->user()->name }}</strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                @if(auth()->user()->role === 'admin')
                                    <li>
                                        <a class="dropdown-item" href="/adminpanel/travel">Admin Panel</a>
                                    </li>
                                @endif
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth

                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar & Hero End -->
