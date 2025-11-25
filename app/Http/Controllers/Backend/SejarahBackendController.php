<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sejarah;
use Illuminate\Support\Facades\Storage;

class SejarahBackendController extends Controller
{
    // INDEX — Menampilkan semua data
    public function index()
    {
        $sejarah = Sejarah::orderBy('created_at', 'desc')->get();
        return view('page.backend.sejarah.index', compact('sejarah'));
    }

    // CREATE — Menampilkan form tambah data
    public function create()
    {
        return view('page.backend.sejarah.create');
    }

    // STORE — Simpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        // Upload photo jika ada
        $photoPath = $request->hasFile('photo')
            ? $request->file('photo')->store('sejarah', 'public')
            : null;

        Sejarah::create([
            'title'       => $request->title,
            'description' => $request->description,
            'photo'       => $photoPath,
            'status'      => $request->status,
        ]);

        return redirect()->route('adminpanel.sejarah')->with('success', 'Data sejarah berhasil ditambahkan.');
    }

    // EDIT — Menampilkan form edit
    public function edit($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        return view('page.backend.sejarah.edit', compact('sejarah'));
    }

    // UPDATE — Update data
    public function update(Request $request, $id)
    {
        $sejarah = Sejarah::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        // Jika ada foto baru
        if ($request->hasFile('photo')) {

            // Hapus foto lama jika ada
            if ($sejarah->photo && Storage::disk('public')->exists($sejarah->photo)) {
                Storage::disk('public')->delete($sejarah->photo);
            }

            $sejarah->photo = $request->file('photo')->store('sejarah', 'public');
        }

        $sejarah->update([
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
        ]);

        return redirect()->route('adminpanel.sejarah')->with('success', 'Data sejarah berhasil diperbarui.');
    }

    // DELETE — Hapus data
    public function destroy($id)
    {
        $sejarah = Sejarah::findOrFail($id);

        // Hapus foto dari storage
        if ($sejarah->photo && Storage::disk('public')->exists($sejarah->photo)) {
            Storage::disk('public')->delete($sejarah->photo);
        }

        $sejarah->delete();

        return redirect()->route('adminpanel.sejarah')->with('success', 'Data sejarah berhasil dihapus.');
    }

    // OPTIONAL — Detail page
    public function show($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        return view('page.backend.sejarah.show', compact('sejarah'));
    }
}
