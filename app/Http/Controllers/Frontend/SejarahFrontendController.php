<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class SejarahFrontendController extends Controller
{
    public function index()
    {
        return view('page.frontend.sejarah.index');
    }
}
