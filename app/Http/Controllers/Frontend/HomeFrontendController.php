<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\About;

class HomeFrontendController extends Controller
{
    public function index()
    {
        // Ambil 2 hero active terbaru
        $heroes = Hero::where('status', 'active')
                        ->orderBy('created_at', 'desc')
                        ->take(2)
                        ->get();

        // Ambil About active pertama
        $about = About::where('status', 'active')
                        ->orderBy('created_at', 'asc')
                        ->first();

        return view('page.frontend.home.index', compact('heroes', 'about'));
    }
}
