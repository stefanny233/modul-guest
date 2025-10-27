<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\AuthController; // (bisa diaktifkan kalau dibutuhkan)

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);

Route::resource('login', LoginController::class)->only(['index', 'store']);

// dashboard diarahkan ke view/admin/dashboard.blade.php
Route::get('/dashboard', function () {
    return view('guest.index');
})->name('guest.dashboard');

// ROUTE DATA warga (Tanpa Middleware Auth)
Route::resource('warga', WargaController::class);
Route::resource('perangkat_desa', PerangkatDesaController::class);

//Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
//Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
// Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
