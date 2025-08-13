<x-main-layout>
    <!-- Nội dung chính của trang -->
    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">

            <!-- Cột bên trái: Danh mục sản phẩm -->
            <aside id="category-menu" class="hidden lg:block col-span-1 bg-white p-3 rounded-lg shadow-md self-start">
                <ul class="space-y-1">
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/L4J4V5L.png" class="w-5 h-5" alt="icon laptop"><span class="font-medium">{{ __('Laptop Máy Tính Xách Tay') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/J3Gg62h.png" class="w-5 h-5" alt="icon linh kien"><span class="font-medium">{{ __('Linh Kiện Máy Tính') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/6qK0bB4.png" class="w-5 h-5" alt="icon camera"><span class="font-medium">{{ __('Camera Quan Sát') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/9Yf3A8a.png" class="w-5 h-5" alt="icon esport"><span class="font-medium">{{ __('Phòng Game - Esport') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/kSjY3fK.png" class="w-5 h-5" alt="icon pc gaming"><span class="font-medium">{{ __('PC GAMING - ĐỒ HỌA') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/dO2r0Qz.png" class="w-5 h-5" alt="icon may chu"><span class="font-medium">{{ __('Máy Tính Bộ - Máy Chủ') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/W2A3K4G.png" class="w-5 h-5" alt="icon man hinh"><span class="font-medium">{{ __('Màn Hình Máy Tính') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/8F9E8n4.png" class="w-5 h-5" alt="icon ban ghe"><span class="font-medium">{{ __('Bàn Ghế') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/2s3Xy5g.png" class="w-5 h-5" alt="icon van phong"><span class="font-medium">{{ __('Thiết Bị Văn Phòng') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/x5dY7Zz.png" class="w-5 h-5" alt="icon thiet bi mang"><span class="font-medium">{{ __('Thiết Bị Mạng') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/mN8c0fT.png" class="w-5 h-5" alt="icon dien may"><span class="font-medium">{{ __('Điện Máy') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/5w4F9gV.png" class="w-5 h-5" alt="icon nghe nhin"><span class="font-medium">{{ __('Thiết Bị Nghe Nhìn') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/Y7h1e3d.png" class="w-5 h-5" alt="icon gia dung"><span class="font-medium">{{ __('THIẾT BỊ GIA DỤNG') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                    <li><a href="#" class="flex items-center justify-between p-1.5 rounded-md text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors"><div class="flex items-center gap-2"><img src="https://i.imgur.com/uR4g9b1.png" class="w-5 h-5" alt="icon khac"><span class="font-medium">{{ __('Sản Phẩm Khác') }}</span></div><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg></a></li>
                </ul>
            </aside>

            <!-- Cột bên phải: Nội dung chính -->
            <main class="col-span-1 lg:col-span-4">
                <!-- Khu vực banner -->
                <div id="banner-container" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <!-- Banner chính -->
                    <div class="md:col-span-2 rounded-lg overflow-hidden">
                        <a href="#" class="block h-full">
                            <img src="https://placehold.co/800x420/a78bfa/ffffff?text=Banner+Chinh" alt="Main Banner" class="w-full h-full object-cover">
                        </a>
                    </div>
                    <!-- Banner phụ -->
                    <div class="flex flex-col gap-4">
                        <div class="flex-1 rounded-lg overflow-hidden">
                            <a href="#" class="block h-full">
                                <img src="https://placehold.co/400x130/f87171/ffffff?text=Banner+Phu+1" alt="Side Banner 1" class="w-full h-full object-cover">
                            </a>
                        </div>
                        <div class="flex-1 rounded-lg overflow-hidden">
                            <a href="#" class="block h-full">
                                <img src="https://placehold.co/400x130/60a5fa/ffffff?text=Banner+Phu+2" alt="Side Banner 2" class="w-full h-full object-cover">
                            </a>
                        </div>
                        <div class="flex-1 rounded-lg overflow-hidden">
                            <a href="#" class="block h-full">
                                <img src="https://placehold.co/400x130/34d399/ffffff?text=Banner+Phu+3" alt="Side Banner 3" class="w-full h-full object-cover">
                            </a>
                        </div>
                    </div>
                </div>

                <h1 class="text-2xl font-bold text-gray-800">{{ __('Sản phẩm nổi bật') }}</h1>
                <p class="mt-2 text-gray-600">{{ __('Các sản phẩm đang được quan tâm nhất...') }}</p>
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                    <div class="bg-white p-4 rounded-lg shadow-md h-64"></div>
                    <div class="bg-white p-4 rounded-lg shadow-md h-64"></div>
                    <div class="bg-white p-4 rounded-lg shadow-md h-64"></div>
                    <div class="bg-white p-4 rounded-lg shadow-md h-64"></div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function matchBannerHeight() {
            const categoryMenu = document.getElementById('category-menu');
            const bannerContainer = document.getElementById('banner-container');
            if (categoryMenu && bannerContainer) {
                // Chỉ chạy trên màn hình lớn nơi menu danh mục hiển thị
                if (window.innerWidth >= 1024) { // 1024px là breakpoint 'lg' của Tailwind
                    const categoryHeight = categoryMenu.offsetHeight;
                    bannerContainer.style.height = `${categoryHeight}px`;
                } else {
                    // Trên màn hình nhỏ hơn, reset chiều cao về tự động
                    bannerContainer.style.height = 'auto';
                }
            }
        }

        // Chạy khi trang tải xong
        window.addEventListener('load', matchBannerHeight);
        // Chạy khi thay đổi kích thước cửa sổ
        window.addEventListener('resize', matchBannerHeight);
    </script>
</x-main-layout>
