@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Edit User</h3>
        <p class="text-muted mb-0">Form untuk mengubah data user</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <!-- Foto saat ini -->
        <div class="text-center mb-4">
            @if($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}"
                     class="rounded-circle shadow border border-2 border-light"
                     width="150" height="150"
                     style="object-fit: cover;">
            @else
                <p class="text-muted">Tidak ada foto</p>
            @endif
        </div>

        <form action="{{ route('adminpanel.user.update', $user->id) }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama User -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama User</label>
                <input type="text" name="name" class="form-control" 
                       value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" 
                       value="{{ old('email', $user->email) }}" required>
            </div>

            <!-- Password (opsional) -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Password Baru (opsional)</label>
                <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Role</label>
                <select name="role" class="form-select" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                </select>
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
                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('adminpanel.user') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection
