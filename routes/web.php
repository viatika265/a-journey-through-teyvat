<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;


Route::get('/', [CharacterController::class, 'index']);