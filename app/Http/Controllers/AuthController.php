<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Admin;
use App\Models\Jurusan;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Cek login sebagai siswa
        if (Auth::guard('siswa')->attempt($credentials)) {
            return redirect()->route('user.homepage');
        }

        // Cek login sebagai guru
        if (Auth::guard('guru')->attempt($credentials)) {
            return redirect()->route('guru.homepage');
        }

        // Cek login sebagai admin
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    public function showRegisterForm()
{
    $jurusan = Jurusan::all(); // Ambil semua data jurusan dari database
    return view('user.register', compact('jurusan'));
}

public function register(Request $request)
{
    $request->validate([
        'nama_siswa' => 'required|string|max:255',
        'username' => 'required|string|unique:siswa,username',
        'no_telp' => 'required|string|max:15|unique:siswa,no_telp',
        'nama_jurusan' => 'required',
        'tingkat_kelas' => 'required|in:X,XI,XII',
        'password' => 'required|string|min:6',
    ]);

    Siswa::create([
        'nama_siswa' => $request->nama_siswa,
        'username' => $request->username,
        'no_telp' => $request->no_telp,
        'nama_jurusan' => $request->nama_jurusan,
        'tingkat_kelas' => $request->tingkat_kelas,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
}

    // Proses logout
    public function logout()
    {
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        } elseif (Auth::guard('guru')->check()) {
            Auth::guard('guru')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        return redirect()->route('homepage');
    }
}