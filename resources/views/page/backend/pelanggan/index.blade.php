@extends('layouts.backend.app')

@section('content')

<!-- Page Header -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman Pelanggan</h3>
        <p class="text-muted mb-0">Daftar pelanggan Travino Travel</p>
    </div>
</div>

<!-- Table -->
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color:#e8e8e8; color:#000;">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Telephone</th>
                    <th>Status</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pelanggans as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->telepon }}</td>

                        <!-- Status Booking -->
                        <td>
                            @if ($item->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif ($item->status == 'ongoing')
                                <span class="badge bg-primary">Ongoing</span>
                            @elseif ($item->status == 'completed')
                                <span class="badge bg-success">Completed</span>
                            @elseif ($item->status == 'cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @else
                                <span class="badge bg-secondary">Unknown</span>
                            @endif
                        </td>

                        <td class="text-center">
                            <!-- Detail -->
                            <a href="{{ route('adminpanel.pelanggan.show', $item->id) }}"
                               class="btn btn-sm btn-info me-1">
                                Detail
                            </a>

                            <!-- Cancel -->
                            @if($item->status != 'completed' && $item->status != 'cancelled')
                                <form action="{{ route('adminpanel.pelanggan.cancel', $item->id) }}" 
                                      method="POST" 
                                      class="d-inline" 
                                      onsubmit="return confirm('Yakin ingin membatalkan booking ini?')">
                                    @csrf
                                    <button class="btn btn-warning btn-sm">Cancel</button>
                                </form>
                            @endif

                            <!-- Delete -->
                            <form action="{{ route('adminpanel.pelanggan.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Belum ada data pelanggan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
