<?php

use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::post('/', [PostController::class, 'store']);
