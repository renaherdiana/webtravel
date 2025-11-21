@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Create Gallery</h3>
        <p class="text-muted mb-0">Form untuk menambahkan foto galeri baru</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('adminpanel.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Judul</label>
                <input type="text" name="title" class="form-control"
                       value="{{ old('title') }}" placeholder="Masukkan judul..." required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="description" rows="4" class="form-control" 
                          placeholder="Tulis deskripsi (opsional)...">{{ old('description') }}</textarea>
            </div>

            <!-- Photo -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Foto</label>
                <input type="file" name="photo" class="form-control" required>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select" required>
                    <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Buttons -->
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('adminpanel.gallery') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
