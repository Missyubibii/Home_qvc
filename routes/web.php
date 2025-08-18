<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Models\Product;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;


Route::get('/test-products', function () {
    // Lấy tổng số sản phẩm
    $productCount = Product::count();

    // Lấy 10 sản phẩm đầu tiên để xem thử
    $products = Product::take(10)->get();

    // Trả về kết quả dưới dạng JSON
    return response()->json([
        'total_products' => $productCount,
        'sample_products' => $products
    ]);
});
// // Import controller cho front-end và đặt bí danh (alias)
// use App\Http\Controllers\ProductController as FrontendProductController;

// Import các controller cho admin


// Trang chủ
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', HomeController::class)->name('home');
// // SỬA Ở ĐÂY: Dùng controller của front-end
// Route::get('/products/{id}', [FrontendProductController::class, 'show']);

// Các route yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, logout...)
require __DIR__ . '/auth.php';

// Route cho admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth', 'role:admin,staff'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // --- SỬA Ở ĐÂY: ĐỊNH NGHĨA THỦ CÔNG CÁC ROUTE SẢN PHẨM ---

        // Routes không chứa slug
        Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');

        // Routes chứa slug (cần .where() để chấp nhận dấu '/')
        Route::get('/products/{product}', [AdminProductController::class, 'show'])->name('products.show')->where('product', '.*');
        Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit')->where('product', '.*');
        Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update')->where('product', '.*');
        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy')->where('product', '.*');
        // -----------------------------------------------------------

        // Categories
        Route::resource('categories', AdminCategoryController::class)->except(['show']);

        // Orders
        Route::resource('orders', AdminOrderController::class);
    });
});

// Route để xử lý AJAX cho việc tải thêm sản phẩm ở trang chủ
// Hỗ trợ cả GET và POST để linh hoạt trong việc gọi API (ví dụ: test nhanh trên trình duyệt)
Route::match(['get', 'post'], '/load-more-categories', [ProductController::class, 'loadMoreCategories'])->name('products.load-more');

// ===================================================================
// ROUTE CÔNG KHAI CHO SẢN PHẨM - ĐẶT Ở CUỐI CÙNG
// ===================================================================

// Route cho trang danh mục sản phẩm. Phải được định nghĩa TRƯỚC route sản phẩm.
Route::get('/danh-muc/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');

// Route cho trang chi tiết sản phẩm.
Route::get('/{slug}', [ProductController::class, 'show'])
    ->name('products.show') // Đổi tên thành 'products.show' cho nhất quán
    ->where('slug', '.*');
