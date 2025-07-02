<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PromptController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/prompts/{type}', [HomeController::class, 'filterByType'])->name('prompts.filter');

// Prompt routes
Route::get('/prompt/{id}', [PromptController::class, 'show'])->name('prompt.show');
Route::get('/create', [PromptController::class, 'create'])->name('prompt.create');
Route::post('/prompts', [PromptController::class, 'store'])->name('prompt.store');

// Language routes
Route::get('/language/{language}', [LanguageController::class, 'switch'])->name('language.switch');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Social authentication routes
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');
