<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-200">
        <!-- Màn hình tải trang -->
        <div id="loading-overlay" class="fixed inset-0 bg-white z-[100] flex items-center justify-center transition-opacity duration-500 ease-in-out">
            <div class="w-16 h-16 border-4 border-t-primary-500 border-gray-200 rounded-full animate-spin"></div>
        </div>

        <!-- Menu danh mục cho mobile (Off-canvas) -->
        <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-[60] hidden"></div>
        <aside id="mobile-category-menu" class="fixed top-0 left-0 h-full w-72 bg-white z-[70] shadow-xl transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden">
            <div class="p-4 border-b flex justify-between items-center">
                <h2 class="text-base font-bold text-gray-800">{{ __('DANH MỤC') }}</h2>
                <button id="close-menu-btn" class="text-gray-600 hover:text-primary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-3 overflow-y-auto h-[calc(100%-60px)]">
                <ul class="space-y-1">
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/L4J4V5L.png" class="w-5 h-5" alt="icon laptop"><span class="font-medium text-sm">{{ __('Laptop Máy Tính Xách Tay') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/J3Gg62h.png" class="w-5 h-5" alt="icon linh kien"><span class="font-medium text-sm">{{ __('Linh Kiện Máy Tính') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/6qK0bB4.png" class="w-5 h-5" alt="icon camera"><span class="font-medium text-sm">{{ __('Camera Quan Sát') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/9Yf3A8a.png" class="w-5 h-5" alt="icon esport"><span class="font-medium text-sm">{{ __('Phòng Game - Esport') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/kSjY3fK.png" class="w-5 h-5" alt="icon pc gaming"><span class="font-medium text-sm">{{ __('PC GAMING - ĐỒ HỌA') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/dO2r0Qz.png" class="w-5 h-5" alt="icon may chu"><span class="font-medium text-sm">{{ __('Máy Tính Bộ - Máy Chủ') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/W2A3K4G.png" class="w-5 h-5" alt="icon man hinh"><span class="font-medium text-sm">{{ __('Màn Hình Máy Tính') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/8F9E8n4.png" class="w-5 h-5" alt="icon ban ghe"><span class="font-medium text-sm">{{ __('Bàn Ghế') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/2s3Xy5g.png" class="w-5 h-5" alt="icon van phong"><span class="font-medium text-sm">{{ __('Thiết Bị Văn Phòng') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/x5dY7Zz.png" class="w-5 h-5" alt="icon thiet bi mang"><span class="font-medium text-sm">{{ __('Thiết Bị Mạng') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/mN8c0fT.png" class="w-5 h-5" alt="icon dien may"><span class="font-medium text-sm">{{ __('Điện Máy') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/5w4F9gV.png" class="w-5 h-5" alt="icon nghe nhin"><span class="font-medium text-sm">{{ __('Thiết Bị Nghe Nhìn') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/Y7h1e3d.png" class="w-5 h-5" alt="icon gia dung"><span class="font-medium text-sm">{{ __('THIẾT BỊ GIA DỤNG') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/uR4g9b1.png" class="w-5 h-5" alt="icon khac"><span class="font-medium text-sm">{{ __('Sản Phẩm Khác') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                </ul>
            </div>
        </aside>

        <div class="min-h-screen">
            @include('layouts.partials.navbar')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const openMenuBtn = document.getElementById('open-menu-btn');
                const closeMenuBtn = document.getElementById('close-menu-btn');
                const mobileMenu = document.getElementById('mobile-category-menu');
                const overlay = document.getElementById('mobile-menu-overlay');
                const body = document.body;

                function openMenu() {
                    mobileMenu.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                    body.classList.add('overflow-hidden-body');
                }

                function closeMenu() {
                    mobileMenu.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                    body.classList.remove('overflow-hidden-body');
                }

                if (openMenuBtn) openMenuBtn.addEventListener('click', openMenu);
                if (closeMenuBtn) closeMenuBtn.addEventListener('click', closeMenu);
                if (overlay) overlay.addEventListener('click', closeMenu);

                const loader = document.getElementById('loading-overlay');
                if (loader) {
                    loader.classList.add('opacity-0');
                    setTimeout(() => {
                        loader.style.display = 'none';
                    }, 500);
                }
            });
        </script>
    </body>
</html>
