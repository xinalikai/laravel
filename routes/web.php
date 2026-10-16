<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalistController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

Route::middleware(['auth', 'journalist'])->group(function () {
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});

Route::middleware(['auth', 'journalist'])->group(function () {
    Route::get('/journalist', [JournalistController::class, 'create'])->name('journalist');
    Route::post('/journalist', [JournalistController::class, 'store'])->name('journalist.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::get('/articles/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/articles/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::patch('/articles/{id}/block', [AdminController::class, 'block'])->name('admin.block');
    Route::delete('/articles/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::patch('/users/{id}/role', [AdminController::class, 'changeRole'])->name('admin.role');
});