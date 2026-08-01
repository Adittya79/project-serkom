<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('serkom.index'); // Sesuaikan nama view login kamu
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role'     => 'required',
        ]);

        // 1. JIKA USER MEMILIH TAB SISWA (Ditolak karena fitur/tabel belum ada)
        if ($request->role === 'siswa') {
            return back()->withErrors([
                'login' => 'Akun Tidak Ditemukan!'
            ])->withInput();
        }

        // 2. JIKA USER MEMILIH TAB ADMIN
        if ($request->role === 'admin') {
            // Cari data di tabel 'admins' dengan kolom 'ussername' (sesuai gambar DB Anda)
            $admin = DB::table('admins')->where('ussername', $request->username)->first();

            // Cek ketersediaan admin dan kecocokan password
            if ($admin && Hash::check($request->password, $admin->password)) {
                // Simpan session login admin
                session([
                    'admin_logged_in' => true,
                    'admin_id'        => $admin->id,
                    'admin_username'  => $admin->ussername,
                ]);

                // Redirect ke halaman dashboard admin
                return redirect()->route('dashboard')->with('success', 'Berhasil login sebagai Admin!');
            }
        }

        // 3. JIKA USERNAME/PASSWORD ADMIN SALAH
        return back()->withErrors([
            'login' => 'Username atau password Administrator salah!'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil keluar dari sistem.');
    }
}
