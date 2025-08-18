<aside id="category-menu" class="hidden lg:block col-span-1 bg-white p-4 rounded-lg shadow-md self-start">
    <h2 class="text-lg font-bold text-gray-800 mb-4">{{ __('Danh mục sản phẩm') }}</h2>
    <nav>
        <ul>
            @forelse($menuCategories as $category)
                <li class="mb-2">
                    <a href="{{ route('categories.show', $category->slug) }}" class="flex items-center p-2 text-gray-700 rounded-md hover:bg-primary-50 hover:text-primary-600 transition-colors">
                        {{-- Bạn có thể thêm icon cho danh mục ở đây nếu muốn --}}
                        {{-- <svg class="w-5 h-5 mr-3" ...></svg> --}}
                        <span class="font-medium">{{ $category->name }}</span>
                    </a>
                </li>
            @empty
                <li class="p-2 text-gray-500">{{ __('Chưa có danh mục nào.') }}</li>
            @endforelse
        </ul>
    </nav>
</aside>

