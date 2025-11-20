<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutBackendController extends Controller
{
    // Index
    public function index()
    {
        // Ambil semua data About
        $abouts = About::latest()->get();

        // Kirim ke view
        return view('page.backend.about.index', compact('abouts'));
    }

    // Create
    public function create()
    {
        return view('page.backend.about.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $photoPath = $request->file('photo')->store('about', 'public');

        About::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $photoPath,
            'status' => $request->status,
        ]);

        return redirect()->route('adminpanel.about')->with('success', 'About berhasil ditambahkan!');
    }

    // Edit
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('page.backend.about.edit', compact('about'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('photo')) {
            if ($about->photo && Storage::disk('public')->exists($about->photo)) {
                Storage::disk('public')->delete($about->photo);
            }
            $photoPath = $request->file('photo')->store('about', 'public');
            $about->photo = $photoPath;
        }

        $about->title = $request->title;
        $about->description = $request->description;
        $about->status = $request->status;
        $about->save();

        return redirect()->route('adminpanel.about')->with('success', 'About berhasil diupdate!');
    }

    // Delete
    public function destroy($id)
    {
        $about = About::findOrFail($id);

        if ($about->photo && Storage::disk('public')->exists($about->photo)) {
            Storage::disk('public')->delete($about->photo);
        }

        $about->delete();

        return redirect()->route('adminpanel.about')->with('success', 'About berhasil dihapus!');
    }

    // Detail
    public function detail($id)
    {
        $about = About::findOrFail($id);
        return view('page.backend.about.show', compact('about'));
    }
}
