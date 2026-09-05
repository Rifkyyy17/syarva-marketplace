<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RobotsController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\User\FavoriteController as UserFavoriteController;
use App\Http\Controllers\User\InquiryController as UserInquiryController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/listing', [ListingController::class, 'index'])->name('listings.index');

Route::get('/properti/{kategori}', [ListingController::class, 'index'])
    ->whereIn('kategori', ['rumah', 'tanah'])
    ->name('listings.property');

Route::get('/mobil/{kategori}', [ListingController::class, 'index'])
    ->whereIn('kategori', ['baru', 'second'])
    ->name('listings.vehicle');

Route::get('/listing/{slug}', [ListingController::class, 'show'])->name('listings.show');

Route::get('/jual-mobil-bekas', fn () => view('pages.jual-mobil-bekas'))->name('pages.sell-car');
Route::get('/konsultasi-properti', fn () => view('pages.properti'))->name('pages.property');

Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/paket-iklan', [\App\Http\Controllers\PricingController::class, 'index'])->name('pricing');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');
Route::post('/kontak', [PageController::class, 'sendContact'])->name('contact.send');

Route::post('/inquiry', [InquiryController::class, 'store'])->middleware('throttle:inquiry')->name('inquiries.store');
Route::post('/ai/chat', [\App\Http\Controllers\AiChatController::class, 'chat'])->middleware('throttle:30,1')->name('ai.chat');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [RobotsController::class, 'index'])->name('robots');

Route::get('/lokasi/kota/{province}', [\App\Http\Controllers\LocationController::class, 'citiesByProvince'])->name('locations.cities-by-province');
Route::get('/lokasi/kecamatan/{city}', [\App\Http\Controllers\LocationController::class, 'districtsByCity'])->name('locations.districts-by-city');

$adminDomain = config('app.admin_domain');
$adminHost = ! empty($adminDomain) ? (parse_url('http://' . $adminDomain, PHP_URL_HOST) ?: $adminDomain) : null;

if (! empty($adminHost)) {
    // Auth routes strictly on admin subdomain
    Route::domain($adminHost)->middleware(['guest', 'throttle:auth'])->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
    });

    // Hidden from the main domain (regular users get 404)
    Route::any('/login', fn () => abort(404));
    Route::any('/register', fn () => abort(404));
} else {
    // Fallback if ADMIN_DOMAIN is not yet configured
    Route::middleware(['guest', 'throttle:auth'])->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

        Route::get('/register', fn () => redirect()->route('home'))->name('register');

        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
    });
}

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/confirm-password', [\App\Http\Controllers\Auth\ConfirmPasswordController::class, 'show'])->name('password.confirm');
    Route::post('/confirm-password', [\App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm'])->name('password.confirm.post');

    Route::get('/email/verify', [\App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify')->middleware('signed');
    Route::post('/email/resend', [\App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

    Route::post('/favorites/{listing}/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

    Route::get('/dashboard', fn () => redirect()->route(auth()->user()->isAdmin() ? 'admin.dashboard' : 'user.profile.edit'))->name('dashboard');

    Route::get('/dashboard/favorites', [UserFavoriteController::class, 'index'])->name('user.favorites.index');

    Route::get('/dashboard/inquiries', [UserInquiryController::class, 'index'])->name('user.inquiries.index');
    Route::get('/dashboard/inquiries/{inquiry}', [UserInquiryController::class, 'show'])->name('user.inquiries.show');
    Route::post('/dashboard/inquiries/{inquiry}/replied', [UserInquiryController::class, 'markReplied'])->name('user.inquiries.replied');

    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::put('/dashboard/profile', [ProfileController::class, 'update'])->name('user.profile.update');

    Route::get('/dashboard/settings', [SettingController::class, 'index'])->name('user.settings');
    Route::put('/dashboard/settings/password', [SettingController::class, 'updatePassword'])->name('user.settings.password');
});