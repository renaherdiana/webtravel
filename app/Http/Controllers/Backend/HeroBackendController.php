<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use Illuminate\Support\Facades\Storage;

class HeroBackendController extends Controller
{
    /**
     * Menampilkan list hero
     */
    public function index()
    {
        $heroes = Hero::latest()->get();
        return view('page.backend.hero.index', compact('heroes'));
    }

    /**
     * Halaman create
     */
    public function create()
    {
        return view('page.backend.hero.create');
    }

    /**
     * Store data hero
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        // Upload foto ke storage
        $photoPath = $request->file('photo')->store('hero', 'public');

        Hero::create([
            'title'       => $request->title,
            'description' => $request->description,
            'photo'       => $photoPath,
            'status'      => $request->status,
        ]);

        return redirect()->route('adminpanel.hero')->with('success', 'Hero berhasil ditambahkan!');
    }

    /**
     * Halaman edit
     */
    public function edit($id)
    {
        $hero = Hero::findOrFail($id);
        return view('page.backend.hero.edit', compact('hero'));
    }

    /**
     * Update data hero
     */
    public function update(Request $request, $id)
    {
        $hero = Hero::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        // Jika upload foto baru
        if ($request->hasFile('photo')) {

            // Hapus foto lama jika ada
            if ($hero->photo && Storage::disk('public')->exists($hero->photo)) {
                Storage::disk('public')->delete($hero->photo);
            }

            // Upload foto baru
            $photoPath = $request->file('photo')->store('hero', 'public');
            $hero->photo = $photoPath;
        }

        // Update field lainnya
        $hero->title       = $request->title;
        $hero->description = $request->description;
        $hero->status      = $request->status;
        $hero->save();

        return redirect()->route('adminpanel.hero')->with('success', 'Hero berhasil diupdate!');
    }

    /**
     * Halaman Detail
     */
    public function detail($id)
    {
        $hero = Hero::findOrFail($id);
        return view('page.backend.hero.show', compact('hero'));
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        $hero = Hero::findOrFail($id);

        // Hapus foto
        if ($hero->photo && Storage::disk('public')->exists($hero->photo)) {
            Storage::disk('public')->delete($hero->photo);
        }

        $hero->delete();

        return redirect()->route('adminpanel.hero')->with('success', 'Hero berhasil dihapus!');
    }
}
