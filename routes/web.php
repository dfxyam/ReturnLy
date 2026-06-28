<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest Routes (Publik - Tidak Perlu Login)
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Lost Items
Route::get('/lost-items', function () {
    return view('welcome');
})->name('lost-items.index');

// Found Items
Route::get('/found-items', function () {
    return view('welcome');
})->name('found-items.index');

// Claim Status
Route::get('/claim-status', function () {
    return view('welcome');
})->name('claim-status');

// Report Lost Item (BARU - untuk Milestone 6)
Route::get('/report-lost', function () {
    return view('welcome');
})->name('report-lost');

// Report Found Item (BARU - untuk Milestone 6)
Route::get('/report-found', function () {
    return view('welcome');
})->name('report-found');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes (Guest Only)
| Hanya bisa diakses jika BELUM login
|--------------------------------------------------------------------------
*/
Route::middleware('admin.guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login']);
});

/*
|--------------------------------------------------------------------------
| Admin Protected Routes
| Hanya bisa diakses jika SUDAH login
|--------------------------------------------------------------------------
*/
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    
    // Placeholder Dashboard untuk Milestone 8
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});