<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganBackendController extends Controller
{
    /**
     * Halaman daftar pelanggan
     */
    public function index()
    {
        // Ambil data pelanggan terbaru
        $pelanggans = Pelanggan::orderBy('id', 'DESC')->get();

        return view('page.backend.pelanggan.index', compact('pelanggans'));
    }

    /**
     * Halaman detail pelanggan
     */
    public function show($id)
    {
        // Ambil data pelanggan berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);

        return view('page.backend.pelanggan.show', compact('pelanggan'));
    }
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('adminpanel.pelanggan')
                        ->with('success', 'Data pelanggan berhasil dihapus!');
    }
    public function cancel($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        
        // Hanya bisa dibatalkan jika status belum selesai
        if(!in_array($pelanggan->status, ['completed', 'cancelled'])){
            $pelanggan->status = 'cancelled';
            $pelanggan->save();
        }

        return redirect()->route('adminpanel.pelanggan')
                        ->with('success', 'Booking berhasil dibatalkan!');
    }

}
