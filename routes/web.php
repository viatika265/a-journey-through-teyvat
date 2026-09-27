<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegionController;

Route::get('/', [CharacterController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/regions/{slug}', [RegionController::class, 'visited'])->name('regions.visited');