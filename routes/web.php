<?php

use App\Livewire\Admin\UserMaintenance;
use App\Livewire\Customer\BillDeposit;
use App\Livewire\Customer\Calculator;
use App\Livewire\Customer\CustomerPage;
use App\Livewire\Customer\HowToReadBill;
use App\Livewire\Customer\DistributedEnergyResources;
use App\Livewire\Customer\NetMeteringPrimer;
use App\Livewire\Customer\SeniorCitizenDiscount;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/customer', CustomerPage::class)->name('customer');
Route::get('/how-to-read-your-bill', HowToReadBill::class)->name('customer.how-to-read-your-bill');
Route::get('/bill-deposit', BillDeposit::class)->name('customer.bill-deposit');
Route::get('/senior-citizen-discount', SeniorCitizenDiscount::class)->name('customer.senior-citizen-discount');
Route::get('/net-metering-primer', NetMeteringPrimer::class)->name('customer.net-metering-primer');
Route::get('/distributed-energy-resources', DistributedEnergyResources::class)->name('customer.distributed-energy-resources');
Route::get('/calculator', Calculator::class)->name('customer.calculator');
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
