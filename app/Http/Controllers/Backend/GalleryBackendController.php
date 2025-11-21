<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryBackendController extends Controller
{
    // Tampilkan data
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'desc')->get();
        return view('page.backend.gallery.index', compact('galleries'));
    }

    // Ke halaman Create
    public function create()
    {
        return view('page.backend.gallery.create');
    }

    // Store data
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        $path = $request->file('photo')->store('gallery', 'public');

        Gallery::create([
            'title'       => $request->title,
            'description' => $request->description,
            'photo'       => $path,
            'status'      => $request->status,
        ]);

        return redirect()->route('adminpanel.gallery')->with('success', 'Gallery berhasil ditambahkan!');
    }

    // Halaman Edit
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('page.backend.gallery.edit', compact('gallery'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        $path = $gallery->photo;

        if ($request->hasFile('photo')) {
            if ($gallery->photo && Storage::disk('public')->exists($gallery->photo)) {
                Storage::disk('public')->delete($gallery->photo);
            }
            $path = $request->file('photo')->store('gallery', 'public');
        }

        $gallery->update([
            'title'       => $request->title,
            'description' => $request->description,
            'photo'       => $path,
            'status'      => $request->status,
        ]);

        return redirect()->route('adminpanel.gallery')->with('success', 'Gallery berhasil diperbarui!');
    }

    // Detail
    public function detail($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('page.backend.gallery.show', compact('gallery'));
    }

    // Hapus
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->photo && Storage::disk('public')->exists($gallery->photo)) {
            Storage::disk('public')->delete($gallery->photo);
        }

        $gallery->delete();

        return back()->with('success', 'Gallery berhasil dihapus!');
    }
}
