@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Edit Service Mobil</h3>
        <p class="text-muted mb-0">Form untuk mengubah data service atau mobil</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <!-- Foto saat ini -->
        <div class="text-center mb-4">
            @if($service->photo)
                <img src="{{ asset('storage/' . $service->photo) }}"
                     class="rounded-circle shadow border border-2 border-light"
                     width="150" height="150"
                     style="object-fit: cover;">
            @else
                <p class="text-muted">Tidak ada gambar</p>
            @endif
        </div>

        <form action="{{ route('adminpanel.service.update', $service->id) }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <!-- MERK MOBIL -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Merk Mobil</label>
                <input type="text" name="merk_mobil" class="form-control" 
                       value="{{ $service->merk_mobil }}" required>
            </div>

            <!-- NAMA MOBIL -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Mobil</label>
                <input type="text" name="nama_mobil" class="form-control" 
                       value="{{ $service->nama_mobil }}" required>
            </div>

            <!-- TAHUN PEMBUATAN (Dropdown) -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Tahun Pembuatan</label>
                <select name="tahun_pembuatan" class="form-select" required>
                    @php
                        $currentYear = date('Y');
                    @endphp
                    @for ($year = $currentYear; $year >= 2000; $year--)
                        <option value="{{ $year }}" {{ $service->tahun_pembuatan == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endfor
                </select>
            </div>

            <!-- HARGA SEWA -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Harga Sewa / Hari</label>
                <input type="number" name="harga_sewa" class="form-control" 
                       value="{{ $service->harga_sewa }}" required>
            </div>

            <!-- Upload Foto Baru -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Ganti Foto Mobil (opsional)</label>
                <input type="file" name="photo" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto</small>
            </div>

            <!-- STATUS -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select" required>
                    <option value="active"   {{ $service->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('adminpanel.service') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
