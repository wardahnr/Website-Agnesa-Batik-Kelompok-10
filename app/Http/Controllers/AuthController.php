<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Menampilkan halaman Login
    public function login()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            // Custom pesan error kalau field kosong
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek role untuk redirect
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.index');
        }

        return back()->withErrors([
            'loginError' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('auth.register');
    }

    // Proses Register
    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[0-9]/',
                'regex:/[.@$!%*#?&]/',
                'confirmed'
            ],
        ], [
            'password.min' => 'Password minimal harus 8 karakter.',
            'password.regex' => 'Password harus mengandung angka dan karakter khusus (contoh: @$!%*#).',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'email.unique' => 'Email ini sudah terdaftar.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan masuk.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            return redirect()->route('user.index');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal login menggunakan Google.');
        }
    }
}
