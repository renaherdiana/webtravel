<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Supir;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class ServiceFrontendController extends Controller
{
    /**
     * Halaman daftar layanan mobil
     */
    public function index(Request $request)
    {
        $query = Service::where('status', 'active');

        if ($request->has('merk') && $request->merk != '') {
            $query->where('merk_mobil', 'like', '%' . $request->merk . '%');
        }

        $services = $query->orderBy('id', 'DESC')->get();

        return view('page.frontend.service.index', compact('services'));
    }

    /**
     * Halaman booking form
     */
    public function booking(Request $request)
    {
        $services = Service::where('status', 'active')->orderBy('id','DESC')->get();
        $supirs = Supir::where('status', 'active')->orderBy('name','ASC')->get();

        $selectedService = $request->has('mobil_id') ? Service::find($request->mobil_id) : null;
        $selectedSupir   = $request->has('supir_id') ? Supir::find($request->supir_id) : null;

        return view('page.frontend.service.booking', compact(
            'services', 
            'supirs', 
            'selectedService', 
            'selectedSupir'
        ));
    }

    /**
     * Simpan data booking pelanggan
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required',
            'telepon'     => 'required',
            'email'       => 'required|email',
            'mobil_id'    => 'required|exists:services,id',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
            'dropoff_date'=> 'required|date',
            'dropoff_time'=> 'required',
        ]);

        $service = Service::find($request->mobil_id);
        $supir   = $request->supir_id ? Supir::find($request->supir_id) : null;

        Pelanggan::create([
            'nama'            => $request->nama,
            'telepon'         => $request->telepon,
            'email'           => $request->email,
            'merk_mobil'      => $service->merk_mobil,
            'tipe_mobil'      => $service->nama_mobil,
            'tanggal_booking' => $request->pickup_date,
            'jam_booking'     => $request->pickup_time,
            'status'          => 'pending', 
            'supir_id'        => $supir?->id,
        ]);

        return redirect()->route('frontend.home')
                         ->with('success', 'Booking berhasil disimpan!');
    }
}
