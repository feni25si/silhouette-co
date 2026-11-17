<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nama_admin'    => ['required', 'string', 'max:100'],
            'nomor_hp'      => ['nullable', 'string', 'max:20'],
            'email'         => ['required', 'email', 'max:100', 'unique:admins,email'],
            'password'      => ['required', 'confirmed', Password::min(8)],
            'kode_undangan' => ['required'],
        ], [
            'required'  => ':attribute wajib diisi.',
            'email'     => 'Format email tidak valid.',
            'unique'    => ':attribute sudah terdaftar.',
            'confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'min'       => ':attribute minimal :min karakter.',
        ]);

        if ($data['kode_undangan'] !== config('app.admin_register_code')) {
            return back()
                ->withErrors(['kode_undangan' => 'Kode undangan salah.'])
                ->withInput($request->only('nama_admin', 'nomor_hp', 'email'));
        }

        $admin = Admin::create([
            'nama_admin' => $data['nama_admin'],
            'nomor_hp'   => $data['nomor_hp'] ?? null,
            'email'      => $data['email'],
            'password'   => $data['password'],
        ]);

        Auth::guard('admin')->login($admin);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Akun berhasil dibuat. Selamat datang, ' . $admin->nama_admin . '!');
    }

    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // is_active => true: akun nonaktif tidak bisa masuk
        if (Auth::guard('admin')->attempt(
            [...$credentials, 'is_active' => true],
            $request->boolean('remember')
        )) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Login berhasil. Selamat datang, ' . Auth::guard('admin')->user()->nama_admin . '.');
        }

        return back()
            ->withErrors(['email' => 'Email atau kata sandi salah.'])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Kamu sudah keluar.');
    }
}