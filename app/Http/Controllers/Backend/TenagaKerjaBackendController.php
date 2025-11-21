<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TenagaKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenagaKerjaBackendController extends Controller
{
    public function index()
    {
        $tenagakerjas = TenagaKerja::orderBy('created_at', 'desc')->get();
        return view('page.backend.tenagakerja.index', compact('tenagakerjas'));
    }

    public function create()
    {
        return view('page.backend.tenagakerja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'photo'    => 'image|mimes:jpg,png,jpeg,webp|max:2048',
            'status'   => 'required'
        ]);

        $photoPath = $request->hasFile('photo')
                        ? $request->file('photo')->store('tenagakerja', 'public')
                        : null;

        TenagaKerja::create([
            'name'     => $request->name,
            'position' => $request->position,
            'photo'    => $photoPath,
            'status'   => $request->status
        ]);

        return redirect()->route('adminpanel.tenagakerja')
                         ->with('success', 'Data Tenaga Kerja berhasil ditambahkan!');
    }

    public function detail($id)
    {
        $tenagakerja = TenagaKerja::findOrFail($id);
        return view('page.backend.tenagakerja.show', compact('tenagakerja'));
    }

    public function edit($id)
    {
        $tenagakerja = TenagaKerja::findOrFail($id);
        return view('page.backend.tenagakerja.edit', compact('tenagakerja'));
    }

    public function update(Request $request, $id)
    {
        $tenagakerja = TenagaKerja::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'photo'    => 'image|mimes:jpg,png,jpeg,webp|max:2048',
            'status'   => 'required'
        ]);

        $photoPath = $tenagakerja->photo;

        if ($request->hasFile('photo')) {
            if ($photoPath && Storage::disk('public')->exists($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }

            $photoPath = $request->file('photo')->store('tenagakerja', 'public');
        }

        $tenagakerja->update([
            'name'     => $request->name,
            'position' => $request->position,
            'photo'    => $photoPath,
            'status'   => $request->status
        ]);

        return redirect()->route('adminpanel.tenagakerja')
                         ->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        $tenagakerja = TenagaKerja::findOrFail($id);

        if ($tenagakerja->photo && Storage::disk('public')->exists($tenagakerja->photo)) {
            Storage::disk('public')->delete($tenagakerja->photo);
        }

        $tenagakerja->delete();

        return redirect()->route('adminpanel.tenagakerja')
                         ->with('success', 'Data berhasil dihapus!');
    }
}
