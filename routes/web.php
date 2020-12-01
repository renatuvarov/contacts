<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'form'])->name('login.form');
    Route::post('login', [LoginController::class, 'login'])->name('login.login');

    Route::get('register', [RegisterController::class, 'form'])->name('register.form');
    Route::post('register', [RegisterController::class, 'register'])->name('register.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [ContactsController::class, 'index'])->name('main');

    Route::post('favorites', [FavoritesController::class, 'addContact'])->name('add');
    Route::get('favorites', [FavoritesController::class, 'index'])->name('favorites');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
