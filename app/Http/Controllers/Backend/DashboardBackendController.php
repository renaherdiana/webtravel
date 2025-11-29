<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Service;
use App\Models\Supir;

class DashboardBackendController extends Controller
{
    public function index()
    {
        $total_users     = User::count();
        $total_pelanggan = Pelanggan::count();
        $total_service   = Service::count();
        $total_supir     = Supir::count();

        return view('page.backend.dashboard.index', compact(
            'total_users',
            'total_pelanggan',
            'total_service',
            'total_supir'
        ));
    }
}
