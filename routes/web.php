<?php

use App\Http\Controllers\RoomsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/authPage', [UserController::class, 'authPage'])->name('authPage');
Route::post('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::resource('room', RoomsController::class);
