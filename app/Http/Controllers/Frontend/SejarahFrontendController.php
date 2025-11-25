<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;

class SejarahFrontendController extends Controller
{
    public function index()
    {
        // Ambil data sejarah yang statusnya aktif
        $sejarah = Sejarah::where('status', 'active')->first();

        return view('page.frontend.sejarah.index', compact('sejarah'));
    }
}
