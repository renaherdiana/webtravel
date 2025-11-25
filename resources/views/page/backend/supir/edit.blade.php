@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Edit Supir</h3>
        <p class="text-muted mb-0">Form untuk mengubah data supir</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <!-- Foto saat ini -->
        <div class="text-center mb-4">
            @if($supir->photo)
                <img src="{{ asset('storage/' . $supir->photo) }}"
                     class="rounded-circle shadow border border-2 border-light"
                     width="150" height="150"
                     style="object-fit: cover;">
            @else
                <p class="text-muted">Tidak ada foto</p>
            @endif
        </div>

        <form action="{{ route('adminpanel.supir.update', $supir->id) }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Supir -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Supir</label>
                <input type="text" name="name" class="form-control" 
                       value="{{ $supir->name }}" required>
            </div>

            <!-- Nomor Telepon -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nomor Telepon</label>
                <input type="text" name="phone" class="form-control" 
                       value="{{ $supir->phone }}" required>
            </div>

            <!-- Harga -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Harga</label>
                <input type="number" name="price" class="form-control" 
                       value="{{ $supir->price ?? 0 }}" required>
            </div>

            <!-- Upload Foto Baru -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Foto Baru (opsional)</label>
                <input type="file" name="photo" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto</small>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select" required>
                    <option value="active"   {{ $supir->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $supir->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('adminpanel.supir') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
