<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);

// Contact
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

// About
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Shop
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

// Cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart');
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CartController::class, 'order'])->name('checkout.order');

// Profile
Route::prefix('/profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile');
    Route::post('/save', [ProfileController::class, 'save'])->name('profile.save');
    Route::get('/password/edit', [ProfileController::class, 'edit_password'])->name('password_edit');
    Route::post('/password/update', [ProfileController::class, 'update_password'])->name('password_update');
});

// Users
Route::prefix('/users')->group(function () {
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::get('/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/new', [UserController::class, 'new'])->name('users.new');
    Route::post('/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/', [UserController::class, 'index'])->name('users');
});

// Backups
Route::prefix('/backup')->group(function () {
    Route::get('/', [BackupController::class, 'index'])->name('backup');

    // Export
    Route::prefix('/export')->group(function () {
        Route::get('/categories', [BackupController::class, 'ExportCategories'])->name('export.categories');
        Route::get('/products', [BackupController::class, 'ExportProducts'])->name('export.products');
        Route::get('/users', [BackupController::class, 'ExportUsers'])->name('export.users');
        Route::get('/logs', [BackupController::class, 'ExportLogs'])->name('export.logs');
        Route::get('/orders', [BackupController::class, 'ExportOrders'])->name('export.orders');
    });

    // Import
    Route::prefix('/import')->group(function () {
        Route::post('/categories', [BackupController::class, 'ImportCategories'])->name('import.categories');
        Route::post('/products', [BackupController::class, 'ImportProducts'])->name('import.products');
        Route::post('/users', [BackupController::class, 'ImportUsers'])->name('import.users');
        Route::post('/logs', [BackupController::class, 'ImportLogs'])->name('import.logs');
        Route::post('/orders', [BackupController::class, 'ImportOrders'])->name('import.orders');
    });
});

// Categories
Route::prefix('/categories')->group(function () {
    Route::get('/new', [CategoryController::class, 'new'])->name('categories.new');
    Route::post('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/{category}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/{category}/switch', [CategoryController::class, 'switch'])->name('categories.switch');
    Route::get('/', [CategoryController::class, 'index'])->name('categories');
});

// Products
Route::prefix('/products')->group(function () {
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/new', [ProductController::class, 'new'])->name('products.new');
    Route::post('/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/{product}/update', [ProductController::class, 'update'])->name('products.update');
    Route::get('/{product}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/', [ProductController::class, 'index'])->name('products');
});

// Orders
Route::prefix('/orders')->group(function () {
    Route::get('/{order}/complete', [OrderController::class, 'complete'])->name('orders.complete');
    Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::post('/{order}/update', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/{order}/destroy', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('/{order}/show', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/new', [OrderController::class, 'new'])->name('orders.new');
    Route::post('/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/checkout', [HomeController::class, 'checkout'])->name('orders.checkout');
    Route::get('/', [OrderController::class, 'index'])->name('orders');
});

// Promo
Route::prefix('/promos')->group(function () {
    Route::get('/{promo}/edit', [PromoController::class, 'edit'])->name('promos.edit');
    Route::post('/{promo}/update', [PromoController::class, 'update'])->name('promos.update');
    Route::get('/{promo}/destroy', [PromoController::class, 'destroy'])->name('promos.destroy');
    Route::get('/{promo}/show', [PromoController::class, 'show'])->name('promos.show');
    Route::get('/new', [PromoController::class, 'new'])->name('promos.new');
    Route::post('/create', [PromoController::class, 'create'])->name('promos.create');
    Route::post('/check', [PromoController::class, 'check'])->name('check_promo');
    Route::get('/', [PromoController::class, 'index'])->name('promos');
});

// Admin CRM
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

// Logs
Route::get('/logs', [LogController::class, 'index'])->name('logs');

// logout
Route::get('/logout', [HomeController::class, 'custom_logout'])->name('custom_logout');

// Designs
Route::prefix('/designs')->group(function () {
    Route::get('/{design}/destroy', [DesignController::class, 'destroy'])->name('designs.destroy');
    Route::get('/{design}/show', [DesignController::class, 'show'])->name('designs.show');
    Route::post('/create', [DesignController::class, 'create'])->name('designs.create');
    Route::get('/', [DesignController::class, 'index'])->name('designs');
});
Route::get('/customize', [DesignController::class, 'new'])->name('customize');

Route::get('/', [HomeController::class, 'index'])->name('home');
