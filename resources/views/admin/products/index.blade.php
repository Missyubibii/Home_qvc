@extends('layouts.admin')

@section('title', 'Quản lý sản phẩm')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Danh sách sản phẩm</h2>
            <button id="add-product-btn" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 flex items-center gap-2">
                <i data-lucide="plus" class="h-5 w-5"></i>
                <span>Thêm sản phẩm</span>
            </button>
        </div>

        <div class="overflow-x-auto border rounded-lg">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Tên sản phẩm</th>
                        <th scope="col" class="px-6 py-3">Danh mục</th>
                        <th scope="col" class="px-6 py-3">Thương hiệu</th>
                        <th scope="col" class="px-6 py-3">Giá</th>
                        <th scope="col" class="px-6 py-3">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $product->id }}</td>
                            <td class="px-6 py-4">{{ $product->name }}</td>
                            <td class="px-6 py-4">{{ $product->category->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $product->brand->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ number_format($product->price, 0, ',', '.') }} đ</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-3">
                                    <button class="text-blue-500 hover:text-blue-700">
                                        <i data-lucide="edit" class="h-5 w-5"></i>
                                    </button>
                                    <button class="text-red-500 hover:text-red-700">
                                        <i data-lucide="trash-2" class="h-5 w-5"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
