@extends('layouts.backend.app')

@section('content')

<!-- Page Header -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman User</h3>
        <p class="text-muted mb-0">Data para pengguna Travino Travel</p>
    </div>
</div>

<!-- Button Create -->
<div class="mb-3 text-end">
    <a href="{{ route('adminpanel.user.create') }}" class="btn btn-primary btn-sm">+ CREATE NEW</a>
</div>

<!-- Table -->
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color:#e8e8e8; color:#000;">
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th style="text-align:center;">Status / Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    <!-- Foto -->
                    <td>
                        @if ($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}" 
                                 class="rounded-circle" width="55" height="55" alt="Foto User">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    <!-- Nama -->
                    <td>{{ $user->name }}</td>

                    <!-- Role -->
                    <td>{{ ucfirst($user->role) }}</td>

                    <!-- Status / Action -->
                    <td class="text-center">
                        <div class="mb-2">
                            <a href="{{ route('adminpanel.user.edit', $user->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>

                            <form action="{{ route('adminpanel.user.delete', $user->id) }}" 
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>

                            <a href="{{ route('adminpanel.user.show', $user->id) }}" class="btn btn-sm btn-info ms-1">Detail</a>
                        </div>

                        @if ($user->status === 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">
                        <strong>Tidak ada data user.</strong>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
