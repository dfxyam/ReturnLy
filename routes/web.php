<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\LostItemController;
use App\Http\Controllers\Guest\FoundItemController;
use App\Http\Controllers\Guest\ReportLostItemController;
use App\Http\Controllers\Guest\ReportFoundItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest Routes (Publik - Tidak Perlu Login)
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Lost Items
Route::get('/lost-items', [LostItemController::class, 'index'])->name('lost-items.index');
Route::get('/lost-items/{id}', [LostItemController::class, 'show'])->name('lost-items.show');

// Found Items
Route::get('/found-items', [FoundItemController::class, 'index'])->name('found-items.index');
Route::get('/found-items/{id}', [FoundItemController::class, 'show'])->name('found-items.show');

// Claim Routes
Route::get('/claims/create/{found_item_id}', [App\Http\Controllers\Guest\ClaimController::class, 'create'])->name('claim.create');
Route::post('/claims/store/{found_item_id}', [App\Http\Controllers\Guest\ClaimController::class, 'store'])->name('claim.store');
Route::get('/claim-status', [App\Http\Controllers\Guest\ClaimController::class, 'statusPage'])->name('claim-status');
Route::post('/claim-status/check', [App\Http\Controllers\Guest\ClaimController::class, 'checkStatus'])->name('claim.check');
Route::get('/claims/success/{claim_id}', [App\Http\Controllers\Guest\ClaimController::class, 'success'])->name('claim.success');

Route::get('/report-lost', function () {
    return view('welcome');
})->name('report-lost');

Route::get('/report-found', function () {
    return view('welcome');
})->name('report-found');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes (Guest Only)
|--------------------------------------------------------------------------
*/
Route::middleware('admin.guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login']);
});

/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Claim Management
    Route::get('/claims', [App\Http\Controllers\Admin\AdminClaimController::class, 'index'])->name('claims.index');
    Route::get('/claims/{id}', [App\Http\Controllers\Admin\AdminClaimController::class, 'show'])->name('claims.show');
    Route::post('/claims/{id}/status', [App\Http\Controllers\Admin\AdminClaimController::class, 'updateStatus'])->name('claims.update-status');

    // Data Master
    Route::resource('categories', App\Http\Controllers\Admin\AdminCategoryController::class);
    Route::resource('locations', App\Http\Controllers\Admin\AdminLocationController::class);

    // Lost Items
    Route::resource('lost-items', App\Http\Controllers\Admin\AdminLostItemController::class);
    Route::post('/lost-items/{lostItem}/status', [App\Http\Controllers\Admin\AdminLostItemController::class, 'updateStatus'])->name('lost-items.update-status');

    // Found Items
    Route::resource('found-items', App\Http\Controllers\Admin\AdminFoundItemController::class);
    Route::post('/found-items/{foundItem}/status', [App\Http\Controllers\Admin\AdminFoundItemController::class, 'updateStatus'])->name('found-items.update-status');
});


// Report Routes
Route::get('/report-lost', [ReportLostItemController::class, 'create'])->name('report-lost');
Route::post('/report-lost', [ReportLostItemController::class, 'store']);

Route::get('/report-found', [ReportFoundItemController::class, 'create'])->name('report-found');
Route::post('/report-found', [ReportFoundItemController::class, 'store']);

// Static Pages
Route::view('/about', 'guest.static.about')->name('about');
Route::view('/contact', 'guest.static.contact')->name('contact');
Route::view('/privacy', 'guest.static.privacy')->name('privacy');