<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/theloai/{id}', [App\Http\Controllers\MovieController::class, 'theloai']);
Route::get('/timkiem', [MovieController::class, 'timkiem']);
use App\Http\Controllers\MovieController3;

// Trang chủ
Route::get('/', [MovieController::class, 'index']);

// Trang quản lý
Route::get('/quanly', [MovieController3::class, 'quanly'])->name('quanly'); 
Route::get('/create', [MovieController3::class, 'create'])->name('create'); 
Route::post('/store', [MovieController3::class, 'store'])->name('store');
Route::get('/delete/{id}', [MovieController3::class, 'destroy'])->name('delete');

Route::get('/', [MovieController::class, 'index']);
use App\Http\Controllers\MovieController1;
Route::get('/chitiet/{id}', [MovieController1::class, 'chitiet'])->name('movie.chitiet');

