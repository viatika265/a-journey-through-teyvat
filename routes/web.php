<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\HomeController;

Route::get('/', [CharacterController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/region/{slug}', [RegionController::class, 'show'])->name('region.show');