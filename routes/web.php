<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegionController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/regions/{slug}', [RegionController::class, 'show'])
    ->name('regions.show');

use App\Http\Controllers\CharacterController;


Route::get('/', [CharacterController::class, 'index']);
