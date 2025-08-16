<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;

// Trang chủ
Route::get('/', function () {
    return view('home');
})->name('home');


// Các route yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, logout...)
require __DIR__.'/auth.php';

// Route cho admin
Route::prefix('admin')->name('admin.')->group(function () {

    // Route yêu cầu đăng nhập và có role admin hoặc staff
    Route::middleware(['auth', 'role:admin,staff'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Products
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');

        // Categories
        Route::get('/categories', function () {
            return view('admin.categories.index');
        })->name('categories.index');

        // Orders
        Route::get('/orders', function () {
            return view('admin.orders.index');
        })->name('orders.index');

        // Customers
        Route::get('/customers', function () {
            return view('admin.customers.index');
        })->name('customers.index');
    });
});
