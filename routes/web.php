<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\PendudukController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/perangkat', [PerangkatController::class, 'index']);
Route::get('/penduduk', [PendudukController::class, 'index']);
