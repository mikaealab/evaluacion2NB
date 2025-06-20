<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PilotoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pilotos', PilotoController::class);
