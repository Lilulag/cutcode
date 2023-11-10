<?php

use Illuminate\Support\Facades\Route;

Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login_action'])->name('login_action');

Route::middleware('auth:admin')->group(function () {
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout_action'])->name('logout_action');
});
