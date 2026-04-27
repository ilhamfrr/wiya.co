<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/product/{slug}', [HomeController::class, 'show'])->name('product.show');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
| TODO: protect with auth middleware when auth is set up
| Example: Route::middleware(['auth', 'role:admin'])->group(...)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Products — uncomment when ProductController is created
    // Route::resource('products', ProductController::class);

    // Orders — uncomment when OrderController is created
    // Route::resource('orders', OrderController::class);

    // Customers — uncomment when CustomerController is created
    // Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
});
