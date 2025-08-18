<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Thêm thư viện Storage

class ProductController extends Controller
{
    // ===================================================================
    // CÁC PHƯƠNG THỨC DÀNH CHO TRANG QUẢN TRỊ (ADMIN)
    // ===================================================================

    /**
     * Hiển thị form để tạo sản phẩm mới.
     */
    public function create()
    {
        // Lấy danh sách categories, brands để hiển thị trong form
        $categories = Category::all();
        // $brands = Brand::all(); // Tương tự nếu bạn có model Brand
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Lưu sản phẩm mới vào database.
     */
    public function store(Request $request)
    {
        // 1. Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            // Thêm các rules validation khác ở đây
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate mỗi file ảnh
        ]);

        // 2. Tạo sản phẩm
        $product = Product::create($validatedData);

        // 3. Xử lý upload và lưu ảnh
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                // Dùng disk 'products' để lưu file vào /storage/app/public/media/products
                $path = $file->store('/', 'products');

                // Lưu thông tin ảnh vào bảng product_images
                $product->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    /**
     * Hiển thị form để chỉnh sửa sản phẩm.
     */
    public function edit(Product $product)
    {
        // Laravel tự động tìm sản phẩm theo ID hoặc slug (Route Model Binding)
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Cập nhật thông tin sản phẩm trong database.
     */
    public function update(Request $request, Product $product)
    {
        // 1. Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,' . $product->id, // Bỏ qua slug của chính nó
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        // 2. Cập nhật thông tin sản phẩm
        $product->update($validatedData);

        // 3. Upload ảnh mới (nếu có)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('/', 'products');
                $product->images()->create(['path' => $path]);
            }
        }

        // 4. Xóa ảnh cũ (nếu người dùng chọn xóa)
        if ($request->has('delete_images')) {
            $imagesToDelete = ProductImage::whereIn('id', $request->input('delete_images'))->get();
            foreach ($imagesToDelete as $image) {
                // Xóa file vật lý khỏi storage
                Storage::disk('products')->delete($image->path);
                // Xóa record trong database
                $image->delete();
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }


    // ===================================================================
    // CÁC PHƯƠNG THỨC DÀNH CHO TRANG CÔNG KHAI (USER) - Giữ nguyên
    // ===================================================================

    public function show($slug)
    {
        $product = Product::with(['images', 'brand', 'categories'])
            ->where('slug', $slug)->firstOrFail();
        return view('user.products.show', compact('product'));
    }

    public function loadMoreCategories(Request $request)
    {
        $excludeIds = $request->input('exclude_ids', []);

        // Lấy các danh mục nổi bật, có sản phẩm và chưa được tải
        $categories = Category::where('is_featured', true) // Chỉ lấy danh mục nổi bật
            ->whereNotIn('id', $excludeIds)
            ->whereHas('products') // Chỉ lấy danh mục có sản phẩm
            ->with(['products' => function ($query) {
                // Tải sẵn 11 sản phẩm mới nhất của mỗi danh mục
                $query->with(['images', 'thumbnailImage'])->latest()->take(11);
            }])
            ->inRandomOrder() // Lấy ngẫu nhiên để trang chủ không bị nhàm chán
            ->take(2) // Tải 2 danh mục mỗi lần
            ->get();

        if ($categories->isEmpty()) {
            return response()->json(['html' => '', 'noMoreData' => true]);
        }

        $loadedIds = $categories->pluck('id')->toArray();
        $html = view('partials.product-categories', ['categories' => $categories])->render();

        // Kiểm tra xem còn danh mục nổi bật nào khác (và có sản phẩm) để tải không
        $moreCategoriesExist = Category::where('is_featured', true)
            ->whereHas('products')
            ->whereNotIn('id', array_merge($excludeIds, $loadedIds))
            ->exists();

        return response()->json([
            'html' => $html,
            'loaded_ids' => $loadedIds,
            'noMoreData' => !$moreCategoriesExist,
        ]);
    }
}