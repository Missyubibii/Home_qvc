<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display the specified category and its products.
     *
     * @param Category $category
     * @return View
     */
    public function show(Category $category): View
    {
        // Tải các sản phẩm thuộc về danh mục này, có phân trang.
        // Eager load các mối quan hệ cần thiết cho product card (images, thumbnailImage) để tránh N+1 query.
        $products = $category->products()
            ->with(['images', 'thumbnailImage']) // Tải sẵn ảnh để hiển thị thumbnail
            ->latest() // Sắp xếp sản phẩm mới nhất lên đầu
            ->paginate(16); // Phân trang, 16 sản phẩm mỗi trang

        // Trả về view, truyền vào biến category và products
        return view('user.categories.show', compact('category', 'products'));
    }
}

