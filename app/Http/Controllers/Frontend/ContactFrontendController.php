<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan;

class ContactFrontendController extends Controller
{
    public function index()
    {
        return view('page.frontend.contact.index');
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'project' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan ke database
        Pesan::create($request->all());

        // Redirect dengan notifikasi sukses
        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
