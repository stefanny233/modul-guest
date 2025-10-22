<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PerangkatDesaController;
// use App\Http\Controllers\AuthController; // (bisa diaktifkan kalau dibutuhkan)


Route::get('/', function () {
    return view('welcome');
});

// Dashboard (Guest)
Route::get('dashboard', [DasboardController::class, 'index'])->name('dashboard');


// ROUTE DATA PENDUDUK
Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk.index');
Route::post('/penduduk', [PendudukController::class, 'store'])->name('penduduk.store');
Route::get('/penduduk/{id}/edit', [PendudukController::class, 'edit'])->name('penduduk.edit');
Route::put('/penduduk/{id}', [PendudukController::class, 'update'])->name('penduduk.update');
Route::delete('/penduduk/{id}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');


// Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
// Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
