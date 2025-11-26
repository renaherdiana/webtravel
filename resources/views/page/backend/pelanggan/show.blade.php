@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Detail Pelanggan</h3>
        <p class="text-muted mb-0">Informasi lengkap pelanggan</p>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <table class="table align-middle" style="border-collapse: separate; border-spacing: 0 10px;">
            <tbody>

                {{-- NAMA --}}
                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="width:200px; border-radius: 8px 0 0 8px;">
                        Nama Lengkap
                    </th>
                    <td class="bg-white border rounded-end">{{ $pelanggan->nama }}</td>
                </tr>

                {{-- TELEPON --}}
                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">
                        Nomor Telepon
                    </th>
                    <td class="bg-white border rounded-end">{{ $pelanggan->telepon }}</td>
                </tr>

                {{-- EMAIL --}}
                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">
                        Email
                    </th>
                    <td class="bg-white border rounded-end">{{ $pelanggan->email }}</td>
                </tr>

                {{-- MERK MOBIL --}}
                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">
                        Merk Mobil
                    </th>
                    <td class="bg-white border rounded-end">{{ $pelanggan->merk_mobil }}</td>
                </tr>

                {{-- TIPE MOBIL --}}
                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">
                        Tipe Mobil
                    </th>
                    <td class="bg-white border rounded-end">{{ $pelanggan->tipe_mobil }}</td>
                </tr>

                {{-- TANGGAL BOOKING --}}
                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">
                        Tanggal Booking
                    </th>
                    <td class="bg-white border rounded-end">{{ $pelanggan->tanggal_booking }}</td>
                </tr>

                {{-- JAM BOOKING --}}
                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">
                        Jam Booking
                    </th>
                    <td class="bg-white border rounded-end">{{ $pelanggan->jam_booking }}</td>
                </tr>

                {{-- STATUS --}}
                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">
                        Status Booking
                    </th>
                    <td class="bg-white border rounded-end">

                        @if ($pelanggan->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>

                        @elseif ($pelanggan->status == 'ongoing')
                            <span class="badge bg-primary">Ongoing</span>

                        @elseif ($pelanggan->status == 'completed')
                            <span class="badge bg-success">Completed</span>

                        @elseif ($pelanggan->status == 'cancelled')
                            <span class="badge bg-danger">Cancelled</span>

                        @else
                            <span class="badge bg-secondary">Unknown</span>
                        @endif

                    </td>
                </tr>

                {{-- CREATED --}}
                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">
                        Created At
                    </th>
                    <td class="bg-white border rounded-end">{{ $pelanggan->created_at }}</td>
                </tr>

                {{-- UPDATED --}}
                <tr class="shadow-sm">
                    <th class="bg-light fw-semibold" style="border-radius: 8px 0 0 8px;">
                        Updated At
                    </th>
                    <td class="bg-white border rounded-end">{{ $pelanggan->updated_at }}</td>
                </tr>

            </tbody>
        </table>

        <a href="{{ route('adminpanel.pelanggan') }}" class="btn btn-secondary mt-3">Back</a>

    </div>
</div>

@endsection
