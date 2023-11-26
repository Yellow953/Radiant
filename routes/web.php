<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);

Route::get('/password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

// Shop
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

// Shop
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

// Shop
Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');

// Cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart');
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout']);
Route::post('/checkout', [App\Http\Controllers\CartController::class, 'order']);

// Profile
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile']);
Route::post('/profile/save', [App\Http\Controllers\HomeController::class, 'save_profile']);
Route::get('/password/edit', [App\Http\Controllers\HomeController::class, 'EditPassword']);
Route::post('/password/update', [App\Http\Controllers\HomeController::class, 'UpdatePassword']);

Route::prefix('/users')->group(function () {
    Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/{user}/update', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy']);
    Route::get('/new', [App\Http\Controllers\UserController::class, 'new']);
    Route::post('/create', [App\Http\Controllers\UserController::class, 'create']);
    Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
});


// Backups
Route::prefix('/backup')->group(function () {
    Route::get('/', [App\Http\Controllers\BackupController::class, 'index']);

    // Export
    Route::prefix('/export')->group(function () {
        Route::get('/categories', [App\Http\Controllers\BackupController::class, 'ExportCategories']);
        Route::get('/products', [App\Http\Controllers\BackupController::class, 'ExportProducts']);
        Route::get('/users', [App\Http\Controllers\BackupController::class, 'ExportUsers']);
        Route::get('/logs', [App\Http\Controllers\BackupController::class, 'ExportLogs']);
        Route::get('/orders', [App\Http\Controllers\BackupController::class, 'ExportOrders']);
    });

    // Import
    Route::prefix('/import')->group(function () {
        Route::post('/categories', [App\Http\Controllers\BackupController::class, 'ImportCategories']);
        Route::post('/products', [App\Http\Controllers\BackupController::class, 'ImportProducts']);
        Route::post('/users', [App\Http\Controllers\BackupController::class, 'ImportUsers']);
        Route::post('/logs', [App\Http\Controllers\BackupController::class, 'ImportLogs']);
        Route::post('/orders', [App\Http\Controllers\BackupController::class, 'ImportOrders']);
    });
});

// Categories
Route::prefix('/categories')->group(function () {
    Route::get('/new', [App\Http\Controllers\CategoryController::class, 'new']);
    Route::post('/create', [App\Http\Controllers\CategoryController::class, 'create']);
    Route::get('/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit']);
    Route::post('/{category}/update', [App\Http\Controllers\CategoryController::class, 'update']);
    Route::get('/{category}/destroy', [App\Http\Controllers\CategoryController::class, 'destroy']);
    Route::get('/{category}/switch', [App\Http\Controllers\CategoryController::class, 'switch']);
    Route::get('/', [App\Http\Controllers\CategoryController::class, 'index']);
});

// Products
Route::prefix('/products')->group(function () {
    Route::get('/search', [App\Http\Controllers\ProductController::class, 'search']);
    Route::get('/new', [App\Http\Controllers\ProductController::class, 'new']);
    Route::post('/create', [App\Http\Controllers\ProductController::class, 'create']);
    Route::get('/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit']);
    Route::post('/{product}/update', [App\Http\Controllers\ProductController::class, 'update']);
    Route::get('/{product}/import', [App\Http\Controllers\ProductController::class, 'import']);
    Route::post('/{product}/save', [App\Http\Controllers\ProductController::class, 'save']);
    Route::get('/{product}/destroy', [App\Http\Controllers\ProductController::class, 'destroy']);
    Route::get('/{product}/secondary_images', [App\Http\Controllers\ProductController::class, 'secondary_images_index']);
    Route::get('/', [App\Http\Controllers\ProductController::class, 'index']);
});
Route::post('/secondary_image/create', [App\Http\Controllers\ProductController::class, 'secondary_images_create']);
Route::get('/secondary_image/{secondary_image}/destroy', [App\Http\Controllers\ProductController::class, 'secondary_images_destroy']);

// Orders
Route::prefix('/orders')->group(function () {
    Route::get('/{order}/complete', [App\Http\Controllers\OrderController::class, 'complete']);
    Route::get('/{order}/edit', [App\Http\Controllers\OrderController::class, 'edit']);
    Route::post('/{order}/update', [App\Http\Controllers\OrderController::class, 'update']);
    Route::get('/{order}/destroy', [App\Http\Controllers\OrderController::class, 'destroy']);
    Route::get('/{order}/show', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
    Route::get('/new', [App\Http\Controllers\OrderController::class, 'new']);
    Route::post('/create', [App\Http\Controllers\OrderController::class, 'create']);
    Route::post('/checkout', [App\Http\Controllers\HomeController::class, 'checkout']);
    Route::get('/', [App\Http\Controllers\OrderController::class, 'index']);
});

// Promo
Route::prefix('/promos')->group(function () {
    Route::get('/{promo}/edit', [App\Http\Controllers\PromoController::class, 'edit']);
    Route::post('/{promo}/update', [App\Http\Controllers\PromoController::class, 'update']);
    Route::get('/{promo}/destroy', [App\Http\Controllers\PromoController::class, 'destroy']);
    Route::get('/{promo}/show', [App\Http\Controllers\PromoController::class, 'show']);
    Route::get('/new', [App\Http\Controllers\PromoController::class, 'new']);
    Route::post('/create', [App\Http\Controllers\PromoController::class, 'create']);
    Route::post('/check', [App\Http\Controllers\PromoController::class, 'check'])->name('check_promo');
    Route::get('/', [App\Http\Controllers\PromoController::class, 'index']);
});

// Admin CRM
Route::get('/app', [App\Http\Controllers\AdminController::class, 'index']);

// Logs
Route::get('/logs', [App\Http\Controllers\LogController::class, 'index']);

// logout
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'custom_logout']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
