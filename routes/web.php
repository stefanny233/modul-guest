<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PendudukController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/guest', [GuestController::class, 'index']);

Route::get('/penduduk', [PendudukController::class, 'index']);
