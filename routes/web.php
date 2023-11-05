<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])
    ->middleware('r')->name('home');

Route::get('/posts', \App\Http\Controllers\Post\IndexController::class)->name('post.index');
Route::get('/posts/{post}', \App\Http\Controllers\Post\ShowController::class)->name('post.show');
