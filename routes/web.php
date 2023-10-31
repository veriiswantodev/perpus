<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori/store', [KategoriController::class, 'store']);
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);
    Route::get('/kategori/{id}', [KategoriController::class, 'destroy']);
});