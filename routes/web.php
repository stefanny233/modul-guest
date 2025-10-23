<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerangkatDesaController;

// use App\Http\Controllers\AuthController; // (bisa diaktifkan kalau dibutuhkan)

Route::get('/', function () {
    return view('welcome');
});

// Dashboard (Guest)
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// ROUTE DATA PENDUDUK
Route::resource('penduduk', PendudukController::class);


// ROUTE DATA PERANGKAT DESA
Route::resource('perangkat_desa', PerangkatDesaController::class);

// Halaman Login & Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
// Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
