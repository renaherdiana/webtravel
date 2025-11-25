<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialBackendController extends Controller
{
    /**
     * Menampilkan daftar testimonial di halaman index
     */
    public function index()
    {
        // Ambil semua testimonial, urut dari terbaru
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();

        // Kirim ke view
        return view('page.backend.testimonial.index', compact('testimonials'));
    }

    /**
     * Menampilkan form create testimonial baru
     */
    public function create()
    {
        return view('page.backend.testimonial.create');
    }

    /**
     * Menyimpan testimonial baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:active,inactive',
        ]);

        $photoPath = $request->file('photo')->store('testimonials', 'public');

        Testimonial::create([
            'name' => $request->name,
            'message' => $request->message,
            'photo' => $photoPath,
            'rating' => $request->rating,
            'status' => $request->status,
        ]);

        return redirect()->route('adminpanel.testimonial')->with('success', 'Testimonial berhasil ditambahkan.');
    }

    /**
     * Menampilkan halaman edit testimonial
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('page.backend.testimonial.edit', compact('testimonial'));
    }

    /**
     * Mengupdate testimonial
     */
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('testimonials', 'public');
            $testimonial->photo = $photoPath;
        }

        $testimonial->update([
            'name' => $request->name,
            'message' => $request->message,
            'rating' => $request->rating,
            'status' => $request->status,
        ]);

        return redirect()->route('adminpanel.testimonial')->with('success', 'Testimonial berhasil diupdate.');
    }

    /**
     * Menampilkan detail testimonial
     */
    public function detail($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('page.backend.testimonial.show', compact('testimonial'));
    }

    /**
     * Menghapus testimonial
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('adminpanel.testimonial')->with('success', 'Testimonial berhasil dihapus.');
    }
}
