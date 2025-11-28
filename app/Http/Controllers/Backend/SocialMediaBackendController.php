<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Storage;

class SocialMediaBackendController extends Controller
{
    /**
     * Menampilkan daftar social media
     */
    public function index()
    {
        $socials = SocialMedia::orderBy('created_at', 'desc')->get();
        return view('page.backend.socialmedia.index', compact('socials'));
    }

    /**
     * Menampilkan form create social media baru
     */
    public function create()
    {
        return view('page.backend.socialmedia.create');
    }

    /**
     * Menyimpan social media baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
            'link'         => 'required|url|max:255',
            'photo'        => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status'       => 'required|in:active,inactive',
        ]);

        // Upload foto ke storage
        $photoPath = $request->file('photo')->store('socialmedia', 'public');

        SocialMedia::create([
            'name'         => $request->name,
            'account_name' => $request->account_name,
            'link'         => $request->link, // pastikan ini sesuai kolom DB
            'photo'        => $photoPath,
            'status'       => $request->status,
        ]);

        return redirect()->route('adminpanel.socialmedia')
                         ->with('success', 'Social media berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit social media
     */
    public function edit($id)
    {
        $social = SocialMedia::findOrFail($id);
        return view('page.backend.socialmedia.edit', compact('social'));
    }

    /**
     * Mengupdate data social media
     */
    public function update(Request $request, $id)
    {
        $social = SocialMedia::findOrFail($id);

        $request->validate([
            'name'         => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
            'link'         => 'required|url|max:255',
            'photo'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'       => 'required|in:active,inactive',
        ]);

        // Upload foto baru jika ada
        if ($request->hasFile('photo')) {
            // Hapus file lama
            if ($social->photo && Storage::exists('public/' . $social->photo)) {
                Storage::delete('public/' . $social->photo);
            }
            $social->photo = $request->file('photo')->store('socialmedia', 'public');
        }

        $social->update([
            'name'         => $request->name,
            'account_name' => $request->account_name,
            'link'         => $request->link,
            'status'       => $request->status,
        ]);

        return redirect()->route('adminpanel.socialmedia')
                         ->with('success', 'Social media berhasil diperbarui.');
    }

    /**
     * Menampilkan detail social media
     */
    public function show($id)
    {
        $social = SocialMedia::findOrFail($id);
        return view('page.backend.socialmedia.show', compact('social'));
    }

    /**
     * Menghapus social media
     */
    public function destroy($id)
    {
        $social = SocialMedia::findOrFail($id);

        // Hapus foto jika ada
        if ($social->photo && Storage::exists('public/' . $social->photo)) {
            Storage::delete('public/' . $social->photo);
        }

        $social->delete();

        return redirect()->route('adminpanel.socialmedia')
                         ->with('success', 'Social media berhasil dihapus.');
    }
}
