<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


// Route::get('/', [PostController::class, 'index']);
Route::post('/', [PostController::class, 'store']);
Route::get('/', function () {
    return 'Laravel動作テストOK！';
});
