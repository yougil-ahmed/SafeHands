<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ServicePackageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// ========================
// 🛡️ Admin Routes
// ========================
Route::middleware([RoleMiddleware::class . ':admin'])->name('admin.')->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Categories
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
        Route::get('/categories/create', 'create')->name('categories.create');
        Route::post('/categories', 'store')->name('categories.store');
        Route::get('/categories/{category}', 'show')->name('categories.show');
        Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');
        Route::put('/categories/{category}', 'update')->name('categories.update');
        Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');
    });

    // Services
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/services', 'index')->name('services.index');
        Route::get('/services/create', 'create')->name('services.create');
        Route::post('/services', 'store')->name('services.store');
        Route::get('/services/{service}', 'show')->name('services.show');
        Route::get('/services/{service}/edit', 'edit')->name('services.edit');
        Route::put('/services/{service}', 'update')->name('services.update');
        Route::delete('/services/{service}', 'destroy')->name('services.destroy');

        // Approve / Reject Service
        Route::patch('/services/{service}/approve', 'approve')->name('services.approve');
        Route::patch('/services/{service}/reject', 'reject')->name('services.reject');

        // Reason why service was rejected (message to seller)
        Route::post('/services/{service}/message', 'sendMessage')->name('services.sendMessage');
    });

    // Service Packages
    Route::controller(ServicePackageController::class)->group(function () {
        Route::get('/services/{service}/packages/create', 'create')->name('service-packages.create');
        Route::post('/services/{service}/packages', 'store')->name('service-packages.store');
        Route::get('/services/{service}/packages/{package}/edit', 'edit')->name('service-packages.edit');
        Route::put('/services/{service}/packages/{package}', 'update')->name('service-packages.update');
        Route::delete('/services/{service}/packages/{package}', 'destroy')->name('service-packages.destroy');
    });

    // Notifications
    Route::controller(NotificationController::class)->group(function () {
        Route::delete('/notifications/{notification}', 'destroy')->name('notifications.destroy');
        Route::delete('/notifications', 'destroyAll')->name('notifications.destroyAll');
    });

    // Reviews
    Route::controller(ReviewController::class)->group(function () {
        Route::get('/reviews', 'index')->name('reviews.index'); // عرض التقييمات
        Route::get('services/{service}/reviews/create', 'create')->name('reviews.create'); // فورم إضافة تقييم
        Route::post('services/{service}/reviews', 'store')->name('reviews.store'); // تخزين التقييم
        Route::get('services/{service}/reviews/{review}', 'show')->name('reviews.show'); // عرض تقييم محدد
        Route::get('services/{service}/reviews/{review}/edit', 'edit')->name('reviews.edit'); // تعديل التقييم
        Route::put('services/{service}/reviews/{review}', 'update')->name('reviews.update'); // تحديث التقييم
        Route::delete('services/{service}/reviews/{review}', 'destroy')->name('reviews.destroy'); // حذف التقييم
    });
});

// ========================
// 💼 Seller Routes
// ========================
Route::middleware([RoleMiddleware::class . ':seller'])->group(function () {
    Route::get('/seller/dashboard', [SellerController::class, 'index'])->name('seller.dashboard');
});

// ========================
// 👤 Buyer Routes
// ========================
Route::middleware([RoleMiddleware::class . ':buyer'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// ========================
// 🌍 Public Routes
// ========================
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('SafeHands/category/{category}', 'showCategory')->name('category.show');
    Route::get('SafeHands/categories', 'allCategories')->name('categories.index');
    Route::get('SafeHands/service/{service}', 'showService')->name('service.show');
    Route::get('SafeHands/services', 'allServices')->name('services.index');
    Route::get('SafeHands/search', 'search')->name('search');
    Route::get('SafeHands/about', 'about')->name('about');
    Route::get('SafeHands/contact', 'contact')->name('contact');
    Route::post('SafeHands/contact', 'sendContactMessage')->name('contact.send');
});

// ========================
// 🧑‍💻 Authenticated Routes
// ========================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ========================
// 🔐 Auth Scaffolding
// ========================
require __DIR__ . '/auth.php';
