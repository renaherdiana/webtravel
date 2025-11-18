@extends('layouts.backend.app')

@section('content')

<!-- Page Header / Judul Halaman -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman Gallery</h3>
        <p class="text-muted mb-0">Selamat datang di panel admin Travino Travel</p>
    </div>
</div>

<!-- Button Create -->
<div class="mb-4 text-end">
    <a href="#" class="btn btn-primary btn-sm">+ Create New</a>
</div>

<!-- Gallery Cards -->
<div class="row g-4">

    <!-- CARD 1 -->
    <div class="col-md-4">
        <div class="p-4 text-center rounded-3 shadow-sm" style="background: #E6D6FF; border:1px solid #C0A3FF;">
            <img src="{{ asset('assetsbackend/img/rena.jpg') }}" 
                 class="rounded-circle mb-3" width="100" height="100" alt="Gallery Photo">
            <h6 class="fw-bold mb-3">Rena</h6>

            <!-- Tombol utama -->
            <div class="d-flex justify-content-center gap-2 mb-2">
                <a href="#" class="btn btn-sm btn-warning p-2" title="Edit">
                    <i class="ni ni-ruler-pencil fs-5"></i>
                </a>
                <a href="#" class="btn btn-sm btn-info p-2" title="Detail">
                    <i class="ni ni-bullet-list-67 fs-5"></i>
                </a>
                <a href="#" class="btn btn-sm btn-danger p-2" title="Delete">
                    <i class="ni ni-basket fs-5"></i>
                </a>
            </div>

            <div>
                <button class="btn btn-sm btn-success w-100">Active</button>
            </div>
        </div>
    </div>

    <!-- CARD 2 -->
    <div class="col-md-4">
        <div class="p-4 text-center rounded-3 shadow-sm" style="background: #E6D6FF; border:1px solid #C0A3FF;">
            <img src="{{ asset('assetsbackend/img/rena.jpg') }}" 
                 class="rounded-circle mb-3" width="100" height="100" alt="Gallery Photo">
            <h6 class="fw-bold mb-3">Budi</h6>

            <div class="d-flex justify-content-center gap-2 mb-2">
                <a href="#" class="btn btn-sm btn-warning p-2" title="Edit">
                    <i class="ni ni-ruler-pencil fs-5"></i>
                </a>
                <a href="#" class="btn btn-sm btn-info p-2" title="Detail">
                    <i class="ni ni-bullet-list-67 fs-5"></i>
                </a>
                <a href="#" class="btn btn-sm btn-danger p-2" title="Delete">
                    <i class="ni ni-basket fs-5"></i>
                </a>
            </div>

            <div>
                <button class="btn btn-sm btn-secondary w-100">Inactive</button>
            </div>
        </div>
    </div>

    <!-- CARD 3 -->
    <div class="col-md-4">
        <div class="p-4 text-center rounded-3 shadow-sm" style="background: #E6D6FF; border:1px solid #C0A3FF;">
            <img src="{{ asset('assetsbackend/img/rena.jpg') }}" 
                 class="rounded-circle mb-3" width="100" height="100" alt="Gallery Photo">
            <h6 class="fw-bold mb-3">Citra</h6>

            <div class="d-flex justify-content-center gap-2 mb-2">
                <a href="#" class="btn btn-sm btn-warning p-2" title="Edit">
                    <i class="ni ni-ruler-pencil fs-5"></i>
                </a>
                <a href="#" class="btn btn-sm btn-info p-2" title="Detail">
                    <i class="ni ni-bullet-list-67 fs-5"></i>
                </a>
                <a href="#" class="btn btn-sm btn-danger p-2" title="Delete">
                    <i class="ni ni-basket fs-5"></i>
                </a>
            </div>

            <div>
                <button class="btn btn-sm btn-success w-100">Active</button>
            </div>
        </div>
    </div>

</div>

@endsection
