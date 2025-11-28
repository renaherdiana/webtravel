@extends('layouts.backend.app')

@section('content')

<!-- Judul Halaman -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Detail Media Social</h3>
        <p class="text-muted mb-0">Informasi lengkap dari data media social</p>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        
        <!-- Foto -->
        <div class="text-center mb-4">
            @if ($social->photo)
                <img src="{{ asset('storage/' . $social->photo) }}"
                     width="180" height="180"
                     class="rounded-circle shadow-sm border border-2 border-light"
                     style="object-fit: cover;">
            @else
                <p class="text-muted">Tidak ada foto</p>
            @endif
        </div>

        <table class="table align-middle" style="border-collapse: separate; border-spacing: 0 10px;">
            <tbody>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="width:200px; border-radius: 8px 0 0 8px;">Nama Media Social</th>
                    <td class="bg-white border rounded-end">{{ $social->name }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">Nama Account</th>
                    <td class="bg-white border rounded-end">{{ $social->account_name }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">Link Account</th>
                    <td class="bg-white border rounded-end">
                        <a href="{{ $social->link }}" target="_blank">{{ $social->link }}</a>
                    </td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">Status</th>
                    <td class="bg-white border rounded-end">
                        @if ($social->status === 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">Created At</th>
                    <td class="bg-white border rounded-end">{{ $social->created_at }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">Updated At</th>
                    <td class="bg-white border rounded-end">{{ $social->updated_at }}</td>
                </tr>

            </tbody>
        </table>

        <a href="{{ route('adminpanel.socialmedia') }}" class="btn btn-secondary mt-3">Back</a>
        <a href="{{ route('adminpanel.mediasocial.edit', $social->id) }}" class="btn btn-warning mt-3">Edit</a>

    </div>
</div>

@endsection
