@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Edit Hero</h3>
        <p class="text-muted mb-0">Form untuk mengubah data hero</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <!-- Foto bulat di tengah -->
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $hero->photo) }}"
                 class="rounded-circle shadow"
                 width="150" height="150"
                 style="object-fit: cover;">
        </div>

        <form action="{{ route('adminpanel.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $hero->title }}" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="description" rows="4" class="form-control">{{ $hero->description }}</textarea>
            </div>

            <!-- Upload New Photo -->
            <div class="mb-3">
                <label class="form-label fw-semibold">New Photo (optional)</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select" required>
                    <option value="active"   {{ $hero->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $hero->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Hero</button>
            <a href="{{ route('adminpanel.hero') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
