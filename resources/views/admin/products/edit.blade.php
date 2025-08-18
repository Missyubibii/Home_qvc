<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Chỉnh sửa sản phẩm: {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form id="edit-product-form" action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-6 text-gray-900 space-y-6">
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Tên sản phẩm</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
                            @error('name') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="price" class="block font-medium text-sm text-gray-700">Giá (VNĐ)</label>
                                <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
                                @error('price') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="quantity" class="block font-medium text-sm text-gray-700">Số lượng</label>
                                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
                                @error('quantity') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block font-medium text-sm text-gray-700">Mô tả</label>
                            <textarea name="description" id="description" rows="5" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">{{ old('description', $product->description) }}</textarea>
                            @error('description') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Ảnh đại diện hiện tại</label>
                            <img src="{{ $product->thumbnail ? asset('storage/' . $product->thumbnail) : 'https://placehold.co/150x150/e2e8f0/a0aec0?text=N/A' }}" alt="Current thumbnail" class="mt-2 w-32 h-32 object-cover rounded-md">
                            <label for="thumbnail" class="block font-medium text-sm text-gray-700 mt-4">Tải ảnh mới (để trống nếu không đổi)</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                            @error('thumbnail') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-6 py-4 bg-gray-50 text-right space-x-4">
                        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">Hủy</a>
                        <button type="button" onclick="showConfirmModal('edit-product-form', 'Xác nhận cập nhật', 'Bạn có chắc chắn muốn lưu thay đổi cho sản phẩm này?')" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-red-700">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.products._confirmation-modal')
</x-app-layout>
