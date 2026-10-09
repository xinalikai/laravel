<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Список всех категорий
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

// Статьи конкретной категории
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category');

Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');

// Журналист
Route::get('/journalist', [ArticleController::class, 'create'])->name('journalist');
Route::post('/journalist', [ArticleController::class, 'store'])->name('articles.store');
Route::post('/journalist/category', [CategoryController::class, 'store'])->name('categories.store');

// Админка
Route::get('/admin', [AdminController::class, 'index'])->name('admin');