<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\About;
use App\Models\Gallery;
use App\Models\TenagaKerja;
use App\Models\Partner;
use App\Models\Testimonial;

class HomeFrontendController extends Controller
{
    public function index()
    {
        // Ambil 2 hero aktif terbaru
        $heroes = Hero::where('status', 'active')
            ->latest()
            ->take(2)
            ->get();

        // Ambil About aktif pertama
        $about = About::where('status', 'active')
            ->orderBy('created_at', 'asc')
            ->first();

        // Ambil Gallery yang aktif
        $gallery = Gallery::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        // Ambil Tenaga Kerja aktif
        $tenagaKerja = TenagaKerja::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        // Ambil Partners aktif
        $partners = Partner::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        // Ambil Testimonial aktif
        $testimonials = Testimonial::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        // Kirim semua data ke view frontend
        return view('page.frontend.home.index', compact(
            'heroes',
            'about',
            'gallery',
            'tenagaKerja',
            'partners',
            'testimonials'
        ));
    }
}
