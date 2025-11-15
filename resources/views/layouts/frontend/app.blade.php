<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Travino Travel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Montserrat:wght@100..900&display=swap" rel="stylesheet"> 

    <!-- Icon Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assetsfrontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsfrontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Stylesheet -->
    <link href="{{ asset('assetsfrontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assetsfrontend/css/style.css') }}" rel="stylesheet">
    
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar -->
    @include('layouts.frontend.navbar')

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.frontend.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assetsfrontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assetsfrontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assetsfrontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assetsfrontend/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assetsfrontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assetsfrontend/js/main.js') }}"></script>
</body>

</html>
