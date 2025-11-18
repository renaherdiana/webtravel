@extends('layouts.backend.app')

@section('content')

<!-- Page Header -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman Testimonial</h3>
        <p class="text-muted mb-0">Kelola testimonial pelanggan Travino Travel</p>
    </div>
</div>

<!-- Button Create -->
<div class="mb-3 text-end">
    <a href="#" class="btn btn-primary btn-sm">+ CREATE NEW</a>
</div>

<!-- Table -->
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color:#e8e8e8; color:#000;">
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Nama</th>
                    <th>Rating</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>

            <tbody>

                <!-- DATA 1 -->
                <tr>
                    <td>1</td>
                    <td>
                        <img src="{{ asset('assetsbackend/img/team-2.jpg') }}" 
                             class="rounded-circle" width="55" height="55" alt="Foto User">
                    </td>
                    <td>Andi Septian</td>
                    <td>⭐⭐⭐⭐⭐</td>

                    <td class="text-center">

                        <!-- Tombol Action -->
                        <div class="mb-2">
                            <a href="#" class="btn btn-sm btn-info me-1">Detail</a>
                            <a href="#" class="btn btn-sm btn-warning me-1">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </div>

                        <!-- STATUS -->
                        <a href="#" class="badge bg-success">Active</a>

                    </td>
                </tr>

                <!-- DATA 2 -->
                <tr>
                    <td>2</td>
                    <td>
                        <img src="{{ asset('assetsbackend/img/team-1.jpg') }}" 
                             class="rounded-circle" width="55" height="55" alt="Foto User">
                    </td>
                    <td>Dewi Lestari</td>
                    <td>⭐⭐⭐⭐☆</td>

                    <td class="text-center">

                        <div class="mb-2">
                            <a href="#" class="btn btn-sm btn-info me-1">Detail</a>
                            <a href="#" class="btn btn-sm btn-warning me-1">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </div>

                        <a href="#" class="badge bg-secondary">Inactive</a>

                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection
