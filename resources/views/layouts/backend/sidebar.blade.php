<style>
/* =============================
   AESTHETIC SIDEBAR STYLING
   ============================= */

.nav-item i {
    font-size: 1.25rem;
    width: 24px;
    text-align: center;
    color: #6c63ff !important; /* semua ikon ungu */
}

.nav-link {
    display: flex !important;
    align-items: center;
    gap: 12px;
    padding: 10px 12px;
    border-radius: 10px;
    transition: .2s;
}

.nav-link:hover {
    background: #f3f2ff;
}

.nav-link.active {
    background: linear-gradient(90deg, #6c63ff30, #6c63ff10);
    border-left: 4px solid #6c63ff;
    font-weight: 600;
    color: #6c63ff !important;
    border-radius: 10px;
}

/* pastikan h4 muncul */
.sidenav-header h4 {
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
}
</style>


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
       id="sidenav-main">

    <div class="sidenav-header text-center" style="overflow: visible !important;">
        <a class="navbar-brand m-0 d-block" href="{{ route('adminpanel.travel') }}" style="display:block;">

            <!-- Foto bulat -->
            <div style="
                width: 110px;
                height: 110px;
                border-radius: 50%;
                overflow: hidden;
                margin: 0 auto;
                border: 3px solid #d8d2ff;
                box-shadow: 0 4px 10px rgba(0,0,0,0.12);
            ">
                <img src="{{ asset('assetsbackend/img/image.png') }}"
                     style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </a>
    </div>

    <hr class="horizontal dark mt-0">


    <div class="collapse navbar-collapse w-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav"><br><br>

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/travel*') ? 'active' : '' }}"
                   href="{{ route('adminpanel.travel') }}">
                    <i class="ni ni-shop"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Hero -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/hero*') ? 'active' : '' }}"
                   href="{{ route('adminpanel.hero') }}">
                    <i class="ni ni-image"></i>
                    <span>Hero</span>
                </a>
            </li>

            <!-- About -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/about*') ? 'active' : '' }}"
                   href="{{ route('adminpanel.about') }}">
                    <i class="ni ni-single-02"></i>
                    <span>About</span>
                </a>
            </li>

            <!-- Gallery -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/gallery*') ? 'active' : '' }}"
                   href="{{ route('adminpanel.gallery') }}">
                    <i class="ni ni-album-2"></i>
                    <span>Gallery</span>
                </a>
            </li>

            <!-- ======================
                 MASTER DATA
            ======================= -->
            <h6 class="text-uppercase text-xs ps-4 mt-3 mb-1" style="color:#6c63ff; font-weight:700;">
                Master Data
            </h6>

            <!-- Tenaga Kerja -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/tenagakerja*') ? 'active' : '' }}"
                   href="{{ route('adminpanel.tenagakerja') }}">
                    <i class="ni ni-badge"></i>
                    <span>Tenaga Kerja</span>
                </a>
            </li>

            <!-- Pelanggan (TANPA route) -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/pelanggan*') ? 'active' : '' }}"
                   href="{{ route('adminpanel.pelanggan') }}">
                    <i class="ni ni-circle-08"></i>
                    <span>Pelanggan</span>
                </a>
            </li>

            <!-- Service -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/service*') ? 'active' : '' }}"
                   href="{{ route('adminpanel.service') }}">
                    <i class="ni ni-settings"></i>
                    <span>Service</span>
                </a>
            </li>

            <!-- User (TANPA route) -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/user*') ? 'active' : '' }}"
                   href="{{ route('adminpanel.user') }}">
                    <i class="ni ni-single-02"></i>
                    <span>User</span>
                </a>
            </li>

            <!-- ======================
                 DATA TRANSAKSI
            ======================= -->
            <h6 class="text-uppercase text-xs ps-4 mt-3 mb-1" style="color:#6c63ff; font-weight:700;">
                Data Transaksi
            </h6>

            <!-- Pemesanan (TANPA route) -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/pemesanan*') ? 'active' : '' }}"
                   href="/adminpanel/pemesanan">
                    <i class="ni ni-cart"></i>
                    <span>Pemesanan</span>
                </a>
            </li>

            <hr class="horizontal dark mt-3">

            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" href="/logout">
                    <i class="ni ni-button-power"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
