@extends('layouts.backend.app')

@section('content')

<!-- Header -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman About</h3>
        <p class="text-muted mb-0">Kelola konten halaman About</p>
    </div>
</div>

<!-- Button Create -->
<div class="mb-3 text-end">
    <a href="{{ route('adminpanel.about.create') }}" class="btn btn-primary btn-sm">+ Create New</a>
</div>

<!-- Table -->
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color:#e8e8e8; color:#000;">
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Title</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($abouts as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    <td>
                        <img src="{{ asset('storage/' . $item->photo) }}" 
                             class="rounded-circle" width="55" height="55" style="object-fit:cover;">
                    </td>

                    <td>{{ $item->title }}</td>

                    <td class="text-center">

                        <div class="mb-2">
                            <a href="{{ route('adminpanel.about.edit', $item->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>

                            <form action="{{ route('adminpanel.about.delete', $item->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">
                                    Delete
                                </button>
                            </form>
                            
                            <a href="{{ route('adminpanel.about.detail', $item->id) }}" class="btn btn-sm btn-info me-1">Detail</a>
                        </div>

                        @if ($item->status == 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4">
                        <strong>Tidak ada data About.</strong>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
