<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm sản phẩm mới') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form id="create-product-form" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-6 text-gray-900 space-y-6">
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Tên sản phẩm</label>
                            <input type="text" name="name" id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('name') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="price" class="block font-medium text-sm text-gray-700">Giá (VNĐ)</label>
                                <input type="number" name="price" id="price" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
                                @error('price') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="quantity" class="block font-medium text-sm text-gray-700">Số lượng</label>
                                <input type="number" name="quantity" id="quantity" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
                                @error('quantity') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block font-medium text-sm text-gray-700">Mô tả</label>
                            <textarea name="description" id="description" rows="5" class="block mt-1 w-full rounded-md shadow-sm border-gray-300"></textarea>
                            @error('description') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="thumbnail" class="block font-medium text-sm text-gray-700">Ảnh đại diện</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                            @error('thumbnail') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-6 py-4 bg-gray-50 text-right space-x-4">
                        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">Hủy</a>
                        <button type="button" onclick="showConfirmModal('create-product-form', 'Xác nhận thêm', 'Bạn có chắc chắn muốn thêm sản phẩm này?')" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-red-700">Lưu sản phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.products._confirmation-modal')
</x-app-layout>
