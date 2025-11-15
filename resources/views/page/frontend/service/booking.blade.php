@extends('layouts.frontend.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Service</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Service</li>
        </ol>    
    </div>
</div><br><br>
<!-- Header End -->

<!-- Booking Form Start (Full Width, Grey) -->
<div class="container-fluid py-5" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="p-5 rounded-4 shadow-lg" style="background-color: #e0e0e0;">
                <h2 class="text-center fw-bold mb-5" style="color: #343a40;">CONTINUE CAR RESERVATION</h2>
                <form action="{{ route('frontend.booking') }}" method="GET">
                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Nama</label>
                        <input type="text" class="form-control form-control-lg" placeholder="Masukkan nama Anda" name="nama" required>
                    </div>
                    <!-- No Telepon -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">No. Telepon</label>
                        <input type="text" class="form-control form-control-lg" placeholder="Masukkan nomor telepon" name="telepon" required>
                    </div>
                    <!-- Email -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control form-control-lg" placeholder="Masukkan email" name="email" required>
                    </div>
                    <!-- Pilih Mobil -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Pilih Mobil</label>
                        <select class="form-select form-select-lg" name="mobil" required>
                            <option selected disabled>Pilih Tipe Mobil</option>
                            <option value="VW Golf VII">VW Golf VII</option>
                            <option value="Audi A1 S-Line">Audi A1 S-Line</option>
                            <option value="Toyota Camry">Toyota Camry</option>
                            <option value="BMW 320 ModernLine">BMW 320 ModernLine</option>
                        </select>
                    </div>
                    <!-- Pick Up -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Lokasi Pick Up</label>
                        <input type="text" class="form-control form-control-lg" placeholder="Kota / Airport" name="pickup" required>
                    </div>
                    <!-- Drop Off -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Lokasi Drop Off</label>
                        <input type="text" class="form-control form-control-lg" placeholder="Kota / Airport" name="dropoff" required>
                    </div>
                    <!-- Pick Up Date & Time -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Tanggal & Jam Berangkat</label>
                        <div class="d-flex flex-column flex-md-row gap-2">
                            <input type="date" class="form-control form-control-lg" name="pickup_date" required>
                            <select class="form-select form-select-lg" name="pickup_time" required>
                                <option selected>12:00 AM</option>
                                <option value="1">1:00 AM</option>
                                <option value="2">2:00 AM</option>
                                <option value="3">3:00 AM</option>
                                <option value="4">4:00 AM</option>
                                <option value="5">5:00 AM</option>
                                <option value="6">6:00 AM</option>
                                <option value="7">7:00 AM</option>
                            </select>
                        </div>
                    </div>
                    <!-- Drop Off Date & Time -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Tanggal & Jam Pulang</label>
                        <div class="d-flex flex-column flex-md-row gap-2">
                            <input type="date" class="form-control form-control-lg" name="dropoff_date" required>
                            <select class="form-select form-select-lg" name="dropoff_time" required>
                                <option selected>12:00 AM</option>
                                <option value="1">1:00 AM</option>
                                <option value="2">2:00 AM</option>
                                <option value="3">3:00 AM</option>
                                <option value="4">4:00 AM</option>
                                <option value="5">5:00 AM</option>
                                <option value="6">6:00 AM</option>
                                <option value="7">7:00 AM</option>
                            </select>
                        </div>
                    </div>
                    <!-- Submit -->
                    <button type="submit" class="btn btn-dark btn-lg w-100 py-3 fw-bold">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Booking Form End -->

@endsection
