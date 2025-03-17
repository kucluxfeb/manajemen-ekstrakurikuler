<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        // if (Auth::guard('admin')->check()) {
        //     return back();
        // }

        // if (Auth::guard('siswa')->check()) {
        //     return back();
        // }

        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        // if (Auth::guard('admin')->check()) {
        //     return back();
        // }

        // if (Auth::guard('siswa')->check()) {
        //     return back();
        // }
        
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('home')->with('success','Login berhasil!');
        }

        if (Auth::guard('siswa')->attempt($credentials)) {
            return redirect()->route('pendaftaran')->with('success','Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // Auth::guard('admin')->logout();

        // Auth::guard('siswa')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->withHeaders([
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ]);
    }
}