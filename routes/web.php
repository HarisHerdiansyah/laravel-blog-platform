<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostDetailController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'show'])->name('home');
Route::get('/posts/{user}/{slug}', [PostDetailController::class, 'show'])->name('post-detail');
Route::get('/drafts', [DraftController::class, 'show'])->name('drafts');
Route::get('/drafts/{mode}', [DraftController::class, 'showForm'])->name('drafts-form');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login-form');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register-form');
