<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceBackendController extends Controller
{
    public function index()
    {
        return view('page.backend.service.index');
    }
}
