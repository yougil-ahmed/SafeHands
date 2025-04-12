<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ServicePackageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;



// Admin Routes
Route::middleware([RoleMiddleware::class . ':admin'])->name('admin.')->group(function () {
    
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard' , 'dashboard')->name('dashboard');
    });
    
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
        Route::get('/categories/create', 'create')->name('categories.create');
        Route::post('/categories', 'store')->name('categories.store');
        Route::get('/categories/{category}', 'show')->name('categories.show');
        Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');
        Route::put('/categories/{category}', 'update')->name('categories.update');
        Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');
    });

    Route::controller(ServiceController::class)->group(function() {
        Route::get('/services' , 'index')->name('services.index');
        Route::get('/services/create', 'create')->name('services.create');
        Route::post('/services', 'store')->name('services.store');
        Route::get('/services/{service}', 'show')->name('services.show');
        Route::get('/services/{service}/edit', 'edit')->name('services.edit');
        Route::put('/services/{service}', 'update')->name('services.update');
        Route::delete('/services/{service}', 'destroy')->name('services.destroy');

        Route::patch('/admin/services/{service}/approve' , 'approve')->name('services.approve');
        Route::patch('/admin/services/{service}/reject' , 'reject')->name('services.reject');

        Route::post('/admin/services/{service}/message' , 'sendMessage')->name('services.sendMessage');
    });

    Route::controller(ServicePackageController::class)->group(function() {
        Route::get('services/{service}/packages/create', 'create')->name('service-packages.create');
        Route::post('services/{service}/packages/', 'store')->name('service-packages.store');
        Route::get('services/{service}/packages/{package}/edit', 'edit')->name('service-packages.edit');
        Route::put('services/{service}/packages/{package}', 'update')->name('service-packages.update');
        Route::delete('services/{service}/packages/{package}', 'destroy')->name('service-packages.destroy');
    });

    Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])
        ->name('notifications.destroy');
    Route::delete('/notifications', [NotificationController::class, 'destroyAll'])
        ->name('notifications.destroyAll');
});

// Seller Routes
Route::middleware([RoleMiddleware::class . ':seller'])->group(function () {
    Route::get('/seller/dashboard', [SellerController::class, 'index'])->name('seller.dashboard');
});

// Buyer Routes
Route::middleware([RoleMiddleware::class . ':buyer'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// ghadi nzid wa7ed lpartie fin l admin y9der ygol l seller 3lache ma t9belche service dyaleh
