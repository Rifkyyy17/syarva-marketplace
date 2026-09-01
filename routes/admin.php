<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
$adminDomain = config('app.admin_domain');

$adminRoute = Route::middleware(['auth', 'admin'])->name('admin.');

if (! empty($adminDomain)) {
    $adminRoute->domain($adminDomain);
} else {
    $adminRoute->prefix('admin');
}

$adminRoute->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');
    Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
    Route::post('/listings/parse-brochure', [ListingController::class, 'parseBrochure'])->name('listings.parse-brochure');
    Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');
    Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');
    Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->name('listings.edit');
    Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('listings.update');
    Route::post('/listings/{listing}/approve', [ListingController::class, 'approve'])->name('listings.approve');
    Route::post('/listings/{listing}/reject', [ListingController::class, 'reject'])->name('listings.reject');
    Route::post('/listings/{listing}/status', [ListingController::class, 'changeStatus'])->name('listings.status');
    Route::post('/listings/{listing}/feature', [ListingController::class, 'toggleFeatured'])->name('listings.feature');
    Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('password.confirm')->name('listings.destroy');
    Route::delete('/listings/{listing}/images/{image}', [ListingController::class, 'destroyImage'])->name('listings.images.destroy');
    Route::post('/listings/{listing}/images/{image}/primary', [ListingController::class, 'setPrimaryImage'])->name('listings.images.primary');
    Route::post('/listings/{listing}/images', [ListingController::class, 'uploadImages'])->name('listings.images.upload');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->middleware('password.confirm')->name('users.toggle-status');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('password.confirm')->name('users.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('/plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('/plans/{plan}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('/plans/{plan}', [PlanController::class, 'update'])->name('plans.update');
    Route::post('/plans/{plan}/toggle-status', [PlanController::class, 'toggleStatus'])->name('plans.toggle-status');
    Route::delete('/plans/{plan}', [PlanController::class, 'destroy'])->name('plans.destroy');

    Route::get('/locations/provinces', [LocationController::class, 'provinces'])->name('locations.provinces');
    Route::post('/locations/provinces', [LocationController::class, 'storeProvince'])->name('locations.provinces.store');
    Route::put('/locations/provinces/{province}', [LocationController::class, 'updateProvince'])->name('locations.provinces.update');
    Route::delete('/locations/provinces/{province}', [LocationController::class, 'destroyProvince'])->name('locations.provinces.destroy');

    Route::get('/locations/cities', [LocationController::class, 'cities'])->name('locations.cities');
    Route::post('/locations/cities', [LocationController::class, 'storeCity'])->name('locations.cities.store');
    Route::put('/locations/cities/{city}', [LocationController::class, 'updateCity'])->name('locations.cities.update');
    Route::delete('/locations/cities/{city}', [LocationController::class, 'destroyCity'])->name('locations.cities.destroy');

    Route::get('/locations/districts', [LocationController::class, 'districts'])->name('locations.districts');
    Route::post('/locations/districts', [LocationController::class, 'storeDistrict'])->name('locations.districts.store');
    Route::put('/locations/districts/{district}', [LocationController::class, 'updateDistrict'])->name('locations.districts.update');
    Route::delete('/locations/districts/{district}', [LocationController::class, 'destroyDistrict'])->name('locations.districts.destroy');

    Route::get('/locations/cities-by-province/{province}', [LocationController::class, 'citiesByProvince'])->name('locations.cities-by-province');
    Route::get('/locations/districts-by-city/{city}', [LocationController::class, 'districtsByCity'])->name('locations.districts-by-city');

    Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
    Route::post('/inquiries/{inquiry}/status', [InquiryController::class, 'updateStatus'])->name('inquiries.status');

    Route::get('/reports/listings', [ReportController::class, 'listings'])->name('reports.listings');
    Route::get('/reports/users', [ReportController::class, 'users'])->name('reports.users');
    Route::get('/reports/inquiries', [ReportController::class, 'inquiries'])->name('reports.inquiries');

    Route::get('/settings/{section?}', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings/{section}', [SettingController::class, 'update'])->name('settings.update');
});