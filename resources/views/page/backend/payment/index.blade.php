@extends('layouts.backend.app')

@section('content')

<!-- Judul Halaman -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman Payment</h3>
        <p class="text-muted mb-0">Daftar pembayaran pelanggan Travino Travel</p>
    </div>
</div>

@if(session('success'))
<div class="alert alert-dismissible fade show" role="alert" style="background-color: #cfe2ff; color: #084298; border-color: #b6d4fe;">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<!-- Table -->
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color:#e8e8e8; color:#000;">
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Mobil</th>
                    <th>Supir</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($payments as $index => $payment)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $payment->pelanggan->nama ?? '-' }}</td>
                    <td>{{ $payment->pelanggan->merk_mobil ?? '-' }} - {{ $payment->pelanggan->tipe_mobil ?? '-' }}</td>
                    <td>{{ $payment->pelanggan->supir->name ?? 'Tanpa Supir' }}</td>
                    <td>Rp {{ number_format($payment->total,0,',','.') }}</td>
                    <td>
                        @if($payment->status == 'paid')
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Paid</span>
                        @elseif($payment->status == 'partial')
                            <span class="badge bg-info text-dark"><i class="bi bi-circle-half me-1"></i>Partial</span>
                        @elseif($payment->status == 'pending')
                            <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Pending</span>
                        @elseif($payment->status == 'cancelled')
                            <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Cancelled</span>
                        @else
                            <span class="badge bg-secondary">Unknown</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="mb-2">
                            <a href="{{ route('adminpanel.payment.show', $payment->id) }}" 
                               class="btn btn-sm btn-info me-1">Detail</a>
                            <form action="{{ route('adminpanel.payment.destroy', $payment->id) }}" 
                                  method="POST" class="d-inline" 
                                  onsubmit="return confirm('Yakin ingin menghapus payment ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4">
                        <strong>Tidak ada data payment.</strong>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
