@extends('layouts.frontend.app')

@section('content')

<style>
    /* ===== CUSTOM STYLE BOOKING FORM ===== */
    .booking-card {
        background: linear-gradient(145deg, #f8f9fa, #e9ecef);
        border-radius: 1rem;
        padding: 3rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        transition: all 0.3s ease-in-out;
    }
    .booking-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }
    .form-label {
        font-weight: 600;
    }
    .btn-book {
        background: linear-gradient(90deg, #4ade80, #16a34a);
        color: #fff;
        font-weight: 700;
        transition: 0.3s;
    }
    .btn-book:hover {
        background: linear-gradient(90deg, #16a34a, #4ade80);
        color: #fff;
    }
</style>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4">Service</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Booking</li>
        </ol>    
    </div>
</div><br><br>
<!-- Header End -->

<!-- Booking Form Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="booking-card">

                <h2 class="text-center fw-bold mb-5 text-primary">Continue Car Reservation</h2>

                <form action="{{ route('frontend.booking.store') }}" method="POST">
                    @csrf

                    <!-- Nama & Telepon -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control form-control-lg shadow-sm" placeholder="Masukkan nama Anda" name="nama" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" class="form-control form-control-lg shadow-sm" placeholder="Masukkan nomor telepon" name="telepon" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control form-control-lg shadow-sm" placeholder="Masukkan email" name="email" required>
                    </div>

                    <!-- Pilih Mobil (otomatis terpilih) -->
                    <div class="mb-4">
                        <label class="form-label">Mobil Anda</label>
                        <input type="text" class="form-control form-control-lg shadow-sm" value="{{ $selectedService->nama_mobil ?? '' }} - {{ $selectedService->merk_mobil ?? '' }}" readonly>
                        <input type="hidden" name="mobil_id" value="{{ $selectedService->id ?? '' }}">
                    </div>

                    <!-- Lokasi Pick Up & Drop Off -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label">Lokasi Pick Up</label>
                            <input type="text" class="form-control form-control-lg shadow-sm" placeholder="Kota / Airport" name="pickup" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Lokasi Drop Off</label>
                            <input type="text" class="form-control form-control-lg shadow-sm" placeholder="Kota / Airport" name="dropoff" required>
                        </div>
                    </div>

                    <!-- Pick Up & Drop Off Date/Time -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label">Tanggal & Jam Berangkat</label>
                            <div class="d-flex gap-2">
                                <input type="date" class="form-control form-control-lg shadow-sm" name="pickup_date" required>
                                <select class="form-select form-select-lg shadow-sm" name="pickup_time" required>
                                    @for($i=0; $i<24; $i++)
                                        <option value="{{ sprintf('%02d:00', $i) }}">{{ sprintf('%02d:00', $i) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal & Jam Pulang</label>
                            <div class="d-flex gap-2">
                                <input type="date" class="form-control form-control-lg shadow-sm" name="dropoff_date" required>
                                <select class="form-select form-select-lg shadow-sm" name="dropoff_time" required>
                                    @for($i=0; $i<24; $i++)
                                        <option value="{{ sprintf('%02d:00', $i) }}">{{ sprintf('%02d:00', $i) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Pilih Supir -->
                    <div class="mb-4">
                        <label class="form-label">Pilih Supir (Opsional)</label>
                        <select class="form-select form-select-lg shadow-sm" name="supir_id">
                            <option selected value="">Tanpa Supir</option>
                            @foreach($supirs as $supir)
                                <option value="{{ $supir->id }}">
                                    {{ $supir->name }} - {{ $supir->phone }} 
                                    (Rp {{ number_format($supir->price,0,',','.') }}/Hari)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-book btn-lg w-100 py-3 shadow">Book Now</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Booking Form End -->

@endsection
