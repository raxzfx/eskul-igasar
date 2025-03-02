<?php

use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\jurusanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

});
