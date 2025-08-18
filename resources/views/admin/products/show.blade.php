@extends('layouts.admin')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Chi tiết sản phẩm</h1>
            <p class="text-sm text-gray-500 mt-1">{{ $product->name }}</p>
        </div>
        <a href="{{ route('admin.products.index') }}"
            class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 flex items-center gap-2">
            <i data-lucide="arrow-left" class="h-5 w-5"></i>
            <span>Quay lại danh sách</span>
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Cột ảnh sản phẩm -->
            <div class="md:col-span-1">
                <!-- Ảnh chính -->
                <div class="mb-4">
                    <img id="main-product-image"
                        src="{{ $product->images->isNotEmpty() ? asset('media/product/' . $product->images->first()->path) : ($product->thumbnail ? asset('storage/' . $product->thumbnail) : 'https://placehold.co/400x400/e2e8f0/a0aec0?text=No+Image') }}"
                        alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-lg shadow-md">
                </div>

                <!-- Thư viện ảnh thu nhỏ -->
                @if ($product->images->count() > 1)
                    <div id="thumbnail-gallery" class="flex items-center gap-2 overflow-x-auto">
                        @foreach ($product->images as $image)
                            <img src="{{ asset('media/product/' . $image->path) }}" alt="Thumbnail of {{ $product->name }}"
                                class="h-20 w-20 object-cover rounded-md cursor-pointer border-2 border-transparent hover:border-red-500 transition duration-200">
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Cột thông tin chi tiết -->
            <div class="md:col-span-2 space-y-4">
                <h2 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h2>

                <div class="flex items-center space-x-4">
                    <span class="text-2xl font-bold text-red-600">{{ number_format($product->price, 0, ',', '.') }} đ</span>
                    @if ($product->old_price)
                        <span
                            class="text-lg text-gray-500 line-through">{{ number_format($product->old_price, 0, ',', '.') }}
                            đ</span>
                    @endif
                </div>

                <div class="border-t pt-4">
                    <h3 class="font-semibold text-gray-700 mb-2">Thông tin cơ bản:</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li><strong>Slug:</strong> <code>{{ $product->slug }}</code></li>
                        <li><strong>Danh mục:</strong> {{ $product->category->name ?? 'N/A' }}</li>
                        <li><strong>Thương hiệu:</strong> {{ $product->brand->name ?? 'N/A' }}</li>
                        <li><strong>Số lượng trong kho:</strong> {{ $product->quantity }}</li>
                    </ul>
                </div>

                @if ($product->description)
                    <div class="border-t pt-4">
                        <h3 class="font-semibold text-gray-700 mb-2">Mô tả sản phẩm:</h3>
                        <div class="prose max-w-none text-gray-600">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                    </div>
                @endif

                <div class="border-t pt-6 flex justify-end">
                    <a href="{{ route('admin.products.edit', $product) }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center gap-2">
                        <i data-lucide="edit" class="h-5 w-5"></i>
                        <span>Chỉnh sửa</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('main-product-image');
            const thumbnails = document.querySelectorAll('#thumbnail-gallery img');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    mainImage.src = this.src;
                    thumbnails.forEach(img => img.classList.remove('border-red-500'));
                    this.classList.add('border-red-500');
                });
            });

            if (thumbnails.length > 0) {
                thumbnails[0].classList.add('border-red-500');
            }
        });
    </script>
@endpush
