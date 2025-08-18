<x-main-layout>
    <div class="container mx-auto px-4 py-8">
        {{-- Breadcrumbs (Tùy chọn) --}}
        <div class="mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $category->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        {{-- Tiêu đề danh mục --}}
        <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $category->name }}</h1>
        @if ($category->description)
            <p class="text-gray-600 mb-8">{{ $category->description }}</p>
        @endif

        {{-- Lưới sản phẩm --}}
        @if ($products->isNotEmpty())
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach ($products as $product)
                    {{-- Card sản phẩm --}}
                    <div
                        class="group bg-white rounded-lg shadow-md overflow-hidden transition-shadow duration-300 hover:shadow-xl flex flex-col h-full">
                        <a href="{{ route('products.show', $product->slug) }}" class="block">
                            <div class="relative bg-gray-100" style="padding-top: 100%;"> {{-- Giữ tỷ lệ 1:1 cho ảnh --}}
                                <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}"
                                    class="absolute top-0 left-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                            </div>
                        </a>
                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="font-semibold text-gray-800 text-sm mb-2 h-10 overflow-hidden">
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="hover:text-primary-600">{{ $product->name }}</a>
                            </h3>
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
                @endforeach
            </div>

            {{-- Phân trang --}}
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <p class="text-gray-500 text-lg">Không có sản phẩm nào trong danh mục này.</p>
            </div>
        @endif
    </div>
</x-main-layout>
