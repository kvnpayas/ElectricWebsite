<?php

use App\Livewire\Admin\UserMaintenance;
use App\Livewire\Customer\CustomerPage;
use App\Livewire\Customer\HowToReadBill;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/customer', CustomerPage::class)->name('customer');
Route::get('/how-to-read-your-bill', HowToReadBill::class)->name('customer.bill-guide');
Route::redirect('/how-toread-your-bill', '/how-to-read-your-bill', 301);

Route::middleware(['guest.custom'])->group(function () {

  Route::get('/login', fn() => view('auth.login'))->name('login');

});

Route::middleware(['auth.custom'])->group(function () {

  Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('/users', UserMaintenance::class)->name('users.index');
  });

});
