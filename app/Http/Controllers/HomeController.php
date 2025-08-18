<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     *
     * This method gathers all the necessary data for the main page,
     * including categories for the menu (used in the header and sidebar)
     * and featured products.
     *
     * @return \Illuminate\View\View
     */

    public function __invoke()
    {
        // Lấy danh mục cho menu, sử dụng logic tương tự trong ViewServiceProvider
        // để đảm bảo tính nhất quán và tận dụng cache.
        $menuCategories = Cache::remember('menu_categories', now()->addHour(), function () {
            return Category::where('is_active', true)
                ->whereHas('products') // Chỉ lấy các danh mục có sản phẩm.
                ->orderBy('name', 'asc')
                ->get();
        });

        // Lấy sản phẩm nổi bật.
        // Giả sử model Product có cột 'is_featured'.
        $featuredProducts = Product::where('is_featured', true)
            ->with('images') // Eager load images để tránh N+1 query trong view.
            ->latest()
            ->take(8)
            ->get();

        return view('home', [
            'menuCategories' => $menuCategories,
            'featuredProducts' => $featuredProducts,
        ]);
    }
}
