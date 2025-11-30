@extends('layouts.auth.app')

@section('content')
<main class="main-content mt-0">

    <section>
        <div class="page-header min-vh-100 d-flex align-items-center justify-content-center"
            style="
                background: linear-gradient(
                    135deg,
                    #e0e7ff,
                    #f0f9ff
                );
            ">

            <div class="container">
                <div class="row justify-content-center">

                    <!-- LOGIN CARD -->
                    <div class="col-xl-4 col-lg-5 col-md-6">

                        <div class="card shadow-lg border-0 rounded-4 p-4 mx-auto"
                            style="
                                backdrop-filter: blur(10px);
                                background: rgba(255, 255, 255, 0.7);
                                border: 1px solid rgba(255, 255, 255, 0.4);
                            ">

                            <div class="text-center mb-4">
                                <h2 class="fw-bold text-primary mb-1">Travino Travel</h2>
                                <p class="text-muted small">
                                    Masukkan email dan password Anda
                                </p>
                            </div>

                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <!-- EMAIL -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-dark">Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control rounded-3 @error('email') is-invalid @enderror"
                                        placeholder="Masukkan email"
                                        required
                                    >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- PASSWORD -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-dark">Password</label>
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control rounded-3 @error('password') is-invalid @enderror"
                                        placeholder="Masukkan password"
                                        required
                                    >
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- BUTTON -->
                                <button type="submit"
                                    class="btn w-100 py-2 fw-bold rounded-3 mt-2"
                                    style="
                                        background: linear-gradient(135deg, #4f46e5, #0ea5e9);
                                        color: #fff;
                                    ">
                                    Masuk
                                </button>

                            </form>

                            <div class="text-center mt-4">
                                <p class="small text-muted">
                                    Belum punya akun?
                                    <a href="/register" class="fw-bold text-primary">Register</a>
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
</main>
@endsection
