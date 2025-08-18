@extends('layouts.admin')

@section('title', 'Tạo danh mục mới')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Tạo danh mục mới</h1>
            <p class="text-sm text-gray-500 mt-1">Thêm một danh mục sản phẩm mới vào hệ thống.</p>
        </div>
        <a href="{{ route('admin.categories.index') }}"
            class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 flex items-center gap-2">
            <i data-lucide="arrow-left" class="h-5 w-5"></i>
            <span>Quay lại</span>
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md">
        <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="p-6 md:p-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    {{-- Cột trái --}}
                    <div class="lg:col-span-2 space-y-6">
                        {{-- Tên & Slug --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block font-medium text-sm text-gray-700">Tên danh mục</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="block w-full pl-4 pr-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                                    required>
                                @error('name')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="slug" class="block font-medium text-sm text-gray-700">Slug (Đườngdẫn)</label>
                                <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                    class="block w-full pl-4 pr-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                <p class="mt-1 text-xs text-gray-500">Để trống sẽ tự động tạo từ tên danh mục.</p>
                                @error('slug')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Danh mục cha --}}
                        <div>
                            <label for="parent_id" class="block font-medium text-sm text-gray-700">Danh mục cha</label>
                            <select name="parent_id" id="parent_id"
                                class="block w-full pl-4 pr-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                <option value="">— Không có —</option>
                                @foreach ($parentCategories as $parent)
                                    <option value="{{ $parent->id }}" @selected(old('parent_id') == $parent->id)>
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Mô tả --}}
                        <div>
                            <label for="description" class="block font-medium text-sm text-gray-700">Mô tả</label>
                            <textarea name="description" id="description" rows="6"
                                class="block w-full pl-4 pr-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    {{-- Cột phải --}}
                    <div class="lg:col-span-1 space-y-6">
                        {{-- Ảnh danh mục --}}
                        <div>
                            <label class="block font-medium text-sm text-gray-700 mb-2">Ảnh danh mục</label>
                            <div
                                class="w-full h-48 bg-gray-100 rounded-md flex items-center justify-center border-2 border-dashed border-gray-300">
                                <img id="image-preview" src="" alt="Xem trước ảnh"
                                    class="hidden w-full h-full object-cover rounded-md">
                                <span id="image-placeholder" class="text-gray-500">Xem trước ảnh</span>
                            </div>
                            <input type="file" name="image" id="image" class="hidden" accept="image/*">
                            <button type="button" onclick="document.getElementById('image').click()"
                                class="mt-2 w-full text-sm text-red-600 bg-red-50 hover:bg-red-100 rounded-md py-2">
                                Tải ảnh lên
                            </button>
                            @error('image')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Các checkbox trạng thái --}}
                        <div class="border-t pt-6 space-y-4">
                            <h3 class="font-medium text-gray-900">Tùy chọn hiển thị</h3>
                            <div class="relative flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="is_active" name="is_active" type="checkbox" value="1"
                                        @checked(old('is_active', true))
                                        class="h-4 w-4 rounded border-gray-500 text-red-600 focus:ring-red-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="is_active" class="font-medium text-gray-700">Kích hoạt</label>
                                    <p class="text-gray-500">Hiển thị danh mục này.</p>
                                </div>
                            </div>
                            <div class="relative flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="is_featured" name="is_featured" type="checkbox" value="1"
                                        @checked(old('is_featured'))
                                        class="h-4 w-4 rounded border-gray-500 text-red-600 focus:ring-red-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="is_featured" class="font-medium text-gray-700">Nổi bật</label>
                                    <p class="text-gray-500">Đánh dấu là nổi bật.</p>
                                </div>
                            </div>
                            <div class="relative flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="show_on_menu" name="show_on_menu" type="checkbox" value="1"
                                        @checked(old('show_on_menu'))
                                        class="h-4 w-4 rounded border-gray-500 text-red-600 focus:ring-red-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="show_on_menu" class="font-medium text-gray-700">Hiển thị trên Menu</label>
                                    <p class="text-gray-500">Hiện trên thanh điều hướng.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Nút bấm --}}
            <div class="flex items-center justify-end px-6 py-4 bg-gray-50 text-right space-x-4 border-t">
                <a href="{{ route('admin.categories.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-500 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">
                    Hủy
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-red-700">
                    Tạo mới
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

        document.getElementById('image').addEventListener('change', function(event) {
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('image-placeholder');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
