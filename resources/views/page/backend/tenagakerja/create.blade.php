@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Tambah Tenaga Kerja</h3>
        <p class="text-muted mb-0">Form untuk menambahkan data tenaga kerja baru</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('adminpanel.tenagakerja.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan nama..." required>
            </div>

            <!-- Position -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Posisi / Jabatan</label>
                <input type="text" name="position" class="form-control" value="{{ old('position') }}" placeholder="Contoh: Driver, Admin, Manager..." required>
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

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('adminpanel.tenagakerja') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
