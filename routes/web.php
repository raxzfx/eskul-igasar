<?php

use App\Http\Controllers\admin\absensiController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\eskulController;
use App\Http\Controllers\admin\guruController;
use App\Http\Controllers\admin\jurusanController;
use App\Http\Controllers\admin\siswaController;
use App\Http\Controllers\admin\pendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

route::prefix('admin')->group(function(){
//dashboard
route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard');
//jurusan
route::get('/jurusan',[jurusanController::class,'index'])->name('jurusanTable');
route::get('/jurusan/create',[jurusanController::class,'create'])->name('jurusanAdd');
route::post('/jurusan/store',[jurusanController::class,'store'])->name('jurusanStore');
route::delete('jurusan/{id}',[jurusanController::class,'destroy'])->name('jurusanDelete');
route::get('jurusan/{id}/edit',[jurusanController::class,'edit'])->name('jurusanEdit');
route::put('jurusan/{id}/update',[jurusanController::class,'update'])->name('jurusanUpdate');
//siswa
route::get('/siswa',[siswaController::class,'index'])->name('siswaTable');
route::get('/siswa/create',[siswaController::class,'create'])->name('siswaAdd');
route::post('/siswa/store',[siswaController::class,'store'])->name('siswaStore');
route::delete('/siswa/{id}',[siswaController::class,'destroy'])->name('siswaDestroy');
route::get('/siswa/{id}/edit',[siswaController::class,'edit'])->name('siswaEdit');
route::put('/siswa/{id}/update',[siswaController::class,'update'])->name('siswaUpdate');
//guru
route::get('/guru',[guruController::class,'index'])->name('guruTable');
route::get('/guru/create',[guruController::class,'create'])->name('guruAdd');
route::post('/guru/store',[guruController::class,'store'])->name('guruStore');
Route::delete('/guru/{id}',[guruController::class,'destroy'])->name('guruDestroy');
route::get('/guru/{id}/edit',[guruController::class,'edit'])->name('guruEdit');
route::put('/guru/{id}/update',[guruController::class,'update'])->name('guruUpdate');
//eskul
route::get('/eskul',[eskulController::class,'index'])->name('eskulTable');
route::get('/eskul/create',[eskulController::class,'create'])->name('eskulAdd');
route::post('/eskul/store',[eskulController::class,'store'])->name('eskulStore');
route::delete('/eskul/{id}',[eskulController::class,'destroy'])->name('eskulDestroy');
route::get('/eskul/{id}/edit',[eskulController::class,'edit'])->name('eskulEdit');
route::put('/eskul/{id}/update',[eskulController::class,'update'])->name('eskulUpdate');
//pendaftaran
route::get('/pendaftaran',[pendaftaranController::class,'index'])->name('pendaftaranTable');
route::get('/pendaftaran/create',[pendaftaranController::class,'create'])->name('pendaftaranAdd');
route::post('/pendaftaran/store',[pendaftaranController::class,'store'])->name('pendaftaranStore');
Route::patch('/pendaftaran/{id}/status', [PendaftaranController::class, 'updateStatus'])->name('pendaftaranUpdateStatus');
//absensi
route::get('/absensi',[absensiController::class,'index'])->name('absensiTable');
route::get('/absensi/create',[absensiController::class,'create'])->name('absensiAdd');
route::post('/absensi/store',[absensiController::class,'store'])->name('absensiStore');


});
