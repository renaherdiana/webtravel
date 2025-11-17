@extends('layouts.backend.app')

@section('content')

<!-- Page Header / Judul Halaman -->
<div class="mb-4">
    <div class="p-3 rounded-3 shadow-sm" style="background: linear-gradient(135deg, #e0d4ff, #ffffff);">
        <h3 class="fw-bold mb-0 text-primary">Dashboard</h3>
        <p class="text-muted mb-0">Selamat datang di panel admin Travino Travel</p>
    </div>
</div>

<!-- Dashboard Cards -->
<div class="row g-3">
    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h6>Total Users</h6>
            <h3 class="fw-bold">120</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h6>Orders</h6>
            <h3 class="fw-bold">85</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h6>Products</h6>
            <h3 class="fw-bold">42</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h6>Revenue</h6>
            <h3 class="fw-bold">$1,240</h3>
        </div>
    </div>
</div>

<!-- Latest Transactions -->
<div class="card mt-4 shadow-sm">
    <div class="card-header">
        <strong>Latest Transactions</strong>
    </div>

    <table class="table mb-0">
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Item</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Ani</td>
            <td>Ticket Bali</td>
            <td><span class="badge bg-success">Success</span></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Budi</td>
            <td>Hotel Bandung</td>
            <td><span class="badge bg-warning">Pending</span></td>
        </tr>
    </table>
</div>

@endsection
