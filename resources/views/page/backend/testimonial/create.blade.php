@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Tambah Testimonial</h3>
        <p class="text-muted mb-0">Form untuk menambahkan testimonial baru</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('adminpanel.testimonial.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nama Pelanggan -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Pelanggan</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama pelanggan..." required>
            </div>

            <!-- Photo -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Photo</label>
                <input type="file" name="photo" class="form-control" required>
            </div>

            <!-- Rating -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Rating</label>
                <select name="rating" class="form-select" required>
                    <option value="5" selected>⭐⭐⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐☆</option>
                    <option value="3">⭐⭐⭐☆☆</option>
                    <option value="2">⭐⭐☆☆☆</option>
                    <option value="1">⭐☆☆☆☆</option>
                </select>
            </div>

            <!-- Message -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Message</label>
                <textarea name="message" rows="4" class="form-control" placeholder="Masukkan testimonial..." required></textarea>
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
            <a href="{{ route('adminpanel.testimonial') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
