@extends('layouts.backend.app')

@section('content')

<!-- Judul Halaman -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman Service</h3>
        <p class="text-muted mb-0">Selamat datang di panel admin Travino Travel</p>
    </div>
</div>

<!-- Create & Search -->
<div class="mb-3 d-flex justify-content-between align-items-center">

    <!-- Pencarian di kiri -->
    <div class="position-relative" style="width: 250px;">
        <form action="{{ route('adminpanel.service') }}" method="GET">
            <input type="text" name="merk" class="form-control rounded-pill ps-4" 
                   placeholder="Cari merk..." value="{{ request('merk') }}">
            <span class="position-absolute top-50 start-0 translate-middle-y ps-2 text-muted">
                
            </span>
        </form>

        <!-- Reset Icon -->
        @if(request('merk'))
            <a href="{{ route('adminpanel.service') }}" class="position-absolute top-50 end-0 translate-middle-y pe-2 text-muted">
            </a>
        @endif
    </div>

    <!-- Create di kanan (tidak diubah bentuknya) -->
    <div>
        <a href="{{ route('adminpanel.service.create') }}" class="btn btn-primary btn-sm">
            + Create New
        </a>
    </div>

</div>

<!-- Table -->
<div class="card shadow-sm rounded-4">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Merk Mobil</th>
                    <th>Nama Mobil</th>
                    <th>Tahun Pembuatan</th>
                    <th>Harga Sewa</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($services as $index => $service)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    <td>
                        @if ($service->photo)
                            <img src="{{ asset('storage/' . $service->photo) }}" 
                                 class="rounded-circle" width="55" height="55" 
                                 style="object-fit:cover;" alt="Service Photo">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    <td>{{ $service->merk_mobil }}</td>
                    <td>{{ $service->nama_mobil }}</td>
                    <td>{{ $service->tahun_pembuatan }}</td>
                    <td>Rp {{ number_format($service->harga_sewa,0,',','.') }}</td>

                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-1 mb-1 flex-wrap">
                            <a href="{{ route('adminpanel.service.edit', $service->id) }}" 
                               class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('adminpanel.service.delete', $service->id) }}" 
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>

                            <a href="{{ route('adminpanel.service.show', $service->id) }}" 
                               class="btn btn-sm btn-info">Detail</a>
                        </div>

                        <span class="badge {{ $service->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($service->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted">
                        <strong>Tidak ada data service.</strong>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
