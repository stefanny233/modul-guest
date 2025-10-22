<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PerangkatDesaController;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\AuthController; // (bisa diaktifkan kalau dibutuhkan)

Route::get('/', function () {
    return view('welcome');
});

// Dashboard (Guest)
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ROUTE DATA PENDUDUK
Route::resource('penduduk', PendudukController::class);


// ROUTE DATA PERANGKAT DESA
Route::resource('perangkat_desa', PerangkatDesaController::class);

// Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
// Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
