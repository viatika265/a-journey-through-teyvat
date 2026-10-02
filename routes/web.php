<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegionController;

// Rute Home
Route::get('/', [HomeController::class, 'index']);

// Rute Region (Menggunakan format /regions/ agar konsisten dengan link di JavaScript)
Route::get('/regions/{slug}', [RegionController::class, 'show'])->name('regions.show');