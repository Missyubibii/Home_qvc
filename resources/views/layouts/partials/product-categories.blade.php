@foreach($categories as $category)
<div class="mt-12 animate-fade-in">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">{{ $category->name }}</h2>
        <a href="#" class="text-sm font-semibold text-primary-600 hover:text-primary-800 transition-colors">Xem tất cả &rarr;</a>
    </div>
    <p class="mt-2 text-gray-600">Khám phá các sản phẩm trong danh mục {{ $category->name }}</p>
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        @forelse($category->products as $product)
            <a href="{{ route('product.public.show', $product->slug) }}" class="block bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                <img src="{{ $product->thumbnail_url ?? 'https://placehold.co/300x300/e2e8f0/a0aec0?text=N/A' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md mb-4">
                <h3 class="font-semibold text-gray-800 truncate" title="{{ $product->name }}">{{ $product->name }}</h3>
                <p class="text-red-600 font-bold mt-2">{{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
            </a>
        @empty
            <p class="text-gray-500 col-span-full">Chưa có sản phẩm nào trong danh mục này.</p>
        @endforelse
    </div>
</div>
@endforeach