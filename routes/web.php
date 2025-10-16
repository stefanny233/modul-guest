<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PerangkatDesaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/penduduk', [PendudukController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('dashboard', [DasboardController::class, 'index']);
Route::resource('perangkat_desa', PerangkatDesaController::class);
