<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieController3;

// Trang chủ
Route::get('/', [MovieController::class, 'index']);

// Trang quản lý
Route::get('/quanly', [MovieController3::class, 'quanly'])->name('quanly'); 
Route::get('/create', [MovieController3::class, 'create'])->name('create'); 
Route::post('/store', [MovieController3::class, 'store'])->name('store');
Route::get('/delete/{id}', [MovieController3::class, 'destroy'])->name('delete');