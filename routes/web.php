<?php

use App\Livewire\Admin\RatesAdvisories;
use App\Livewire\Admin\UserMaintenance;
use App\Livewire\RateAndAdvisory\AdvisoryList;
use App\Livewire\RateAndAdvisory\AdvisoryViewer;
use App\Models\AdvisoryDocument;
use Illuminate\Support\Facades\Storage;
use App\Livewire\RateAndAdvisory\RateAndAdvisory;
use App\Livewire\RateAndAdvisory\PowerInterruptionSchedule;
use App\Livewire\Customer\BillDeposit;
use App\Livewire\Customer\Calculator;
use App\Livewire\Customer\CustomerPage;
use App\Livewire\Customer\HowToReadBill;
use App\Livewire\Customer\DistributedEnergyResources;
use App\Livewire\Customer\NetMeteringPrimer;
use App\Livewire\Customer\SeniorCitizenDiscount;
use App\Livewire\Customer\ApplicationProcedure;
use App\Livewire\Customer\ApplicationRequirements;
use App\Livewire\Customer\OtherServiceRelatedApplications;
use App\Livewire\Customer\ServiceApplication;
use App\Livewire\ContactUs;
use App\Livewire\PrivacyPolicy;
use App\Livewire\AboutUs\AboutUs;
use App\Livewire\AboutUs\Profile;
use App\Livewire\AboutUs\BoardOfDirectors;
use App\Livewire\AboutUs\ExecutiveOfficers;
use App\Livewire\AboutUs\ManagementTeam;
use App\Livewire\AboutUs\OrganizationalStructure;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/customer', CustomerPage::class)->name('customer');
Route::get('/how-to-read-your-bill', HowToReadBill::class)->name('customer.how-to-read-your-bill');
Route::get('/bill-deposit', BillDeposit::class)->name('customer.bill-deposit');
Route::get('/senior-citizen-discount', SeniorCitizenDiscount::class)->name('customer.senior-citizen-discount');
Route::get('/service-application', ServiceApplication::class)->name('customer.service-application');
Route::get('/application-procedure', ApplicationProcedure::class)->name('customer.service-application.application-procedure');
Route::get('/application-requirements', ApplicationRequirements::class)->name('customer.service-application.application-requirements');
Route::get('/other-service-related-applications', OtherServiceRelatedApplications::class)->name('customer.service-application.other-service-related-applications');
Route::get('/net-metering-primer', NetMeteringPrimer::class)->name('customer.net-metering-primer');
Route::get('/distributed-energy-resources', DistributedEnergyResources::class)->name('customer.distributed-energy-resources');
Route::get('/calculator', Calculator::class)->name('customer.calculator');
Route::get('/rates-and-advisories', RateAndAdvisory::class)->name('rate-and-advisories');
Route::get('/power-interruption-schedule', PowerInterruptionSchedule::class)->name('rate-and-advisories.power-interruption-schedule');
Route::get('/rates-and-advisories/advisories', AdvisoryList::class)->name('rate-and-advisories.advisories');
Route::get('/rates-and-advisories/rate-schedule', AdvisoryList::class)->name('rate-and-advisories.rate-schedule');
Route::get('/rates-and-advisories/other-documents', AdvisoryList::class)->name('rate-and-advisories.other-documents');
Route::get('/advisory-file/{slug}', function (string $slug) {
    $doc = AdvisoryDocument::where('url', $slug)->where('status', 'published')->firstOrFail();
    abort_unless($doc->file_path && Storage::exists($doc->file_path), 404);
    return response()->file(Storage::path($doc->file_path), [
        'Content-Type'        => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $doc->file_name . '"',
    ]);
})->name('rate-and-advisories.pdf');
Route::get('/contact-us', ContactUs::class)->name('contact-us');
Route::get('/privacy-policy', PrivacyPolicy::class)->name('privacy-policy');
Route::get('/about-us', AboutUs::class)->name('about-us');
Route::get('/profile', Profile::class)->name('about-us.profile');
Route::get('/board-of-directors', BoardOfDirectors::class)->name('about-us.profile.board-of-directors');
Route::get('/executive-officers', ExecutiveOfficers::class)->name('about-us.profile.executive-officers');
Route::get('/management-team', ManagementTeam::class)->name('about-us.profile.management-team');
Route::get('/organizational-structure', OrganizationalStructure::class)->name('about-us.profile.organizational-structure');
Route::redirect('/how-toread-your-bill', '/how-to-read-your-bill', 301);

Route::middleware(['guest.custom'])->group(function () {

  Route::get('/login', fn() => view('auth.login'))->name('login');

});

Route::middleware(['auth.custom'])->group(function () {

  Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('/rates-advisories', RatesAdvisories::class)->name('rates-advisories');
    Route::get('/users', UserMaintenance::class)->name('users.index');

    Route::get('/documents/{document}', function (AdvisoryDocument $document) {
        abort_unless($document->file_path && Storage::exists($document->file_path), 404);
        return response()->file(Storage::path($document->file_path), [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $document->file_name . '"',
        ]);
    })->name('documents.serve');
  });

});

// Advisory document viewer — registered LAST so it never shadows any named route above
Route::get('/{slug}', AdvisoryViewer::class)
    ->name('rate-and-advisories.view')
    ->where('slug', '[a-zA-Z0-9\-_]+');
