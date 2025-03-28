<?php

use App\Http\Controllers\admin\AbsenController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\eskulController;
use App\Http\Controllers\admin\guruController;
use App\Http\Controllers\admin\jurusanController;
use App\Http\Controllers\admin\siswaController;
use App\Http\Controllers\admin\pendaftaranController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\guru\AbsenController as GuruAbsenController;
use App\Http\Controllers\guru\ConfirmController;
use App\Http\Controllers\guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\guru\eskulController as GuruEskulController;
use App\Http\Controllers\guru\guruController as GuruGuruController;
use App\Http\Controllers\guru\AbsensiController as GuruAbsensiController;
use App\Models\Absensi;

Route::get('/', [UserController::class,'index'])->name('homepage');

// Route untuk menampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Route untuk proses login
Route::post('/login', [AuthController::class, 'login']);

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk menampilkan form register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');


//untuk siswa
Route::prefix('user')->middleware('auth:siswa')->group(function () {
    Route::get('/homepage', [UserController::class,'index'])->name('user.homepage');
    // Pendaftaran
    Route::get('/pendaftaran', [UserController::class, 'showForm'])->name('user.pendaftaran.form');
    Route::post('/pendaftaran/insertData', [UserController::class, 'insertData'])->name('user.pendaftaran.insert');
    // List Eskul
    Route::get('/listEskul', [UserController::class, 'showList'])->name('user.eskul.list');
    // Detail Eskul
    Route::get('/detailEskul/{id}', [UserController::class, 'showDetail'])->name('user.eskul.detail');
    Route::get('/eskul/{id}', [EskulController::class, 'show'])->name('user.eskul.show');
});

Route::prefix('guru')->middleware('auth:guru')->group(function () {
  route::get('homepageGuru',[GuruDashboardController::class,'index'])->name('guru.homepage');

  route::get('guruTable', [GuruGuruController::class, 'index'])->name('guru.guruTable');
  route::get('guruAdd',[GuruGuruController::class,'create'])->name('guru.guruAdd');
  route::post('guruStore',[GuruGuruController::class,'store'])->name('guru.guruStore');
  route::get('guruEdit/{id}',[GuruGuruController::class,'edit'])->name('guru.guruEdit');
  route::put('guruUpdate/{id}',[GuruGuruController::class,'update'])->name('guru.guruUpdate');
  route::delete('guruDelete/{id}',[GuruGuruController::class,'destroy'])->name('guru.guruDelete');

  route::get('eskulTable',[GuruEskulController::class,'index'])->name('guru.eskulTable');
  route::get('eskulAdd',[GuruEskulController::class,'create'])->name('guru.eskulAdd');
  route::post('eskulStore',[GuruEskulController::class,'store'])->name('guru.eskulStore');
  route::get('eskulEdit/{id}',[GuruEskulController::class,'edit'])->name('guru.eskulEdit');
  route::put('eskulUpdate/{id}',[GuruEskulController::class,'update'])->name('guru.eskulUpdate');
  route::delete('eskulDelete/{id}',[GuruEskulController::class,'destroy'])->name('guru.eskulDelete');

 route::get('confirmTable',[ConfirmController::class,'index'])->name('guru.confirmTable');
 Route::patch('/confirm/{id}/eskul/{eskulId}', [ConfirmController::class, 'updateStatus'])->name('guru.updateStatus');

 route::get('absensiTable',[GuruAbsensiController::class,'index'])->name('guru.absensiTable');
 route::get('absensiAdd',[GuruAbsensiController::class,'create'])->name('guru.absensiAdd');
 route::post('absensiStore',[GuruAbsensiController::class,'store'])->name('guru.absensiStore');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Jurusan
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('admin.jurusan.index');
    Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('admin.jurusan.create');
    Route::post('/jurusan/store', [JurusanController::class, 'store'])->name('admin.jurusan.store');
    Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy'])->name('admin.jurusan.destroy');
    Route::get('/jurusan/{id}/edit', [JurusanController::class, 'edit'])->name('admin.jurusan.edit');
    Route::put('/jurusan/{id}/update', [JurusanController::class, 'update'])->name('admin.jurusan.update');

    // Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('admin.siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('admin.siswa.create');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('admin.siswa.store');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('admin.siswa.edit');
    Route::put('/siswa/{id}/update', [SiswaController::class, 'update'])->name('admin.siswa.update');

    // Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('admin.guru.index');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('admin.guru.create');
    Route::post('/guru/store', [GuruController::class, 'store'])->name('admin.guru.store');
    Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('admin.guru.destroy');
    Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('admin.guru.edit');
    Route::put('/guru/{id}/update', [GuruController::class, 'update'])->name('admin.guru.update');

    // Eskul
    Route::get('/eskul', [EskulController::class, 'index'])->name('admin.eskul.index');
    Route::get('/eskul/create', [EskulController::class, 'create'])->name('admin.eskul.create');
    Route::post('/eskul/store', [EskulController::class, 'store'])->name('admin.eskul.store');
    Route::delete('/eskul/{id}', [EskulController::class, 'destroy'])->name('admin.eskul.destroy');
    Route::get('/eskul/{id}/edit', [EskulController::class, 'edit'])->name('admin.eskul.edit');
    Route::put('/eskul/{id}/update', [EskulController::class, 'update'])->name('admin.eskul.update');

    // Pendaftaran
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('admin.pendaftaran.index');
    Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])->name('admin.pendaftaran.create');
    Route::post('/pendaftaran/store', [PendaftaranController::class, 'store'])->name('admin.pendaftaran.store');
    Route::patch('/pendaftaran/{id}/eskul/{eskulId}', [PendaftaranController::class, 'updateStatus'])->name('admin.pendaftaran.updateStatus');

    // Absensi
    Route::get('/absensi', [AbsenController::class, 'index'])->name('admin.absensi.index');
    Route::get('/absensi/create', [AbsenController::class, 'create'])->name('admin.absensi.create');
    Route::post('/absensi/store', [AbsenController::class, 'store'])->name('admin.absensi.store');
});
