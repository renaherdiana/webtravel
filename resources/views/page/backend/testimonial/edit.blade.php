@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Edit Testimonial</h3>
        <p class="text-muted mb-0">Form untuk mengubah data testimonial</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <!-- Foto bulat di tengah -->
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $testimonial->photo) }}"
                 class="rounded-circle shadow"
                 width="150" height="150"
                 style="object-fit: cover;">
        </div>

        <form action="{{ route('adminpanel.testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Pelanggan -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Pelanggan</label>
                <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
            </div>

            <!-- Upload New Photo -->
            <div class="mb-3">
                <label class="form-label fw-semibold">New Photo (optional)</label>
                <input type="file" name="photo" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto</small>
            </div>

            <!-- Rating -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Rating</label>
                <select name="rating" class="form-select" required>
                    <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                    <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>⭐⭐⭐⭐☆</option>
                    <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>⭐⭐⭐☆☆</option>
                    <option value="2" {{ $testimonial->rating == 2 ? 'selected' : '' }}>⭐⭐☆☆☆</option>
                    <option value="1" {{ $testimonial->rating == 1 ? 'selected' : '' }}>⭐☆☆☆☆</option>
                </select>
            </div>

            <!-- Message -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Message</label>
                <textarea name="message" rows="4" class="form-control" required>{{ $testimonial->message }}</textarea>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select" required>
                    <option value="active"   {{ $testimonial->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $testimonial->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('adminpanel.testimonial') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
