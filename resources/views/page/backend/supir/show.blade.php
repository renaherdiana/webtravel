@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Detail Supir</h3>
        <p class="text-muted mb-0">Informasi lengkap dari data supir</p>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <!-- Foto -->
        <div class="text-center mb-4">
            @if ($supir->photo)
                <img src="{{ asset('storage/' . $supir->photo) }}"
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
                    <th class="bg-light fw-semibold" style="width:200px; border-radius: 8px 0 0 8px;">Nama Supir</th>
                    <td class="bg-white border rounded-end">{{ $supir->name }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">Nomor Telepon</th>
                    <td class="bg-white border rounded-end">{{ $supir->phone }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">Harga</th>
                    <td class="bg-white border rounded-end">Rp {{ number_format($supir->price ?? 0, 0, ',', '.') }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">Status</th>
                    <td class="bg-white border rounded-end">
                        <span class="badge {{ $supir->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($supir->status) }}
                        </span>
                    </td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">Created At</th>
                    <td class="bg-white border rounded-end">{{ $supir->created_at }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">Updated At</th>
                    <td class="bg-white border rounded-end">{{ $supir->updated_at }}</td>
                </tr>

            </tbody>
        </table>

        <a href="{{ route('adminpanel.supir') }}" class="btn btn-secondary mt-3">Back</a>
        <a href="{{ route('adminpanel.supir.edit', $supir->id) }}" class="btn btn-warning mt-3">Edit</a>

    </div>
</div>

@endsection
