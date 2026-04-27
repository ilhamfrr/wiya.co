<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API ROUTES — WIYA.CO
| Base URL: /api/v1/...
| Future use: Mobile app, WhatsApp bot
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->name('api.v1.')->group(function () {

    /*
    |----------------------------------------------------------------------
    | PUBLIC ENDPOINTS (No authentication required)
    |----------------------------------------------------------------------
    */
    Route::get('/health', function () {
        return response()->json([
            'status'  => 'ok',
            'app'     => config('app.name'),
            'version' => '1.0.0',
            'time'    => now()->toDateTimeString(),
        ]);
    })->name('health');

    Route::get('/products', function () {
        return response()->json([
            'success' => true,
            'message' => 'Products endpoint — connect to ProductController',
            'data'    => [],
        ]);
    })->name('products.index');

    Route::get('/categories', function () {
        return response()->json([
            'success' => true,
            'message' => 'Categories endpoint — connect to CategoryController',
            'data'    => [],
        ]);
    })->name('categories.index');

    /*
    |----------------------------------------------------------------------
    | PROTECTED ENDPOINTS (Requires Sanctum token)
    | Install: composer require laravel/sanctum
    |----------------------------------------------------------------------
    */
    // Route::middleware('auth:sanctum')->group(function () {
    //     Route::get('/user', function (Request $request) {
    //         return $request->user();
    //     });
    //     Route::post('/orders', [OrderController::class, 'store']);
    //     Route::get('/orders', [OrderController::class, 'index']);
    // });
});
