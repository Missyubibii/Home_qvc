{{-- File: resources/views/partials/product-categories.blade.php --}}

@if (isset($categories) && $categories->isNotEmpty())

    {{-- Lặp qua từng DANH MỤC --}}
    @foreach ($categories as $category)
        <div class="category-block mt-12">
            {{-- Tiêu đề danh mục --}}
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">{{ $category->name }}</h2>
                <a href="{{ route('categories.show', $category->slug) }}"
                    class="text-primary-600 hover:text-primary-800 font-semibold flex items-center gap-2 transition-colors">
                    {{ __('Xem tất cả') }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

            @if ($category->products->isNotEmpty())
                {{-- Container cho Carousel --}}
                <div class="relative">
                    {{-- Cấu trúc của Swiper.js --}}
                    <div class="swiper product-carousel">
                        <div class="swiper-wrapper">
                            {{-- Lặp qua từng SẢN PHẨM --}}
                            @foreach ($category->products as $product)
                                <div class="swiper-slide h-auto">
                                    {{-- Card sản phẩm --}}
                                    <div
                                        class="group bg-white rounded-lg shadow-md overflow-hidden transition-shadow duration-300 hover:shadow-xl flex flex-col h-full">
                                        <a href="{{ route('products.show', $product->slug) }}" class="block">
                                            <div class="relative bg-gray-100" style="padding-top: 100%;">
                                                {{-- Giữ tỷ lệ 1:1 cho ảnh --}}
                                                <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}"
                                                    class="absolute top-0 left-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                            </div>
                                        </a>
                                        <div class="p-4 flex flex-col flex-grow">
                                            <h3 class="font-semibold text-gray-800 text-sm mb-2 h-10 overflow-hidden"><a
                                                    href="{{ route('products.show', $product->slug) }}"
                                                    class="hover:text-primary-600">{{ $product->name }}</a></h3>
                                            <div class="mt-auto">
                                                <p class="text-primary-600 font-bold text-lg">
                                                    {{ number_format($product->price, 0, ',', '.') }}₫</p>
                                                @if ($product->old_price && $product->old_price > $product->price)
                                                    <p class="text-gray-500 text-sm line-through">
                                                        {{ number_format($product->old_price, 0, ',', '.') }}₫</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Nút điều hướng cho Swiper (chỉ hiển thị trên màn hình lớn) --}}
                    <div class="swiper-button-prev -left-4 text-primary-600 hidden xl:flex"></div>
                    <div class="swiper-button-next -right-4 text-primary-600 hidden xl:flex"></div>
                </div>
            @endif
        </div>
    @endforeach

@endif
