@extends('layouts.admin')

@section('title', 'Quản lý sản phẩm')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Quản lý sản phẩm</h1>
        <a href="{{ route('admin.products.create') }}"
            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 flex items-center gap-2">
            <i data-lucide="plus" class="h-5 w-5"></i>
            <span>Thêm sản phẩm</span>
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        @if (session('success'))
            <div id="success-alert" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
                role="alert">
                <i data-lucide="check-circle-2" class="h-5 w-5 mr-3"></i>
                <div><span class="font-medium">Thành công!</span> {{ session('success') }}</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200"
                    onclick="document.getElementById('success-alert').style.display='none'">
                    <i data-lucide="x" class="h-5 w-5"></i>
                </button>
            </div>
        @endif

        <div class="mb-6">
            <form action="{{ route('admin.products.index') }}" method="GET">
                <div class="flex items-center">
                    <div class="relative w-full md:w-1/2 lg:w-1/3">
                        <input type="text" name="search" placeholder="Tìm kiếm theo tên hoặc slug..."
                            class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                            value="{{ request('search') }}">
                        <button type="submit"
                            class="absolute inset-y-0 right-0 px-4 flex items-center text-gray-500 hover:text-red-600">
                            <i data-lucide="search" class="h-5 w-5"></i>
                        </button>
                    </div>
                    @if (request('search'))
                        <a href="{{ route('admin.products.index') }}"
                            class="ml-4 text-sm text-gray-600 hover:text-gray-900">Xóa bộ lọc</a>
                    @endif
                </div>
            </form>
        </div>

        <div class="overflow-x-auto border rounded-lg">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Ảnh</th>
                        <th scope="col" class="px-6 py-3">Tên sản phẩm</th>
                        <th scope="col" class="px-6 py-3">Danh mục</th>
                        <th scope="col" class="px-6 py-3">Giá</th>
                        <th scope="col" class="px-6 py-3">Số lượng</th>
                        <th scope="col" class="px-6 py-3">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <img src="{{ $product->images->isNotEmpty() ? asset('media/product/' . $product->images->first()->path) : ($product->thumbnail ? asset('storage/' . $product->thumbnail) : 'https://placehold.co/60x60/e2e8f0/a0aec0?text=N/A') }}"
                                    alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded">
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{-- SỬA Ở ĐÂY: Bọc tên sản phẩm trong thẻ <a> --}}
                                <a href="{{ route('admin.products.show', $product) }}"
                                    class="hover:text-red-600 hover:underline">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                            @if ($product->categories->isNotEmpty())
                                @foreach ($product->categories as $category)
                                    {{ $category->name }}</a>{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            @else
                                {{ 'Chưa phân loại' }}
                            @endif
                            </td>
                            <td class="px-6 py-4">{{ number_format($product->price, 0, ',', '.') }} đ</td>
                            <td class="px-6 py-4">{{ $product->quantity }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    {{-- XÓA Ở ĐÂY: Loại bỏ icon con mắt --}}
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                        class="text-blue-500 hover:text-blue-700" title="Chỉnh sửa">
                                        <i data-lucide="edit" class="h-5 w-5"></i>
                                    </a>
                                    <form id="delete-form-{{ $product->id }}"
                                        action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            onclick="showConfirmModal('delete-form-{{ $product->id }}', 'Xác nhận xóa', 'Bạn có chắc chắn muốn xóa sản phẩm \'{{ $product->name }}\'?')"
                                            class="text-red-500 hover:text-red-700" title="Xóa">
                                            <i data-lucide="trash-2" class="h-5 w-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                {{ request('search') ? 'Không tìm thấy sản phẩm nào.' : 'Chưa có sản phẩm nào.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>

    @include('admin.products._confirmation-modal')
@endsection
