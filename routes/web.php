<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PromptController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/prompts/{type}', [HomeController::class, 'filterByType'])->name('prompts.filter');
Route::get('/prompt/{id}', [PromptController::class, 'show'])->name('prompt.show');
Route::get('/create', [PromptController::class, 'create'])->name('prompt.create');
Route::post('/prompts', [PromptController::class, 'store'])->name('prompt.store');
