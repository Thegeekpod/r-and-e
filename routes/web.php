<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FinanceController as AdminFinanceController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PageStatusController as AdminPageStatusController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Public Front-End Page Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/finance', [PageController::class, 'finance'])->name('finance');
Route::get('/education', [PageController::class, 'education'])->name('education');
Route::get('/placement', [PageController::class, 'placement'])->name('placement');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'storeContact'])->name('contact.store');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        
        // Page Status & Visibility Controller
        Route::get('/pages', [AdminPageStatusController::class, 'index'])->name('pages.index');
        Route::post('/pages', [AdminPageStatusController::class, 'update'])->name('pages.update');

        // Contact Messages & Inquiries
        Route::get('/contacts', [AdminContactMessageController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [AdminContactMessageController::class, 'show'])->name('contacts.show');
        Route::post('/contacts/{contact}/toggle-read', [AdminContactMessageController::class, 'toggleRead'])->name('contacts.toggleRead');
        Route::delete('/contacts/{contact}', [AdminContactMessageController::class, 'destroy'])->name('contacts.destroy');

        // Home Page Content Editor
        Route::get('/home-content', [AdminHomeController::class, 'index'])->name('home.index');
        Route::post('/home-content', [AdminHomeController::class, 'update'])->name('home.update');

        // Finance Page Content Editor
        Route::get('/finance-content', [AdminFinanceController::class, 'index'])->name('finance.index');
        Route::post('/finance-content', [AdminFinanceController::class, 'update'])->name('finance.update');

        // Testimonials Management
        Route::resource('testimonials', AdminTestimonialController::class)->except(['show']);

        // Clients Management
        Route::resource('clients', AdminClientController::class)->except(['show', 'create', 'edit']);

        // General Site Settings
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });
});
