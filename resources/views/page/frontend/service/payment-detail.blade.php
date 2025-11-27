@extends('layouts.frontend.app')

@section('content')

<style>
    /* ===== Custom Style Detail Transaksi ===== */
    .summary-card {
        background: linear-gradient(145deg, #f8f9fa, #e9ecef);
        border-radius: 1rem;
        padding: 2.5rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        transition: all 0.3s ease-in-out;
    }
    .summary-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }
    .section-card {
        background-color: #fff;
        border-radius: .75rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    .btn-home {
        background: linear-gradient(90deg, #4ade80, #16a34a);
        color: #fff;
        font-weight: 700;
        transition: 0.3s;
    }
    .btn-home:hover {
        background: linear-gradient(90deg, #16a34a, #4ade80);
        color: #fff;
    }
</style>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4">Detail Transaksi</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}" class="text-white">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('frontend.booking.payment', $payment->id) }}" class="text-white">Payment</a></li>
            <li class="breadcrumb-item active text-primary">Detail Transaksi</li>
        </ol>    
    </div>
</div><br><br>
<!-- Header End -->

<!-- Detail Transaksi Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="summary-card">

                <h2 class="text-center fw-bold mb-5 text-primary">Detail Transaksi</h2>

                <!-- Info Booking -->
                <div class="section-card">
                    <h5 class="fw-bold mb-3 text-secondary">Detail Booking</h5>
                    <div class="row">
                        <div class="col-md-6 mb-2"><strong>Nama:</strong> {{ $pelanggan->nama }}</div>
                        <div class="col-md-6 mb-2"><strong>Telepon:</strong> {{ $pelanggan->telepon }}</div>
                        <div class="col-md-6 mb-2"><strong>Email:</strong> {{ $pelanggan->email }}</div>
                        <div class="col-md-6 mb-2"><strong>Mobil:</strong> {{ $pelanggan->tipe_mobil }} - {{ $pelanggan->merk_mobil }}</div>
                        <div class="col-md-6 mb-2"><strong>Supir:</strong> {{ $pelanggan->supir->name ?? 'Tanpa Supir' }}</div>
                        <div class="col-md-6 mb-2"><strong>Pick Up:</strong> {{ $pelanggan->tanggal_booking }} {{ $pelanggan->jam_booking }}</div>
                        <div class="col-md-6 mb-2"><strong>Drop Off:</strong> {{ $pelanggan->tanggal_selesai }} {{ $pelanggan->jam_selesai }}</div>
                        <div class="col-md-6 mb-2"><strong>Jumlah Hari:</strong> {{ $days }} Hari</div>
                    </div>
                </div>

                <!-- Ringkasan Pembayaran -->
                <div class="section-card">
                    <h5 class="fw-bold mb-3 text-secondary">Ringkasan Pembayaran</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total Mobil</span>
                            <span>Rp {{ number_format($totalMobil,0,',','.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total Supir</span>
                            <span>Rp {{ number_format($totalSupir,0,',','.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between fw-bold text-success">
                            <span>Grand Total</span>
                            <span>Rp {{ number_format($grandTotal,0,',','.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Status Pembayaran</span>
                            <span class="fw-bold">{{ ucfirst($payment->status) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Metode Pembayaran</span>
                            <span class="fw-bold">{{ ucfirst($payment->payment_method) ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Jumlah Dibayar</span>
                            <span>Rp {{ number_format($payment->amount_paid,0,',','.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Sisa Pembayaran</span>
                            <span>Rp {{ number_format($grandTotal - $payment->amount_paid,0,',','.') }}</span>
                        </li>
                    </ul>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('frontend.home') }}" class="btn btn-home btn-lg">Kembali ke Home</a>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Detail Transaksi End -->

@endsection
