<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/authPage', [UserController::class, 'authPage'])->name('authPage');
Route::post('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');

// Route::middleware('auth:sanctum')->group(function () {

Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/room', [RoomsController::class, 'store'])->name('room');
    Route::get('/roomdel/{rooms}', [RoomsController::class, 'destroy'])->name('roomdel');
    Route::post('/roomedit/{rooms}', [RoomsController::class, 'update'])->name('roomedit');
    Route::get('/OrderPage', [UserController::class, 'OrderPage'])->name('OrderPage');
    Route::post('/OrderCreate', [OrdersController::class, 'store'])->name('OrderCreate');

    // Route::resource('room', RoomsController::class);
});
