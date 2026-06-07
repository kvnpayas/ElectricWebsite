<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
});
