<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanLembagaController;
use App\Http\Controllers\LembagaDesaController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::get('login', [AuthController::class, 'index'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route::group(['middleware' => ['checkislogin']], function () {
//     Route::resource('dashboard', DashboardController::class);
// });

Route::resource('dashboard', DashboardController::class);

// Route::middleware('checkislogin')->group(function () {

//     Route::resource('users', UserController::class);

//     Route::resource('warga', WargaController::class);
//     Route::resource('rt', RtController::class);
//     Route::resource('rw', RwController::class);

//     Route::resource('perangkat_desa', PerangkatDesaController::class);
//     Route::resource('lembaga', LembagaDesaController::class);
//     Route::resource('jabatan', JabatanLembagaController::class);
// });
Route::resource('users', UserController::class);

    Route::resource('warga', WargaController::class);
    Route::resource('rt', RtController::class);
    Route::resource('rw', RwController::class);

    Route::resource('perangkat_desa', PerangkatDesaController::class);
    Route::resource('lembaga', LembagaDesaController::class);
    Route::resource('jabatan', JabatanLembagaController::class);
