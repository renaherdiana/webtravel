@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Detail Pelanggan</h3>
        <p class="text-muted mb-0">Informasi lengkap pelanggan</p>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <!-- Info Card Aesthetic -->
        <div class="p-4 rounded-4 shadow-lg" style="background: linear-gradient(145deg, #f8f9fa, #e9ecef);">

            <!-- Nama & Kontak -->
            <div class="text-center mb-5">
                <h3 class="fw-bold">{{ $pelanggan->nama }}</h3>
                <p class="text-secondary">{{ $pelanggan->telepon }} | {{ $pelanggan->email }}</p>
            </div>

            <!-- Detail Info -->
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 bg-white rounded-3 shadow-sm d-flex justify-content-between align-items-center">
                        <strong>Mobil</strong>
                        <span>{{ $pelanggan->merk_mobil }} - {{ $pelanggan->tipe_mobil }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-white rounded-3 shadow-sm d-flex justify-content-between align-items-center">
                        <strong>Supir</strong>
                        <span>{{ $pelanggan->supir->name ?? 'Tanpa Supir' }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-white rounded-3 shadow-sm d-flex justify-content-between align-items-center">
                        <strong>Tanggal Booking</strong>
                        <span>{{ $pelanggan->tanggal_booking }} {{ $pelanggan->jam_booking }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-white rounded-3 shadow-sm d-flex justify-content-between align-items-center">
                        <strong>Tanggal Selesai</strong>
                        <span>{{ $pelanggan->tanggal_selesai ?? '-' }} {{ $pelanggan->jam_selesai ?? '-' }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-white rounded-3 shadow-sm d-flex justify-content-between align-items-center">
                        <strong>Status Booking</strong>
                        <span>
                            @if($pelanggan->status == 'pending')
                                <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Pending</span>
                            @elseif($pelanggan->status == 'ongoing')
                                <span class="badge bg-primary"><i class="bi bi-clock me-1"></i>Ongoing</span>
                            @elseif($pelanggan->status == 'completed')
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Completed</span>
                            @elseif($pelanggan->status == 'cancelled')
                                <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Cancelled</span>
                            @else
                                <span class="badge bg-secondary">Unknown</span>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-white rounded-3 shadow-sm d-flex justify-content-between align-items-center">
                        <strong>Created At</strong>
                        <span>{{ $pelanggan->created_at->format('d M Y H:i') }}</span>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('adminpanel.pelanggan') }}" class="btn btn-secondary btn-lg">Kembali</a>
            </div>

        </div>
    </div>
</div>

@endsection
