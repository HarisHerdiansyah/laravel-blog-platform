<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostDetailController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'show'])->name('home');
Route::get('/posts/{user}/{slug}', [PostDetailController::class, 'show'])->name('post-detail');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login-form');
    Route::post('/login', [LoginController::class, 'store'])->name('login');
    Route::get('/register', [RegisterController::class, 'create'])->name('register-form');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/drafts', [DraftController::class, 'show'])->name('drafts');
    Route::post('/drafts', [DraftController::class, 'store'])->name('drafts.store');
    Route::get('/drafts/{mode}', [DraftController::class, 'create'])->name('drafts-form');
    Route::delete('/drafts/{postId}', [DraftController::class, 'destroy'])->name('drafts-form.destroy');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});

