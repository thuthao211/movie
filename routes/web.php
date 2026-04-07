<?php

use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index']);
use App\Http\Controllers\MovieController1;
Route::get('/movie/chitiet/{id}', [MovieController1::class, 'chitiet'])->name('movie.chitiet');