<?php

use Illuminate\Support\Facades\Route;

/**
 * Frontend Controllers
 */
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\DashboardController as CustomerDashboardController;

/**
 * Admin Controllers
 */
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;

/**
 * Auth Controllers
 */
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
| These routes are accessible by everyone.
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/product/{slug}', [HomeController::class, 'show'])->name('product.show');
Route::get('/lookbook', [HomeController::class, 'lookbook'])->name('lookbook');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cart/count', [CartController::class, 'getCount'])->name('cart.count');

// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process')->middleware('auth');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('auth');

// Customer Dashboard Routes
Route::middleware(['auth'])->prefix('dashboard')->group(function() {
    Route::get('/', [CustomerDashboardController::class, 'index'])->name('dashboard');
    
    Route::name('dashboard.')->group(function() {
        Route::get('/orders', [CustomerDashboardController::class, 'orders'])->name('orders');
        Route::get('/profile', [CustomerDashboardController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [CustomerDashboardController::class, 'updateProfile'])->name('profile.update');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Dashboard Routes
|--------------------------------------------------------------------------
| Protected by 'auth' and 'admin' middleware.
| Only users with the 'admin' role can access these routes.
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        
        // Dashboard Home
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Product Management (Full CRUD)
        Route::resource('products', ProductController::class);

        // Category Management
        Route::resource('categories', CategoryController::class);

        // User Management
        Route::resource('users', UserController::class)->only(['index', 'destroy']);

        // Order Management
        Route::controller(OrderController::class)->group(function () {
            Route::get('/orders', 'index')->name('orders.index');
            Route::get('/orders/{id}', 'show')->name('orders.show');
            Route::post('/orders/{id}/status', 'updateStatus')->name('orders.updateStatus');
        });
        
    });

/**
 * Include Authentication Routes (Login, Register, Password Reset, etc.)
 */
require __DIR__.'/auth.php';
