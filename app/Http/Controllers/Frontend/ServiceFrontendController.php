<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceFrontendController extends Controller
{
    public function index()
    {
        return view('page.frontend.service.index');
    }
}
