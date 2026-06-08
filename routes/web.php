<?php

use App\Livewire\Admin\UserMaintenance;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/login', fn() => view('auth.login'))->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('/users', UserMaintenance::class)->name('users.index');
});
