@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Tambah Service Mobil</h3>
        <p class="text-muted mb-0">Form untuk menambahkan service atau mobil baru</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('adminpanel.service.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- MERK MOBIL -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Merk Mobil</label>
                <input type="text" name="merk_mobil" class="form-control" placeholder="Contoh: Toyota, Honda, Suzuki..." required>
            </div>

            <!-- NAMA MOBIL -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Mobil</label>
                <input type="text" name="nama_mobil" class="form-control" placeholder="Contoh: Avanza, HRV, Pajero..." required>
            </div>

            <!-- TAHUN PEMBUATAN (Dropdown) -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Tahun Pembuatan</label>
                <select name="tahun_pembuatan" class="form-select" required>
                    <option value="" selected disabled>-- Pilih Tahun --</option>
                    @php
                        $currentYear = date('Y');
                    @endphp
                    @for ($year = $currentYear; $year >= 2000; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>

            <!-- HARGA SEWA -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Harga Sewa / Hari</label>
                <input type="number" name="harga_sewa" class="form-control" placeholder="Contoh: 350000" required>
            </div>

            <!-- PHOTO -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Photo Mobil</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <!-- STATUS -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select" required>
                    <option value="active" selected>Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('adminpanel.service') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
