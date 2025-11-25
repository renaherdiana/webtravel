@extends('layouts.backend.app')

@section('content')

<!-- Judul Halaman -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman Supir</h3>
        <p class="text-muted mb-0">Selamat datang di panel admin Travino Travel</p>
    </div>
</div>

<!-- Button Create -->
<div class="mb-3 text-end">
    <a href="{{ route('adminpanel.supir.create') }}" class="btn btn-primary btn-sm">+ Create New</a>
</div>

<!-- Table -->
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color:#e8e8e8; color:#000;">
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Nama Supir</th>
                    <th>Harga</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($supirs ?? [] as $index => $supir)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    <!-- Foto -->
                    <td>
                        @if ($supir->photo)
                            <img src="{{ asset('storage/' . $supir->photo) }}" 
                                 class="rounded-circle" width="55" height="55" 
                                 style="object-fit:cover;" alt="Foto Supir">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    <!-- Nama -->
                    <td>{{ $supir->name }}</td>

                    <!-- Harga -->
                    <td>Rp {{ number_format($supir->price, 0, ',', '.') }}</td>

                    <!-- Action -->
                    <td class="text-center">
                        <div class="mb-2">
                            <a href="{{ route('adminpanel.supir.edit', $supir->id) }}" 
                            class="btn btn-sm btn-warning me-1">Edit</a>

                            <form action="{{ route('adminpanel.supir.delete', $supir->id) }}" 
                                method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>

                            <a href="{{ route('adminpanel.supir.show', $supir->id) }}" 
                            class="btn btn-sm btn-info me-1">Detail</a>
                        </div>

                        <!-- Status Badge -->
                        <span class="badge {{ $supir->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($supir->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">
                        <strong>Tidak ada data supir.</strong>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
