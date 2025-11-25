@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Edit Sejarah</h3>
        <p class="text-muted mb-0">Form untuk mengubah data sejarah</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <!-- Foto saat ini -->
        <div class="text-center mb-4">
            @if($sejarah->photo)
                <img src="{{ asset('storage/' . $sejarah->photo) }}"
                     class="rounded-circle shadow border border-2 border-light"
                     width="150" height="150"
                     style="object-fit: cover;">
            @else
                <p class="text-muted">Tidak ada gambar</p>
            @endif
        </div>

        <form action="{{ route('adminpanel.sejarah.update', $sejarah->id) }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Judul</label>
                <input type="text" name="title" class="form-control" 
                       value="{{ $sejarah->title }}" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="description" class="form-control" rows="5" required>{{ $sejarah->description }}</textarea>
            </div>

            <!-- Upload Gambar Baru -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Gambar Baru (opsional)</label>
                <input type="file" name="photo" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar</small>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select" required>
                    <option value="active"   {{ $sejarah->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $sejarah->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('adminpanel.sejarah') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
