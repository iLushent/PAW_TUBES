<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Nampili halaman login nih disini ibarat logikanya disini
    public function showlogin()
    {
        return view('auth.login');
    }

    // Ini buat proses loginnya
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],],

            ['email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $tujuan = Auth::user()->isOwner() ? '/dashboard' : '/orders';
            return redirect()->intended($tujuan);   
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah'])
            ->onlyInput('email');
    }

    // nah ini proses logout nihhh
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
