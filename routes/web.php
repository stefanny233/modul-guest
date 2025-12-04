<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LembagaDesaController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\JabatanLembagaController;

Route::get('/', function () {
    return view('layouts.auth.login');
});

Route::resource('users', UserController::class);

Route::get('login', [AuthController::class, 'index'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('dashboard', DashboardController::class);

Route::resource('warga', App\Http\Controllers\WargaController::class);
Route::resource('rt', RtController::class);
Route::resource('rw', RwController::class);

Route::resource('perangkat_desa', PerangkatDesaController::class);


Route::resource('lembaga', LembagaDesaController::class);
Route::resource('jabatan', JabatanLembagaController::class);


