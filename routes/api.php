<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('registration', [UserController::class, 'registration']);
Route::post('auth', [UserController::class, 'auth']);
Route::get('order', [OrderController::class, "index"]);
// Route::get('getorder', [OrderController::class, "getorder"]);
Route::post('comments', [CommentController::class, "index"]);
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('room', RoomController::class);
    Route::resource('order', OrderController::class)->except('index');
    Route::resource('comment', CommentController::class)->except('index');
    Route::get('user', [UserController::class, "userget"]);
    Route::get('myorder', [OrderController::class, "getmyorder"]);
});
