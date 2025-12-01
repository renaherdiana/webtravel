<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Halaman register
    public function index()
    {
        return view('page.auth.register.index');
    }

    // Proses register
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer', // bisa diganti 'admin' jika perlu
        ]);

        // Login otomatis user yang baru dibuat
        Auth::login($user);

        // Redirect ke halaman user
        return redirect('/home/frontend')->with('success', 'Registrasi berhasil!');
    }
}
