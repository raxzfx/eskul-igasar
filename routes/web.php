<?php

use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\jurusanController;
use App\Http\Controllers\admin\siswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
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

});
