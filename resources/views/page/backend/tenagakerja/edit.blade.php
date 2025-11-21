@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" 
        style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Edit Tenaga Kerja</h3>
        <p class="text-muted mb-0">Form untuk mengubah informasi tenaga kerja</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('adminpanel.tenagakerja.update', $tenagakerja->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Foto Lama -->
            <div class="text-center mb-4">
                <img src="{{ asset('storage/' . $tenagakerja->photo) }}" 
                     width="150" height="150"
                     class="rounded-circle shadow-sm"
                     style="object-fit: cover;">
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $tenagakerja->name }}" required>
            </div>

            <!-- Jabatan -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Posisi / Jabatan</label>
                <input type="text" name="position" class="form-control" value="{{ $tenagakerja->position }}" required>
            </div>

            <!-- Upload Foto Baru -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Foto Baru (Opsional)</label>
                <input type="file" name="photo" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select">
                    <option value="active" {{ $tenagakerja->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $tenagakerja->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Tombol -->
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('adminpanel.tenagakerja') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
