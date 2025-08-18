<x-main-layout>
    <!-- Nội dung chính của trang -->
    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">

            <!-- Cột bên trái: Danh mục sản phẩm -->
            @include('partials.category-menu')

            <!-- Cột bên phải: Nội dung chính -->
            <main class="col-span-1 lg:col-span-4">
                <!-- Khu vực banner -->
                <div id="banner-container" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <!-- Banner chính -->
                    <div class="md:col-span-2 rounded-lg overflow-hidden">
                        <a href="#" class="block h-full">
                            <img src="https://placehold.co/800x420/a78bfa/ffffff?text=Banner+Chinh" alt="Main Banner"
                                class="w-full h-full object-cover">
                        </a>
                    </div>
                    <!-- Banner phụ -->
                    <div class="flex flex-col gap-4">
                        <div class="flex-1 rounded-lg overflow-hidden"><a href="#" class="block h-full"><img
                                    src="https://placehold.co/400x130/f87171/ffffff?text=Banner+Phu+1"
                                    alt="Side Banner 1" class="w-full h-full object-cover"></a></div>
                        <div class="flex-1 rounded-lg overflow-hidden"><a href="#" class="block h-full"><img
                                    src="https://placehold.co/400x130/60a5fa/ffffff?text=Banner+Phu+2"
                                    alt="Side Banner 2" class="w-full h-full object-cover"></a></div>
                        <div class="flex-1 rounded-lg overflow-hidden"><a href="#" class="block h-full"><img
                                    src="https://placehold.co/400x130/34d399/ffffff?text=Banner+Phu+3"
                                    alt="Side Banner 3" class="w-full h-full object-cover"></a></div>
                    </div>
                </div>


            </main>
        </div>


    </div>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-gray-800">{{ __('Sản phẩm nổi bật') }}</h1>
        <p class="mt-2 text-gray-600">{{ __('Các sản phẩm đang được quan tâm nhất...') }}</p>
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            @forelse ($featuredProducts as $product)
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden group transition-transform duration-300 hover:-translate-y-1">
                    <a href="{{ route('products.show', $product->slug) }}" class="block"> 
                        <img src="{{ $product->images->first()->url ?? 'https://placehold.co/400x400/e2e8f0/a0aec0?text=Image' }}"
                            alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 truncate group-hover:text-primary-600">
                            <a href="{{ route('products.show', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        </h3>
                        <p class="text-gray-600 mt-2 font-bold">
                            {{ number_format($product->price, 0, ',', '.') }} ₫
                        </p>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500 py-8">Chưa có sản phẩm nổi bật nào.</p>
            @endforelse
        </div>
    </div>


    <div class="container mx-auto ">


        <!-- Container cho các danh mục được tải thêm -->
        <div id="more-categories-container"></div>

        <!-- === SỬA ĐỔI Ở ĐÂY === -->
        <!-- Container cho hiệu ứng loading hoặc thông báo cuối trang -->
        <div id="loading-indicator" class="hidden">
            <!-- Nội dung sẽ được JavaScript chèn vào đây -->
        </div </div>
        {{-- Thêm thư viện Swiper.js để tạo carousel --}}
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <script>
            // Hàm này không thay đổi
            function matchBannerHeight() {
                const categoryMenu = document.getElementById('category-menu');
                const bannerContainer = document.getElementById('banner-container');
                if (categoryMenu && bannerContainer) {
                    if (window.innerWidth >= 1024) {
                        const categoryHeight = categoryMenu.offsetHeight;
                        bannerContainer.style.height = `${categoryHeight}px`;
                    } else {
                        bannerContainer.style.height = 'auto';
                    }
                }
            }
            window.addEventListener('load', matchBannerHeight);
            window.addEventListener('resize', matchBannerHeight);

            // === SỬA ĐỔI TOÀN BỘ LOGIC INFINITE SCROLL Ở ĐÂY ===
            document.addEventListener('DOMContentLoaded', function() {
                /**
                 * Khởi tạo tất cả các carousel sản phẩm (Swiper) chưa được khởi tạo.
                 * Hàm này sẽ tìm tất cả element có class '.product-carousel' và áp dụng Swiper.
                 * Nó sử dụng một `data-initialized` attribute để đảm bảo mỗi carousel chỉ được khởi tạo một lần.
                 */
                const initProductCarousels = () => {
                    document.querySelectorAll('.product-carousel').forEach(carousel => {
                        if (carousel.dataset.initialized) {
                            return;
                        }

                        new Swiper(carousel, {
                            loop: true, // Cho phép lặp lại vô tận, cần thiết cho autoplay mượt mà
                            slidesPerView: 2, // Mặc định hiển thị 2 sản phẩm
                            spaceBetween: 16,
                            navigation: {
                                nextEl: carousel.parentElement.querySelector('.swiper-button-next'),
                                prevEl: carousel.parentElement.querySelector('.swiper-button-prev'),
                            },
                            autoplay: {
                                delay: 5000, // Tự động chuyển sau 5 giây
                                disableOnInteraction: false, // Không vô hiệu hóa autoplay vĩnh viễn sau khi người dùng tương tác (vuốt)
                                pauseOnMouseEnter: true, // Tạm dừng khi người dùng di chuột vào vùng carousel
                            },
                            breakpoints: {
                                768: { // md
                                    slidesPerView: 3,
                                },
                                1280: { // xl
                                    slidesPerView: 4,
                                }
                            }
                        });
                        carousel.dataset.initialized = 'true';
                    });
                };

                let isLoading = false;
                let noMoreData = false;
                let loadedCategoryIds = [];

                const container = document.getElementById('more-categories-container');
                const loadingIndicator = document.getElementById('loading-indicator');

                // HTML cho hiệu ứng skeleton loading
                const skeletonHtml = `
                <div class="category-block-skeleton animate-pulse mt-12">
                    <div class="h-8 bg-gray-200 rounded-md w-1/3 mb-6"></div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                        <div class="space-y-3"><div class="h-40 bg-gray-200 rounded-lg"></div><div class="space-y-2"><div class="h-4 bg-gray-200 rounded w-5/6"></div><div class="h-4 bg-gray-200 rounded w-1/2"></div></div></div>
                        <div class="space-y-3"><div class="h-40 bg-gray-200 rounded-lg"></div><div class="space-y-2"><div class="h-4 bg-gray-200 rounded w-5/6"></div><div class="h-4 bg-gray-200 rounded w-1/2"></div></div></div>
                        <div class="space-y-3"><div class="h-40 bg-gray-200 rounded-lg"></div><div class="space-y-2"><div class="h-4 bg-gray-200 rounded w-5/6"></div><div class="h-4 bg-gray-200 rounded w-1/2"></div></div></div>
                        <div class="space-y-3"><div class="h-40 bg-gray-200 rounded-lg"></div><div class="space-y-2"><div class="h-4 bg-gray-200 rounded w-5/6"></div><div class="h-4 bg-gray-200 rounded w-1/2"></div></div></div>
                    </div>
                </div>`;

                const loadMoreCategories = async () => {
                    if (isLoading || noMoreData) return;

                    isLoading = true;
                    loadingIndicator.innerHTML = skeletonHtml; // Hiển thị skeleton
                    loadingIndicator.classList.remove('hidden');

                    try {
                        const response = await fetch('{{ route('products.load-more') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                exclude_ids: loadedCategoryIds
                            })
                        });
                        const data = await response.json();

                        // Xóa skeleton trước khi thêm nội dung thật
                        loadingIndicator.classList.add('hidden');
                        loadingIndicator.innerHTML = '';

                        if (data.html.trim() !== '') {
                            container.insertAdjacentHTML('beforeend', data.html);
                            loadedCategoryIds = [...loadedCategoryIds, ...data.loaded_ids];

                            // Khởi tạo carousel cho các danh mục vừa được tải vào
                            initProductCarousels();
                        }

                        if (data.noMoreData) {
                            noMoreData = true;
                            loadingIndicator.innerHTML =
                                '<p class="text-center py-10 text-gray-500 font-semibold">Bạn đã xem hết sản phẩm.</p>';
                            loadingIndicator.classList.remove('hidden'); // Hiển thị thông báo cuối trang
                        }

                    } catch (error) {
                        console.error('Lỗi khi tải thêm danh mục:', error);
                        noMoreData = true; // Dừng tải khi có lỗi
                        loadingIndicator.innerHTML =
                            '<p class="text-center py-10 text-red-500 font-semibold">Đã có lỗi xảy ra. Vui lòng thử lại sau.</p>';
                    } finally {
                        isLoading = false;
                    }
                };

                // Bắt sự kiện cuộn trang
                window.addEventListener('scroll', () => {
                    // Tải thêm khi người dùng cuộn gần đến cuối trang
                    if ((window.innerHeight + window.scrollY) >= document.documentElement.scrollHeight - 500) {
                        loadMoreCategories();
                    }
                });

                // Tải ngay một ít danh mục khi vào trang
                loadMoreCategories(); // Hàm này sẽ tự gọi initProductCarousels sau khi tải xong
            });
        </script>
</x-main-layout>
