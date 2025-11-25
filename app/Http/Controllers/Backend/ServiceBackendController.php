<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceBackendController extends Controller
{
    /**
     * Display a listing of the services, with optional search.
     */
    public function index(Request $request)
    {
        $query = Service::query();

        // Filter pencarian berdasarkan merk mobil
        if ($request->filled('merk')) {
            $query->where('merk_mobil', 'like', '%' . $request->merk . '%');
        }

        $services = $query->orderBy('id', 'DESC')->get();

        return view('page.backend.service.index', compact('services'));
    }

    /**
     * Show the form to create a new service.
     */
    public function create()
    {
        return view('page.backend.service.create');
    }

    /**
     * Store a newly created service in database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merk_mobil'       => 'required|string|max:100',
            'nama_mobil'       => 'required|string|max:100',
            'tahun_pembuatan'  => 'required|integer',
            'harga_sewa'       => 'required|numeric',
            'status'           => 'required|in:active,inactive',
            'photo'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('service', 'public');
        }

        Service::create($data);

        return redirect()->route('adminpanel.service')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form to edit a service.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('page.backend.service.edit', compact('service'));
    }

    /**
     * Update an existing service.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'merk_mobil'       => 'required|string|max:100',
            'nama_mobil'       => 'required|string|max:100',
            'tahun_pembuatan'  => 'required|integer',
            'harga_sewa'       => 'required|numeric',
            'status'           => 'required|in:active,inactive',
            'photo'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $service = Service::findOrFail($id);
        $data = $request->all();

        // Replace photo if uploaded
        if ($request->hasFile('photo')) {
            if ($service->photo && Storage::disk('public')->exists($service->photo)) {
                Storage::disk('public')->delete($service->photo);
            }

            $data['photo'] = $request->file('photo')->store('service', 'public');
        }

        $service->update($data);

        return redirect()->route('adminpanel.service')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove a service from database.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if ($service->photo && Storage::disk('public')->exists($service->photo)) {
            Storage::disk('public')->delete($service->photo);
        }

        $service->delete();

        return redirect()->route('adminpanel.service')->with('success', 'Data berhasil dihapus!');
    }

    /**
     * Display details of a service.
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('page.backend.service.show', compact('service'));
    }
}
