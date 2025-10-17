<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PerangkatDesaController;
// use App\Http\Controllers\AuthController; // (bisa diaktifkan kalau dibutuhkan)


// ============================================================================
// 🏠 ROUTE DEFAULT / HALAMAN AWAL
// ============================================================================
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (Guest)
Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard');


// ============================================================================
// 👥 ROUTE DATA PENDUDUK
// ============================================================================
Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk.index');
// Tambahkan route penduduk lain di sini jika ada (create, store, edit, dll)


// ============================================================================
// 🏛️ ROUTE PERANGKAT DESA (CRUD Lengkap)
// ============================================================================
Route::get('/perangkat-desa', [PerangkatDesaController::class, 'index'])->name('perangkat_desa.index');
Route::get('/perangkat-desa/create', [PerangkatDesaController::class, 'create'])->name('perangkat_desa.create');
Route::post('/perangkat-desa', [PerangkatDesaController::class, 'store'])->name('perangkat_desa.store');
Route::get('/perangkat-desa/{id}/edit', [PerangkatDesaController::class, 'edit'])->name('perangkat_desa.edit');
Route::put('/perangkat-desa/{id}', [PerangkatDesaController::class, 'update'])->name('perangkat_desa.update');
Route::delete('/perangkat-desa/{id}', [PerangkatDesaController::class, 'destroy'])->name('perangkat_desa.destroy');


// Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
// Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
