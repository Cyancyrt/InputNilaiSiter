<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request) {
        // Validasi input
        $credentials = $request->validate([
            'nidn' => ['required'],
            'password' => ['required'],
        ]);

        // Proses autentikasi
        if (FacadesAuth::attempt($credentials)) {
            $request->session()->regenerate(); // Mencegah session fixation (Keamanan)
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'nidn' => 'NIDN atau Password salah.',
        ])->onlyInput('nidn');
    }

    public function logout(Request $request) {
        FacadesAuth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
