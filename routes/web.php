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

// Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])
//     ->middleware('r')->name('home');
Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');

Route::get('/posts', \App\Http\Controllers\Post\IndexController::class)->name('post.index');
Route::get('/posts/{post}', \App\Http\Controllers\Post\ShowController::class)->name('post.show');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
    Route::post('/posts/{post}/comment', \App\Http\Controllers\Post\AddCommentController::class)->name('post.comment');
});
Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [\App\Http\Controllers\Auth\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_action', [\App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register_action');
    Route::post('/login_action', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login_action');
    Route::get('/forgot', [\App\Http\Controllers\Auth\AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_action', [\App\Http\Controllers\Auth\AuthController::class, 'forgot'])->name('forgot_action');
});

Route::get('/contact_form', \App\Http\Controllers\Contact\ShowController::class)->name('contact_form');
Route::post('/send_contact_form', \App\Http\Controllers\Contact\SendFormController::class)->name('send_contact_form');
