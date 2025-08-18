<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <!-- Cột ảnh sản phẩm -->
                <div class="p-4">
                    <!-- Ảnh chính -->
                    <div class="mb-4">
                        <img id="main-product-image"
                            src="{{ $product->images->isNotEmpty() ? asset('media/product/' . $product->images->first()->path) : ($product->thumbnail ? asset('storage/' . $product->thumbnail) : 'https://placehold.co/600x600/e2e8f0/a0aec0?text=No+Image') }}"
                            alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-lg shadow-md">
                    </div>

                    <!-- Thư viện ảnh thu nhỏ -->
                    @if ($product->images->count() > 1)
                        <div id="thumbnail-gallery" class="flex items-center gap-2 overflow-x-auto">
                            @foreach ($product->images as $image)
                                <img src="{{ asset('media/product/250_' . $image->path) }}"
                                    alt="Thumbnail of {{ $product->name }}"
                                    class="h-20 w-20 object-cover rounded-md cursor-pointer border-2 border-transparent hover:border-red-500 transition duration-200">
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Cột thông tin sản phẩm -->
                <div class="p-6 md:p-8 flex flex-col">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>

                    <div class="flex items-baseline gap-4 mb-4">
                        <span class="text-3xl font-bold text-red-600">{{ number_format($product->price, 0, ',', '.') }}
                            đ</span>
                        @if ($product->old_price)
                            <span
                                class="text-xl text-gray-500 line-through">{{ number_format($product->old_price, 0, ',', '.') }}
                                đ</span>
                        @endif
                    </div>

                    <div class="text-sm text-gray-600 mb-4">
                        <p><span class="font-semibold">Danh mục:</span>
                            @if ($product->categories->isNotEmpty())
                                @foreach ($product->categories as $category)
                                    <a href="{{ route('categories.show', $category->slug) }}"
                                        class="text-blue-600 hover:underline">{{ $category->name }}</a>{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            @else
                                {{ 'Chưa phân loại' }}
                            @endif
                        </p>
                        <p><span class="font-semibold">Thương hiệu:</span>
                            {{ $product->brand->name ?? 'Không xác định' }}</p>
                        <p><span class="font-semibold">Tình trạng:</span>
                            <span class="{{ $product->quantity > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}
                            </span>
                        </p>
                    </div>

                    @if ($product->description)
                        <div class="prose max-w-none text-gray-700 mb-6 border-t pt-4">
                            <p>{!! nl2br(e($product->description)) !!}</p>
                        </div>
                    @endif

                    <div class="mt-auto">
                        <button
                            class="w-full bg-red-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-700 transition duration-300">
                            Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const mainImage = document.getElementById('main-product-image');
                const thumbnails = document.querySelectorAll('#thumbnail-gallery img');

                thumbnails.forEach(thumbnail => {
                    thumbnail.addEventListener('click', function() {
                        // Cập nhật ảnh chính
                        mainImage.src = this.src;

                        // Cập nhật viền active
                        thumbnails.forEach(img => img.classList.remove('border-red-500'));
                        this.classList.add('border-red-500');
                    });
                });

                // Đặt viền active cho ảnh đầu tiên khi tải trang
                if (thumbnails.length > 0) {
                    thumbnails[0].classList.add('border-red-500');
                }
            });
        </script>
    @endpush
</x-app-layout>
