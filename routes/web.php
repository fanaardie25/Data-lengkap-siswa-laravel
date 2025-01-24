<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\NamaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TeleponController;
use App\Http\Controllers\NameInTeleponController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register',[AuthController::class,'tampilRegister'])->name('register');
Route::post('/register/submit',[AuthController::class,'submitRegister'])->name('register.post');

Route::get('/login',[AuthController::class,'tampilLogin'])->name('login');
Route::post('/login/submit',[AuthController::class,'submitLogin'])->name('login.post');

Route::middleware('auth')->group(function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('hobi', HobiController::class);
    Route::resource('siswa', SiswaController::class);
    Route::get('/telepon/create/{siswa}', [TeleponController::class, 'create'])->name('telepon.create');
    Route::resource('telepon', TeleponController::class)->except(['create']);
    Route::post('logout',[AuthController::class,'logout'])->name('logout');
});
// Route::get('/tampilnama',[NameInTeleponController::class,'index'])->name('namaTelepon.index');
// Route::get('/tampildetail{id}',[NameInTeleponController::class,'show'])->name('namaTelepon.detail');
// Route::resource('telepon', TeleponController::class);
// Route::resource('siswa', SiswaController::class);
