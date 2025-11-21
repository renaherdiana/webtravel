@extends('layouts.backend.app')

@section('content')

<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman Tenaga Kerja</h3>
        <p class="text-muted mb-0">Kelola data tenaga kerja Travino</p>
    </div>
</div>

<div class="mb-3 text-end">
    <a href="{{ route('adminpanel.tenagakerja.create') }}" class="btn btn-primary btn-sm">+ CREATE NEW</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color:#e8e8e8; color:#000;">
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Nama</th>
                    <th>Position</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($tenagakerjas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <img src="{{ $item->photo ? asset('storage/' . $item->photo) : asset('default.jpg') }}" 
                             class="rounded-circle" width="55" height="55" style="object-fit:cover;">
                    </td>

                    <td class="fw-semibold">{{ $item->name }}</td>
                    <td class="text-secondary">{{ $item->position }}</td>

                    <td class="text-center">
                        <div class="mb-2">

                            <a href="{{ route('adminpanel.tenagakerja.edit', $item->id) }}" 
                               class="btn btn-sm btn-warning me-1">
                                Edit
                            </a>

                            <form action="{{ route('adminpanel.tenagakerja.delete', $item->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf @method('DELETE')

                                <button onclick="return confirm('Hapus data ini?')" 
                                        class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>

                            <a href="{{ route('adminpanel.tenagakerja.detail', $item->id) }}" 
                               class="btn btn-sm btn-info me-1">
                                Detail
                            </a>

                        </div>

                        <!-- Status Badge -->
                        <span class="badge {{ $item->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="5" class="text-center p-4 text-muted">
                         Belum ada data tenaga kerja
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
