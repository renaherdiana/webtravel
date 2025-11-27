@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Detail Payment</h3>
        <p class="text-muted mb-0">Informasi lengkap pembayaran pelanggan</p>
    </div>
</div>

@php
    $sisa = $payment->total - $payment->amount_paid;
@endphp

<div class="card shadow-sm border-0">
    <div class="card-body">

        <!-- Info Pelanggan -->
        <div class="text-center mb-5">
            <h4 class="fw-bold">{{ $payment->pelanggan->nama ?? '-' }}</h4>
            <p class="text-secondary">{{ $payment->pelanggan->telepon ?? '-' }} | {{ $payment->pelanggan->email ?? '-' }}</p>
        </div>

        <!-- Sisa Bayar jika belum lunas -->
        @if($payment->status != 'paid' && $sisa > 0)
        <div class="mb-4">
            <div class="p-3 bg-light rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #f1f5f9;">
                <strong>Sisa Bayar</strong>
                <span class="fw-bold text-danger">Rp {{ number_format($sisa,0,',','.') }}</span>
            </div>
        </div>
        @endif

        <!-- Detail Payment -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="p-3 bg-light rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #f8fafc;">
                    <strong>Mobil</strong>
                    <span>{{ $payment->pelanggan->merk_mobil ?? '-' }} - {{ $payment->pelanggan->tipe_mobil ?? '-' }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-light rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #f8fafc;">
                    <strong>Supir</strong>
                    <span>{{ $payment->pelanggan->supir->name ?? 'Tanpa Supir' }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-light rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #f1f5f9;">
                    <strong>Total</strong>
                    <span class="fw-bold text-success">Rp {{ number_format($payment->total,0,',','.') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #f1f5f9;">
                    <strong>Status</strong>
                    <span>
                        @if($payment->status == 'paid')
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Paid</span>
                        @elseif($payment->status == 'partial')
                            <span class="badge bg-info text-dark"><i class="bi bi-circle-half me-1"></i>Partial</span>
                        @elseif($payment->status == 'pending')
                            <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Pending</span>
                        @elseif($payment->status == 'cancelled')
                            <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Cancelled</span>
                        @else
                            <span class="badge bg-secondary">Unknown</span>
                        @endif
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-light rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #f8fafc;">
                    <strong>Tanggal Booking</strong>
                    <span>{{ $payment->pelanggan->tanggal_booking ?? '-' }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-light rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #f8fafc;">
                    <strong>Jam Booking</strong>
                    <span>{{ $payment->pelanggan->jam_booking ?? '-' }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-light rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #f1f5f9;">
                    <strong>Created At</strong>
                    <span>{{ $payment->created_at->format('d M Y H:i') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-light rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #f1f5f9;">
                    <strong>Updated At</strong>
                    <span>{{ $payment->updated_at->format('d M Y H:i') }}</span>
                </div>
            </div>
        </div>

        <!-- Form Pembayaran Tambahan -->
        @if($payment->status != 'paid' && $sisa > 0)
        <div class="payment-card mt-4 p-4 rounded shadow-sm" style="background: #e0f2fe;">
            <h5 class="fw-bold text-primary mb-3">Lakukan Pembayaran Tambahan</h5>

            <form action="{{ route('adminpanel.payment.pay', $payment->id) }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Metode Pembayaran</label>
                    <select name="payment_method" class="form-select" required>
                        <option value="bank" selected>Bank</option>
                        <option value="ovo">OVO</option>
                        <option value="gopay">Gopay</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Jumlah Bayar (Rp)</label>
                    <input type="number" name="amount" class="form-control" max="{{ $sisa }}" value="{{ $sisa }}" required>
                </div>

                <button type="submit" class="btn btn-gradient w-100 fw-bold">Bayar Sekarang</button>
            </form>
        </div>

        <style>
            .btn-gradient {
                background: linear-gradient(90deg, #4ade80, #16a34a);
                color: #fff;
                font-weight: 700;
                padding: .75rem 0;
                border-radius: .75rem;
                transition: 0.3s;
            }
            .btn-gradient:hover {
                background: linear-gradient(90deg, #16a34a, #4ade80);
            }
        </style>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('adminpanel.payment') }}" class="btn btn-secondary btn-lg">Kembali</a>
        </div>

    </div>
</div>

@endsection
