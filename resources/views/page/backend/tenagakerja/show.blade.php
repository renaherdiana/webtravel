@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" 
         style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Detail Tenaga Kerja</h3>
        <p class="text-muted mb-0">Informasi lengkap tenaga kerja Travino</p>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <!-- Foto -->
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $tenagakerja->photo) }}"
                 width="150" height="150"
                 class="rounded-circle shadow-sm"
                 style="object-fit: cover;">
        </div>

        <!-- Table Detail -->
        <table class="table align-middle" style="border-collapse: separate; border-spacing: 0 10px;">
            <tbody>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" 
                        style="width:200px; border-radius: 8px 0 0 8px;">Nama</th>
                    <td class="bg-white border rounded-end">{{ $tenagakerja->name }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" 
                        style="border-radius: 8px 0 0 8px;">Posisi</th>
                    <td class="bg-white border rounded-end">{{ $tenagakerja->position }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" 
                        style="border-radius: 8px 0 0 8px;">Status</th>
                    <td class="bg-white border rounded-end">
                        @if ($tenagakerja->status == 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" 
                        style="border-radius: 8px 0 0 8px;">Created At</th>
                    <td class="bg-white border rounded-end">{{ $tenagakerja->created_at }}</td>
                </tr>

                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" 
                        style="border-radius: 8px 0 0 8px;">Updated At</th>
                    <td class="bg-white border rounded-end">{{ $tenagakerja->updated_at }}</td>
                </tr>

            </tbody>
        </table>

        <!-- Buttons -->
        <a href="{{ route('adminpanel.tenagakerja') }}" class="btn btn-secondary mt-3">Back</a>
        <a href="{{ route('adminpanel.tenagakerja.edit', $tenagakerja->id) }}" class="btn btn-warning mt-3">Edit</a>

    </div>
</div>

@endsection
