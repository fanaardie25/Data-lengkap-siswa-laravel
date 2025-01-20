<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\NamaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TeleponController;
use App\Http\Controllers\NameInTeleponController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('hobi', HobiController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('telepon', TeleponController::class);
// Route::get('/tampilnama',[NameInTeleponController::class,'index'])->name('namaTelepon.index');
// Route::get('/tampildetail{id}',[NameInTeleponController::class,'show'])->name('namaTelepon.detail');
// Route::resource('telepon', TeleponController::class);
// Route::resource('siswa', SiswaController::class);
