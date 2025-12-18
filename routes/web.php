<?php

use App\Http\Controllers\AnggotaLembagaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanLembagaController;
use App\Http\Controllers\LembagaDesaController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ROUTE GUEST (BELUM LOGIN)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::get('/login', [AuthController::class, 'index'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

/*
|--------------------------------------------------------------------------
| ROUTE AUTH (SUDAH LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('checkislogin')->group(function () {

    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // dashboard
    Route::resource('dashboard', DashboardController::class)
        ->only(['index']);

    // halaman umum (semua user login)
    Route::resource('warga', WargaController::class);
    Route::resource('rt', RtController::class);
    Route::resource('rw', RwController::class);

    Route::resource('perangkat_desa', PerangkatDesaController::class);
    Route::resource('lembaga', LembagaDesaController::class);
    Route::resource('jabatan', JabatanLembagaController::class);
    Route::resource('anggota-lembaga', AnggotaLembagaController::class);

    /*
    |--------------------------------------------------------------------------
    | ROUTE KHUSUS ADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware('checkrole:admin')->group(function () {

        Route::resource('users', UserController::class);
    });
});

/*
|--------------------------------------------------------------------------
| ROUTE GUEST LAINNYA
|--------------------------------------------------------------------------
*/
Route::get('/tentang', function () {
    return view('pages.guest.tentang');
})->name('tentang');
