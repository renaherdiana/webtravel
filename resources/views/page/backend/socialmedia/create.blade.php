@extends('layouts.backend.app')

@section('content')

<!-- Judul Halaman -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Tambah Media Social</h3>
        <p class="text-muted mb-0">Form untuk menambahkan data media social baru</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('adminpanel.mediasocial.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nama Media Social -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Media Social</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama media social..." required>
            </div>

            <!-- Nama Account -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Account</label>
                <input type="text" name="account_name" class="form-control" placeholder="Masukkan nama account..." required>
            </div>

            <!-- Link Account -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Link Account</label>
                <input type="url" name="link" class="form-control" placeholder="Masukkan link akun..." required>
            </div>

            <!-- Photo -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Gambar</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select" required>
                    <option value="active" selected>Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <!-- Tombol -->
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('adminpanel.socialmedia') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
