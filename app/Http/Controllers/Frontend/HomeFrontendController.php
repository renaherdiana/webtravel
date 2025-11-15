<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeFrontendController extends Controller
{
    public function index()
    {
        return view('page.frontend.home.index');
    }
}
