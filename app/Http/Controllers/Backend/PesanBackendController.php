<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan; // pastikan model Pesan sudah dibuat

class PesanBackendController extends Controller
{
    /**
     * Tampilkan daftar semua pesan yang masuk
     */
    public function index()
    {
        // Ambil semua pesan terbaru
        $pesans = Pesan::orderBy('created_at', 'desc')->get();

        // Kirim data ke view
        return view('page.backend.message.index', compact('pesans'));
    }
    public function destroy($id)
    {
        // Cari pesan berdasarkan ID
        $pesan = Pesan::findOrFail($id);

        // Hapus pesan
        $pesan->delete();

        // Redirect ke index dengan notifikasi sukses
        return redirect()->route('adminpanel.pesan')
                        ->with('success', 'Pesan berhasil dihapus.');
    }

    public function show($id)
    {
        $pesan = Pesan::findOrFail($id);

        return view('page.backend.message.show', compact('pesan'));
    }
}
