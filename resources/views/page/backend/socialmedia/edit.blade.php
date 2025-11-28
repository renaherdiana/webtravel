@extends('layouts.backend.app')

@section('content')

<!-- Judul Halaman -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Edit Media Social</h3>
        <p class="text-muted mb-0">Form untuk mengubah data media social</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <!-- Foto saat ini -->
        <div class="text-center mb-4">
            @if($social->photo)
                <img src="{{ asset('storage/' . $social->photo) }}"
                     class="rounded-circle shadow border border-2 border-light"
                     width="150" height="150"
                     style="object-fit: cover;">
            @else
                <p class="text-muted">Tidak ada gambar</p>
            @endif
        </div>

        <form action="{{ route('adminpanel.mediasocial.update', $social->id) }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Media Social -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Media Social</label>
                <input type="text" name="name" class="form-control" 
                       value="{{ $social->name }}" required>
            </div>

            <!-- Nama Account -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Account</label>
                <input type="text" name="account_name" class="form-control" 
                       value="{{ $social->account_name }}" required>
            </div>

            <!-- Link Account -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Link Account</label>
                <input type="url" name="link" class="form-control" 
                       value="{{ $social->link }}" required>
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
                    <option value="active"   {{ $social->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $social->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('adminpanel.socialmedia') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
