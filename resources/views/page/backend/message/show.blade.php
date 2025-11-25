@extends('layouts.backend.app')

@section('content')

<!-- Judul Halaman -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-1 text-primary">Detail Pesan</h3>
        <p class="text-muted mb-0">Informasi lengkap pesan dari contact form frontend</p>
    </div>
</div>

<!-- Tombol Kembali -->
<div class="mb-3">
    <a href="{{ route('adminpanel.pesan') }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa-arrow-left me-1"></i> Kembali ke Pesan
    </a>
</div>

<!-- Detail Pesan -->
<div class="card shadow-sm border-0">
    <div class="card-body">

        <table class="table table-borderless mb-0">
            <tr>
                <th width="150" class="text-secondary">Tanggal</th>
                <td><i class="fas fa-calendar-alt me-2 text-primary"></i>{{ $pesan->created_at->format('d M Y H:i') }}</td>
            </tr>
            <tr>
                <th class="text-secondary">Nama</th>
                <td>{{ $pesan->nama }}</td>
            </tr>
            <tr>
                <th class="text-secondary">Email</th>
                <td>{{ $pesan->email }}</td>
            </tr>
            <tr>
                <th class="text-secondary">Phone</th>
                <td>{{ $pesan->phone ?? '-' }}</td>
            </tr>
            <tr>
                <th class="text-secondary">Subject</th>
                <td>{{ $pesan->subject ?? '-' }}</td>
            </tr>
            <tr>
                <th class="text-secondary">Pesan</th>
                <td>
                    <div class="p-3 rounded" style="background-color: #f7f9ff; border: 1px solid #dde3f0; white-space: pre-wrap;">
                        {{ $pesan->message }}
                    </div>
                </td>
            </tr>
        </table>

    </div>
</div>

@endsection
