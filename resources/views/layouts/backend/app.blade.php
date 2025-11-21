<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Panel Travel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Nucleo Icons -->
  <link href="{{ asset('assetsbackend/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assetsbackend/css/nucleo-svg.css') }}" rel="stylesheet" />

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  

  <!-- Soft UI CSS -->
  <link id="pagestyle" href="{{ asset('assetsbackend/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />

  <style>
    /* --- Flex layout agar footer selalu di bawah --- */
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main.main-content {
      flex: 1; /* main-content mengambil ruang tersisa */
      display: flex;
      flex-direction: column;
    }

    .nav-link.active {
        background: rgba(235, 232, 255, 0.55); 
        border-left: 4px solid #9e8cff;      
        border-radius: 12px;
        color: #5c4bd8 !important;
        font-weight: 600;
        backdrop-filter: blur(6px);
    }

    .nav-link.active .icon i {
        color: #5c4bd8 !important;
    }

    .nav-link:hover {
        background: rgba(235, 232, 255, 0.35);
        border-radius: 12px;
    }
  </style>
</head>

<body class="g-sidenav-show bg-gray-100">

    <!-- SIDEBAR -->
    @include('layouts.backend.sidebar')

    <!-- MAIN CONTENT -->
    <main class="main-content position-relative border-radius-lg">

        <!-- NAVBAR -->
        @include('layouts.backend.navbar')

        <!-- MAIN CONTENT AREA -->
        <div class="container-fluid py-4 flex-grow-1">
            @yield('content')
        </div>

        <!-- FOOTER -->
        @include('layouts.backend.footer')

    </main>

    <!-- Core JS Files -->
    <script src="{{ asset('assetsbackend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assetsbackend/js/core/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assetsbackend/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assetsbackend/js/plugins/smooth-scrollbar.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assetsbackend/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>

</body>
</html>
