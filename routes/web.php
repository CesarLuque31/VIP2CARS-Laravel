<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para vehículos (español)
Route::resource('vehiculos', VehiculoController::class);