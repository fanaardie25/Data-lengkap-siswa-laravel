<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\NamaController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\SiswaController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\TeleponController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NameInTeleponController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'tampilRegister'])->name('register');
Route::post('/register/submit', [AuthController::class, 'submitRegister'])->name('register.post');

Route::get('/login', [AuthController::class, 'tampilLogin'])->name('login');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.post');

Route::get('/forgot-password', function () {
    return view('user.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::ResetLinkSent
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('user.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PasswordReset
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('hobi', HobiController::class);
    Route::resource('siswa', SiswaController::class);
    Route::get('/telepon/create/{siswa}', [TeleponController::class, 'create'])->name('telepon.create');
    Route::resource('telepon', TeleponController::class)->except(['create']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
