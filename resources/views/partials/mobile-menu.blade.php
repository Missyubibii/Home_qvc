<!--
  Mobile Menu
  Sử dụng Alpine.js để điều khiển trạng thái đóng/mở.
  - `x-data="{ open: false }"`: Khởi tạo trạng thái `open` là `false`.
  - `@open-mobile-menu.window`: Lắng nghe sự kiện `open-mobile-menu` trên toàn cục (window) để mở menu.
  - `@close-mobile-menu.window`: Lắng nghe sự kiện `close-mobile-menu` để đóng menu.
  - `@keydown.escape.window`: Lắng nghe phím Escape để đóng menu.
  - `x-cloak`: Ẩn phần tử cho đến khi Alpine.js được khởi tạo xong để tránh bị "nháy" giao diện.
-->
<div x-data="{ open: false }" @open-mobile-menu.window="open = true" @close-mobile-menu.window="open = false"
    @keydown.escape.window="open = false" x-cloak>
    <!-- Overlay (lớp nền mờ) -->
    <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50 z-30" @click="open = false">
    </div>

    <!-- Bảng Menu -->
    <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed top-0 left-0 w-4/5 max-w-sm h-full bg-white shadow-lg z-40 flex flex-col">
        <!-- Header của Menu -->
        <div class="p-4 border-b flex justify-between items-center">
            <h2 class="text-lg font-bold text-gray-800">Danh mục</h2>
            <button @click="open = false" class="text-gray-500 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
                <span class="sr-only">Đóng menu</span>
            </button>
        </div>

        <!-- Danh sách điều hướng -->
        <nav class="flex-1 p-4 overflow-y-auto">
            <ul class="space-y-2">
                @foreach ($menuCategories as $category)
                    <li>
                        <a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>
