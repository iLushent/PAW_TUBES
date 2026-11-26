<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/login', [AuthController::class, 'showlogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', function () {
    return 'Halo, ' . auth()->user()->name;
})->middleware('auth')->name('dashboard');
Route::get('/orders', function () {
    return 'Halaman order (placeholder)';
})->middleware('auth')->name('orders.index');