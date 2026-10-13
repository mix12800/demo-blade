<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/authPage', [UserController::class, 'authPage'])->name('authPage');
Route::post('/registration', [UserController::class, 'registration'])->name('registration');
