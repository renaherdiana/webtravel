@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Detail Service Mobil</h3>
        <p class="text-muted mb-0">Informasi lengkap dari data service / mobil</p>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <!-- Foto -->
        <div class="text-center mb-4">
            @if ($service->photo)
                <img src="{{ asset('storage/' . $service->photo) }}"
                     width="180" height="150"
                     class="rounded shadow-sm"
                     style="object-fit: cover;">
            @else
                <p class="text-muted">Tidak ada foto</p>
            @endif
        </div>

        <table class="table align-middle" style="border-collapse: separate; border-spacing: 0 10px;">
            <tbody>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="width:200px; border-radius: 8px 0 0 8px;">Merk Mobil</th>
                    <td class="bg-white border rounded-end">{{ $service->merk_mobil }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">Nama Mobil</th>
                    <td class="bg-white border rounded-end">{{ $service->nama_mobil }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold">Tahun Pembuatan</th>
                    <td class="bg-white border rounded-end">{{ $service->tahun_pembuatan }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold">Harga Sewa / Hari</th>
                    <td class="bg-white border rounded-end">Rp {{ number_format($service->harga_sewa,0,',','.') }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold">Status</th>
                    <td class="bg-white border rounded-end">
                        @if ($service->status === 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold">Created At</th>
                    <td class="bg-white border rounded-end">{{ $service->created_at }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold">Updated At</th>
                    <td class="bg-white border rounded-end">{{ $service->updated_at }}</td>
                </tr>

            </tbody>
        </table>

        <a href="{{ route('adminpanel.service') }}" class="btn btn-secondary mt-3">Back</a>
        <a href="{{ route('adminpanel.service.edit', $service->id) }}" class="btn btn-warning mt-3">Edit</a>

    </div>
</div>

@endsection
