<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('page.auth.login.index'); // Pastikan file ini ada
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Ambil user berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan.',
            ]);
        }

        // Cek password
        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Password salah.',
            ]);
        }

        $request->session()->regenerate();

        // Redirect berdasarkan role dan status
        if ($user->role === 'admin' && $user->status === 'active') {
            return redirect()->route('adminpanel.travel'); // admin panel
        } elseif ($user->role === 'customer' && $user->status === 'active') {
            return redirect()->route('frontend.home'); // landing page
        } else {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Akun Anda tidak aktif atau tidak memiliki akses.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
