@csrf

<!-- Tên danh mục -->
<div class="mb-4">
    <label for="name" class="block text-sm font-medium text-gray-700">Tên danh mục</label>
    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
    @error('name')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<!-- Slug -->
<div class="mb-4">
    <label for="slug" class="block text-sm font-medium text-gray-700">Slug (Đường dẫn thân thiện)</label>
    <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
    <p class="mt-1 text-xs text-gray-500">Nếu để trống, hệ thống sẽ tự động tạo từ tên danh mục.</p>
    @error('slug')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<!-- Danh mục cha -->
<div class="mb-4">
    <label for="parent_id" class="block text-sm font-medium text-gray-700">Danh mục cha</label>
    <select name="parent_id" id="parent_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        <option value="">— Không có —</option>
        @foreach ($parentCategories as $parent)
            <option value="{{ $parent->id }}" @selected(old('parent_id', $category->parent_id) == $parent->id)>
                {{ $parent->name }}
            </option>
        @endforeach
    </select>
</div>

<!-- Mô tả -->
<div class="mb-4">
    <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
    <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description', $category->description) }}</textarea>
</div>

<!-- Các checkbox trạng thái -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
    <!-- Kích hoạt -->
    <div class="flex items-start">
        <div class="flex h-5 items-center">
            <input id="is_active" name="is_active" type="checkbox" value="1" @checked(old('is_active', $category->is_active ?? true)) class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
        </div>
        <div class="ml-3 text-sm">
            <label for="is_active" class="font-medium text-gray-700">Kích hoạt</label>
            <p class="text-gray-500">Hiển thị danh mục này trên trang web.</p>
        </div>
    </div>

    <!-- Nổi bật -->
    <div class="flex items-start">
        <div class="flex h-5 items-center">
            <input id="is_featured" name="is_featured" type="checkbox" value="1" @checked(old('is_featured', $category->is_featured)) class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
        </div>
        <div class="ml-3 text-sm">
            <label for="is_featured" class="font-medium text-gray-700">Nổi bật</label>
            <p class="text-gray-500">Đánh dấu là danh mục nổi bật.</p>
        </div>
    </div>

    <!-- Hiển thị trên menu -->
    <div class="flex items-start">
        <div class="flex h-5 items-center">
            <input id="show_on_menu" name="show_on_menu" type="checkbox" value="1" @checked(old('show_on_menu', $category->show_on_menu)) class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
        </div>
        <div class="ml-3 text-sm">
            <label for="show_on_menu" class="font-medium text-gray-700">Hiển thị trên Menu</label>
            <p class="text-gray-500">Hiển thị trên thanh điều hướng chính.</p>
        </div>
    </div>
</div>

<!-- Nút Lưu -->
<div class="flex justify-end mt-6">
    <a href="{{ route('admin.categories.index') }}" class="mr-4 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Hủy
    </a>
    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        {{ $category->exists ? 'Cập nhật' : 'Tạo mới' }}
    </button>
</div>