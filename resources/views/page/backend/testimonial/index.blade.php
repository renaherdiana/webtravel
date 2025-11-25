@extends('layouts.backend.app')

@section('content')

<!-- Page Header -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman Testimonial</h3>
        <p class="text-muted mb-0">Kelola testimonial pelanggan Travino Travel</p>
    </div>
</div>

<!-- Button Create -->
<div class="mb-3 text-end">
    <a href="{{ route('adminpanel.testimonial.create') }}" class="btn btn-primary btn-sm">+ CREATE NEW</a>
</div>

<!-- Table -->
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color:#e8e8e8; color:#000;">
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Nama</th>
                    <th>Rating</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($testimonials as $index => $testimonial)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $testimonial->photo) }}" 
                             class="rounded-circle" width="55" height="55" alt="{{ $testimonial->name }}">
                    </td>
                    <td>{{ $testimonial->name }}</td>
                    <td>
                        @for($i=1; $i<=$testimonial->rating; $i++)
                            ⭐
                        @endfor
                    </td>
                    <td class="text-center">
                        <div class="mb-2">
                            <a href="{{ route('adminpanel.testimonial.edit', $testimonial->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                            <a href="{{ route('adminpanel.testimonial.delete', $testimonial->id) }}" 
                               class="btn btn-sm btn-danger" 
                               onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                            <a href="{{ route('adminpanel.testimonial.detail', $testimonial->id) }}" class="btn btn-sm btn-info me-1">Detail</a>
                        </div>

                        @if($testimonial->status == 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Belum ada testimonial.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
