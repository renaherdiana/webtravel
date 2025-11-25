<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnersBackendController extends Controller
{
    // Menampilkan semua partners
    public function index()
    {
        $partners = Partner::orderBy('created_at', 'desc')->get();
        return view('page.backend.partners.index', compact('partners'));
    }

    // Menampilkan form create
    public function create()
    {
        return view('page.backend.partners.create');
    }

    // Simpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        // Upload foto
        $photoPath = $request->file('photo')->store('partners', 'public');

        Partner::create([
            'name' => $request->name,
            'photo' => $photoPath,
            'status' => $request->status,
        ]);

        return redirect()->route('adminpanel.partners')->with('success', 'Partner berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('page.backend.partners.edit', compact('partner'));
    }

    // Update data partner
    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('partners', 'public');
            $partner->photo = $photoPath;
        }

        $partner->name = $request->name;
        $partner->status = $request->status;
        $partner->save();

        return redirect()->route('adminpanel.partners')->with('success', 'Partner berhasil diupdate.');
    }

    // Hapus partner
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return redirect()->route('adminpanel.partners')->with('success', 'Partner berhasil dihapus.');
    }

    // Detail partner (opsional)
    public function show($id)
    {
        $partner = Partner::findOrFail($id);
        return view('page.backend.partners.show', compact('partner'));
    }
}
