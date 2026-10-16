<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalistController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Статьи отдельной категории
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category');

// Отдельная статья
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');


Route::middleware('guest')->group(function () {
    // Регистрация
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    // Вход
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

// Выход — только для авторизованных
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::middleware('auth')->group(function () {

    // Журналист — создание статей
    Route::get('/journalist', [JournalistController::class, 'create'])->name('journalist');
    Route::post('/journalist', [JournalistController::class, 'store'])->name('journalist.store');

    // Категории: список, форма создания, сохранение
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});