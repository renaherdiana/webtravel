@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Edit Partner</h3>
        <p class="text-muted mb-0">Form untuk mengubah data partner</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <!-- Foto bulat di tengah -->
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $partner->photo) }}"
                 class="rounded-circle shadow"
                 width="150" height="150"
                 style="object-fit: cover;">
        </div>

        <form action="{{ route('adminpanel.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Partner -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Perusahaan</label>
                <input type="text" name="name" class="form-control" value="{{ $partner->name }}" required>
            </div>

            <!-- Upload New Photo -->
            <div class="mb-3">
                <label class="form-label fw-semibold">New Photo (optional)</label>
                <input type="file" name="photo" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto</small>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select" required>
                    <option value="active"   {{ $partner->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $partner->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('adminpanel.partners') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
