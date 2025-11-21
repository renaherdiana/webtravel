@extends('layouts.backend.app')

@section('content')

<!-- Header -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #d4c7ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Halaman Gallery</h3>
        <p class="text-muted mb-0">Kelola foto gallery website</p>
    </div>
</div>

<!-- Button Create -->
<div class="mb-4 text-end">
    <a href="{{ route('adminpanel.gallery.create') }}" class="btn btn-primary btn-sm">+ Create New</a>
</div>

<!-- Gallery List -->
<div class="row g-4">

    @forelse ($galleries as $item)
    <div class="col-md-4">
        <div class="p-4 text-center rounded-3 shadow-sm"
             style="background:#d9c5ff; border:1px solid #a682ff;">

            <!-- Photo -->
            <img src="{{ asset('storage/' . $item->photo) }}"
                 class="rounded-circle mb-3 shadow"
                 width="120" height="120"
                 style="object-fit:cover; border:4px solid #b399ff;">

            <!-- Title -->
            <h6 class="fw-bold mb-3 fs-5 text-dark">{{ $item->title }}</h6>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-center gap-3 mb-3">

                <!-- Edit -->
                <a href="{{ route('adminpanel.gallery.edit', $item->id) }}"
                   class="btn btn-warning btn-sm p-3 rounded-circle" title="Edit">
                    <i class="fas fa-pen-to-square fs-5"></i>
                </a>

                <!-- Delete -->
                <form action="{{ route('adminpanel.gallery.delete',$item->id) }}" 
                      method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm p-3 rounded-circle" 
                            title="Delete" onclick="return confirm('Hapus foto ini?')">
                        <i class="fas fa-trash fs-5"></i>
                    </button>
                </form>

                <!-- Detail -->
                <a href="{{ route('adminpanel.gallery.detail', $item->id) }}"
                   class="btn btn-info btn-sm p-3 rounded-circle" title="Detail">
                    <i class="fas fa-eye fs-5"></i>
                </a>
                
            </div>

            <!-- Status -->
            <span class="btn btn-sm w-100 fw-bold
                {{ $item->status == 'active' ? 'btn-success' : 'btn-secondary' }}">
                {{ strtoupper($item->status) }}
            </span>
        </div>
    </div>

    @empty
    <div class="text-center mt-5">
        <p class="text-muted fw-semibold"> Belum ada data gallery</p>
    </div>
    @endforelse

</div>

@endsection
