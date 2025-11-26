@extends('layouts.frontend.app')

@section('content')

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
            <div class="p-5 rounded-4 shadow-lg" style="background: linear-gradient(145deg, #f0f0f0, #e0e0e0);">
                <h2 class="text-center fw-bold mb-5" style="color: #343a40;">CONTINUE CAR RESERVATION</h2>

                <form action="{{ route('frontend.booking.store') }}" method="POST">
                @csrf

                    <!-- Nama & Telepon -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text" class="form-control form-control-lg shadow-sm" placeholder="Masukkan nama Anda" name="nama" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">No. Telepon</label>
                            <input type="text" class="form-control form-control-lg shadow-sm" placeholder="Masukkan nomor telepon" name="telepon" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control form-control-lg shadow-sm" placeholder="Masukkan email" name="email" required>
                    </div>

                    <!-- Pilih Mobil -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Pilih Mobil</label>
                        <select class="form-select form-select-lg shadow-sm" name="mobil_id" required>
                            <option selected disabled>Pilih Tipe Mobil</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" 
                                    @if(isset($selectedService) && $selectedService->id == $service->id) selected @endif>
                                    {{ $service->nama_mobil }} - {{ $service->merk_mobil }}
                                    | Rp {{ number_format($service->harga_sewa,0,',','.') }}/Hari
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Lokasi Pick Up & Drop Off -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label fw-bold">Lokasi Pick Up</label>
                            <input type="text" class="form-control form-control-lg shadow-sm" placeholder="Kota / Airport" name="pickup" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Lokasi Drop Off</label>
                            <input type="text" class="form-control form-control-lg shadow-sm" placeholder="Kota / Airport" name="dropoff" required>
                        </div>
                    </div>

                    <!-- Pick Up & Drop Off Date/Time -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label fw-bold">Tanggal & Jam Berangkat</label>
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
                            <label class="form-label fw-bold">Tanggal & Jam Pulang</label>
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
                        <label class="form-label fw-bold">Pilih Supir (Opsional)</label>
                        <select class="form-select form-select-lg shadow-sm" name="supir_id">
                            <option selected value="">Tanpa Supir</option>
                            @foreach($supirs as $supir)
                                <option value="{{ $supir->id }}"
                                    @if(isset($selectedSupir) && $selectedSupir->id == $supir->id) selected @endif>
                                    {{ $supir->name }} - {{ $supir->phone }} 
                                    (Rp {{ number_format($supir->price,0,',','.') }}/Hari)
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary btn-lg w-100 py-3 fw-bold shadow">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Booking Form End -->

@endsection
