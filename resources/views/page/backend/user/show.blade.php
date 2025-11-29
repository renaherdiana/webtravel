@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Detail User</h3>
        <p class="text-muted mb-0">Informasi lengkap dari data user</p>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <!-- Foto -->
        <div class="text-center mb-4">
            @if ($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}"
                     width="180" height="180"
                     class="rounded-circle shadow-sm border border-2 border-light"
                     style="object-fit: cover;">
            @else
                <p class="text-muted">Tidak ada foto</p>
            @endif
        </div>

        <table class="table align-middle" style="border-collapse: separate; border-spacing: 0 10px;">
            <tbody>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="width:200px; border-radius: 8px 0 0 8px;">Nama User</th>
                    <td class="bg-white border rounded-end">{{ $user->name }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold">Email</th>
                    <td class="bg-white border rounded-end">{{ $user->email }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold">Role</th>
                    <td class="bg-white border rounded-end">{{ ucfirst($user->role) }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold">Status</th>
                    <td class="bg-white border rounded-end">
                        <span class="badge {{ $user->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold">Created At</th>
                    <td class="bg-white border rounded-end">{{ $user->created_at->format('d-m-Y H:i') }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold">Updated At</th>
                    <td class="bg-white border rounded-end">{{ $user->updated_at->format('d-m-Y H:i') }}</td>
                </tr>

            </tbody>
        </table>

        <div class="mt-3">
            <a href="{{ route('adminpanel.user') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('adminpanel.user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
        </div>

    </div>
</div>

@endsection
