@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Tambah Sejarah</h3>
        <p class="text-muted mb-0">Form untuk menambahkan data sejarah baru</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('adminpanel.sejarah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Judul -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Judul</label>
                <input type="text" name="title" class="form-control" placeholder="Masukkan judul sejarah..." required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="description" class="form-control" rows="5" placeholder="Masukkan deskripsi sejarah..." required></textarea>
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

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('adminpanel.sejarah') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
