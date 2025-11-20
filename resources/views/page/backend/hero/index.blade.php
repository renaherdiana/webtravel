@extends('layouts.backend.app')

@section('content')

<!-- Judul Halaman -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman Hero</h3>
        <p class="text-muted mb-0">Selamat datang di panel admin Travino Travel</p>
    </div>
</div>

<!-- Button Create -->
<div class="mb-3 text-end">
    <a href="{{ route('adminpanel.hero.create') }}" class="btn btn-primary btn-sm">+ Create New</a>
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

                @forelse ($heroes as $index => $hero)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    <td>
                        <img src="{{ asset('storage/' . $hero->photo) }}" 
                             class="rounded-circle"
                             width="55" height="55"
                             style="object-fit: cover;"
                             alt="Hero Photo">
                    </td>

                    <td>{{ $hero->title }}</td>

                    <td class="text-center">

                        <div class="mb-2">
                            <a href="{{ route('adminpanel.hero.edit', $hero->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>

                            <a href="{{ route('adminpanel.hero.delete', $hero->id) }}" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Delete
                            </a>

                                <a href="{{ route('adminpanel.hero.detail', $hero->id) }}" 
                                class="btn btn-sm btn-info me-1">
                                    Detail
                                </a>
                        </div>

                        @if ($hero->status == 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif

                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center py-4">
                        <strong>Tidak ada data hero.</strong>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

@endsection
