@extends('layouts.backend.app')

@section('content')

<!-- Judul Halaman -->
<div class="mb-4" >
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman Pesan</h3>
        <p class="text-muted mb-0">Kelola pesan yang dikirim dari form contact frontend</p>
    </div>
</div>

<!-- Table -->
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color:#e8e8e8; color:#000;">
                <tr>
                    <th>No</th >
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesans as $index => $pesan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pesan->nama }}</td>
                    <td>{{ $pesan->email }}</td>
                    <td>{{ $pesan->subject ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('adminpanel.pesan.detail', $pesan->id) }}" 
                           class="btn btn-sm btn-info me-1">Detail</a>
                        <a href="{{ route('adminpanel.pesan.delete', $pesan->id) }}" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('Yakin ingin menghapus pesan ini?')">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">
                        <strong>Belum ada pesan masuk.</strong>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
