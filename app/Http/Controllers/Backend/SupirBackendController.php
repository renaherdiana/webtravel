<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupirBackendController extends Controller
{
    /**
     * Display a listing of supir.
     */
    public function index()
    {
        $supirs = Supir::orderBy('id', 'DESC')->get();
        return view('page.backend.supir.index', compact('supirs'));
    }

    /**
     * Show the form for creating a new supir.
     */
    public function create()
    {
        return view('page.backend.supir.create');
    }

    /**
     * Store a newly created supir in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
            'phone'  => 'required|string|max:20',
            'photo'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
            'price'  => 'required|numeric|min:0',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('supir', 'public');
        }

        Supir::create($data);

        return redirect()->route('adminpanel.supir')->with('success', 'Data supir berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified supir.
     */
    public function edit($id)
    {
        $supir = Supir::findOrFail($id);
        return view('page.backend.supir.edit', compact('supir'));
    }

    /**
     * Update the specified supir in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
            'phone'  => 'required|string|max:20',
            'photo'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
            'price'  => 'required|numeric|min:0',
        ]);

        $supir = Supir::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($supir->photo && Storage::disk('public')->exists($supir->photo)) {
                Storage::disk('public')->delete($supir->photo);
            }
            $data['photo'] = $request->file('photo')->store('supir', 'public');
        }

        $supir->update($data);

        return redirect()->route('adminpanel.supir')->with('success', 'Data supir berhasil diperbarui!');
    }

    /**
     * Remove the specified supir from storage.
     */
    public function destroy($id)
    {
        $supir = Supir::findOrFail($id);

        if ($supir->photo && Storage::disk('public')->exists($supir->photo)) {
            Storage::disk('public')->delete($supir->photo);
        }

        $supir->delete();

        return redirect()->route('adminpanel.supir')->with('success', 'Data supir berhasil dihapus!');
    }

    /**
     * Display the specified supir.
     */
    public function show($id)
    {
        $supir = Supir::findOrFail($id);
        return view('page.backend.supir.show', compact('supir'));
    }
}
