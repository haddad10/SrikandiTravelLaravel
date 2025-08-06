<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPackageController;
use App\Http\Controllers\AdminScheduleController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminExportController;

// Frontend Routes
Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/packages', [SiteController::class, 'packages'])->name('packages');
Route::get('/packages/{package}', [SiteController::class, 'packageDetail'])->name('packages.detail');
Route::get('/schedules', [SiteController::class, 'schedules'])->name('schedules');
Route::get('/gallery', [SiteController::class, 'gallery'])->name('gallery');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/terms', [SiteController::class, 'terms'])->name('terms');
Route::get('/privacy', [SiteController::class, 'privacy'])->name('privacy');
Route::post('/switch-mode', [SiteController::class, 'switchMode'])->name('switch.mode');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (login)
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    
    // Protected routes (require admin authentication)
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        
        // Packages CRUD
        Route::resource('packages', AdminPackageController::class);
        
        // Schedules CRUD
        Route::resource('schedules', AdminScheduleController::class);
        
        // Galleries CRUD
        Route::resource('galleries', AdminGalleryController::class);
        
        // Customers CRUD
        Route::get('/customers', [AdminCustomerController::class, 'index'])->name('customers.index');
        Route::get('/customers/package/{package}', [AdminCustomerController::class, 'packageCustomers'])->name('customers.package');
        Route::get('/customers/package/{package}/create', [AdminCustomerController::class, 'create'])->name('customers.create');
        Route::post('/customers/package/{package}', [AdminCustomerController::class, 'store'])->name('customers.store');
        Route::get('/customers/{customer}', [AdminCustomerController::class, 'show'])->name('customers.show');
        Route::get('/customers/{customer}/edit', [AdminCustomerController::class, 'edit'])->name('customers.edit');
        Route::put('/customers/{customer}', [AdminCustomerController::class, 'update'])->name('customers.update');
        Route::delete('/customers/{customer}', [AdminCustomerController::class, 'destroy'])->name('customers.destroy');
        
        // Export routes
        Route::get('/export/customers/package/{package}', [AdminExportController::class, 'exportCustomers'])->name('export.customers.package');
        Route::get('/export/customers/all', [AdminExportController::class, 'exportAllCustomers'])->name('export.customers.all');
    });
});
