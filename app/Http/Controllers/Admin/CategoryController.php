<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest; // Đảm bảo đã use đúng class
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // app/Http/Controllers/Admin/CategoryController.php

    public function index()
    {
        // Chỉ lấy các danh mục gốc (cấp cao nhất)
        // with('children') sẽ tải sẵn tất cả danh mục con trực tiếp của chúng
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->latest()
            ->paginate(50);

        return view('admin.categories.index', compact('categories'));
    }


    // public function index()
    // {
    //     // Chỉ lấy các danh mục gốc (cấp cao nhất)
    //     // with('childrenRecursive') sẽ tải sẵn TẤT CẢ các cấp con cháu
    //     $categories = Category::whereNull('parent_id')
    //                             ->with('childrenRecursive')
    //                             ->latest()
    //                             ->paginate(15);

    //     return view('admin.categories.index', compact('categories'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        $parentCategories = Category::whereNull('parent_id')->orderBy('name')->get();

        return view('admin.categories.create', compact('category', 'parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreCategoryRequest $request)
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        // Tự động tạo slug nếu không được cung cấp
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Tạo danh mục thành công.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $parentCategories = Category::whereNull('parent_id')
            ->where('id', '!=', $category->id)
            ->orderBy('name')
            ->get();
        return view('admin.categories.edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        // Tự động tạo slug nếu không được cung cấp
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Cập nhật danh mục thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Kiểm tra xem danh mục có sản phẩm hoặc danh mục con không
        if ($category->products()->exists() || $category->children()->exists()) {
            return back()->with('error', 'Không thể xóa danh mục vì đang chứa sản phẩm hoặc danh mục con.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Xóa danh mục thành công.');
    }
}
