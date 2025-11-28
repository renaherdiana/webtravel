<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;

class FooterFrontendController extends Controller
{
    /**
     * Mengambil data social media aktif untuk ditampilkan di footer
     *
     * @return \Illuminate\View\View
     */
    public function getSocials()
    {
        // Ambil semua social media yang statusnya active
        $socials = SocialMedia::where('status', 'active')->orderBy('name')->get();

        // Kembalikan view footer atau view partial dengan data social media
        return view('layouts.frontend.footer', compact('socials'));
    }
}
