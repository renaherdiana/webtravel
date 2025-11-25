<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Supir;
use Illuminate\Http\Request;

class ServiceFrontendController extends Controller
{
    /**
     * Display the service page with all active services.
     * Supports optional search by merk_mobil.
     */
    public function index(Request $request)
    {
        // Mulai query untuk service yang aktif
        $query = Service::where('status', 'active');

        // Jika ada parameter pencarian merk, filter
        if ($request->has('merk') && $request->merk != '') {
            $query->where('merk_mobil', 'like', '%' . $request->merk . '%');
        }

        // Ambil semua hasil, urut dari terbaru
        $services = $query->orderBy('id', 'DESC')->get();

        // Kirim ke view
        return view('page.frontend.service.index', compact('services'));
    }

    /**
     * Display booking form with all active services and supirs.
     * Supports pre-selected mobil and supir if clicked from carousel or query string.
     */
    public function booking(Request $request)
    {
        // Ambil semua mobil aktif
        $services = Service::where('status','active')->orderBy('id','DESC')->get();

        // Ambil semua supir aktif
        $supirs = Supir::where('status','active')->orderBy('name','ASC')->get();

        $selectedService = null;
        $selectedSupir = null;

        // Jika ada mobil_id di query string, set pre-selected
        if($request->has('mobil_id')){
            $selectedService = Service::find($request->mobil_id);
        }

        // Jika ada supir_id di query string, set pre-selected
        if($request->has('supir_id')){
            $selectedSupir = Supir::find($request->supir_id);
        }

        return view('page.frontend.service.booking', compact(
            'services', 
            'supirs', 
            'selectedService', 
            'selectedSupir'
        ));
    }
}
