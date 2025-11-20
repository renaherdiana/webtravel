<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserBackendController extends Controller
{
    public function index()
    {
        return view('page.backend.user.index');
    }
}
