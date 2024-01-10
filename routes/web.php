<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);

Route::get('/password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

// Contact
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

// About
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

// Shop
Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');

// Cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart');
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CartController::class, 'order'])->name('checkout.order');

// Profile
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile']);
Route::post('/profile/save', [App\Http\Controllers\HomeController::class, 'save_profile'])->name('profile.save');
Route::get('/password/edit', [App\Http\Controllers\HomeController::class, 'edit_password'])->name('password.edit');
Route::post('/password/update', [App\Http\Controllers\HomeController::class, 'update_password'])->name('password.update');

// Users
Route::prefix('/users')->group(function () {
    Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::post('/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/new', [App\Http\Controllers\UserController::class, 'new'])->name('users.new');
    Route::post('/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users');
});

// Backups
Route::prefix('/backup')->group(function () {
    Route::get('/', [App\Http\Controllers\BackupController::class, 'index'])->name('backup');

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
    Route::get('/new', [App\Http\Controllers\CategoryController::class, 'new'])->name('categories.new');
    Route::post('/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::get('/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/{category}/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    Route::get('/{category}/destroy', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/{category}/switch', [App\Http\Controllers\CategoryController::class, 'switch'])->name('categories.switch');
    Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
});

// Products
Route::prefix('/products')->group(function () {
    Route::get('/search', [App\Http\Controllers\ProductController::class, 'search'])->name('products.search');
    Route::get('/new', [App\Http\Controllers\ProductController::class, 'new'])->name('products.new');
    Route::post('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::get('/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::post('/{product}/update', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::get('/{product}/import', [App\Http\Controllers\ProductController::class, 'import'])->name('products.import');
    Route::post('/{product}/save', [App\Http\Controllers\ProductController::class, 'save'])->name('products.save');
    Route::get('/{product}/destroy', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/{product}/secondary_images', [App\Http\Controllers\ProductController::class, 'secondary_images_index'])->name('secondary_images');
    Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
});
Route::post('/secondary_image/create', [App\Http\Controllers\ProductController::class, 'secondary_images_create'])->name('secondary_images.create');
Route::get('/secondary_image/{secondary_image}/destroy', [App\Http\Controllers\ProductController::class, 'secondary_images_destroy'])->name('secondary_images.destroy');

// Orders
Route::prefix('/orders')->group(function () {
    Route::get('/{order}/complete', [App\Http\Controllers\OrderController::class, 'complete'])->name('orders.complete');
    Route::get('/{order}/edit', [App\Http\Controllers\OrderController::class, 'edit'])->name('orders.edit');
    Route::post('/{order}/update', [App\Http\Controllers\OrderController::class, 'update'])->name('orders.update');
    Route::get('/{order}/destroy', [App\Http\Controllers\OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('/{order}/show', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
    Route::get('/new', [App\Http\Controllers\OrderController::class, 'new'])->name('orders.new');
    Route::post('/create', [App\Http\Controllers\OrderController::class, 'create'])->name('orders.create');
    Route::post('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('orders.checkout');
    Route::get('/', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
});

// Promo
Route::prefix('/promos')->group(function () {
    Route::get('/{promo}/edit', [App\Http\Controllers\PromoController::class, 'edit'])->name('promos.edit');
    Route::post('/{promo}/update', [App\Http\Controllers\PromoController::class, 'update'])->name('promos.update');
    Route::get('/{promo}/destroy', [App\Http\Controllers\PromoController::class, 'destroy'])->name('promos.destroy');
    Route::get('/{promo}/show', [App\Http\Controllers\PromoController::class, 'show'])->name('promos.show');
    Route::get('/new', [App\Http\Controllers\PromoController::class, 'new'])->name('promos.new');
    Route::post('/create', [App\Http\Controllers\PromoController::class, 'create'])->name('promos.create');
    Route::post('/check', [App\Http\Controllers\PromoController::class, 'check'])->name('check_promo');
    Route::get('/', [App\Http\Controllers\PromoController::class, 'index'])->name('promos');
});

// Admin CRM
Route::get('/app', [App\Http\Controllers\AdminController::class, 'index'])->name('app');

// Logs
Route::get('/logs', [App\Http\Controllers\LogController::class, 'index'])->name('logs');

// logout
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'custom_logout'])->name('custom_logout');

// Designs
Route::prefix('/designs')->group(function () {
    Route::get('/{design}/edit', [App\Http\Controllers\DesignController::class, 'edit'])->name('designs.edit');
    Route::post('/{design}/update', [App\Http\Controllers\DesignController::class, 'update'])->name('designs.update');
    Route::get('/{design}/destroy', [App\Http\Controllers\DesignController::class, 'destroy'])->name('designs.destroy');
    Route::get('/{design}/show', [App\Http\Controllers\DesignController::class, 'show'])->name('designs.show');
    Route::get('/new', [App\Http\Controllers\DesignController::class, 'new'])->name('designs.new');
    Route::post('/create', [App\Http\Controllers\DesignController::class, 'create'])->name('designs.create');
    Route::get('/', [App\Http\Controllers\DesignController::class, 'index'])->name('designs');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
