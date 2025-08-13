<header class="bg-white shadow-sm sticky top-0 z-50">
    <!-- 1. Banner quảng cáo ở trên cùng -->
    <div class="bg-primary-600">
        <a href="#" class="block w-full h-auto">
            <!-- Thay thế bằng hình ảnh banner của bạn -->
            <img src="" alt="{{ __('Banner quảng cáo Back to School') }}" class="w-full h-auto object-contain"
                    onerror="this.onerror=null;this.src='https://placehold.co/1920x50/e53e3e/ffffff?text=Banner+Quang+Cao';">
        </a>
    </div>

    <!-- 2. Thanh điều hướng chính -->
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between gap-4 py-3">

            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}">
                    <!-- Thay thế bằng logo của bạn -->
                    <img class="h-12 md:h-14 w-auto" src="https://i.imgur.com/sTz4x2k.png" alt="{{ __('Logo QuocViet Computer') }}"
                        onerror="this.onerror=null;this.src='https://placehold.co/200x50/cccccc/333333?text=Logo';">
                </a>
            </div>

            <!-- Phần giữa: Thanh tìm kiếm -->
            <div class="hidden md:flex relative flex-grow mx-4">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </span>
                <input type="text" placeholder="{{ __('Bạn muốn mua gì hôm nay?') }}" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-shadow text-sm">
            </div>

            <!-- Phần bên phải: Các nút chức năng -->
            <div class="flex items-center gap-2 md:gap-2">
                <!-- Nút Tư vấn Game-Net -->
                <a href="#" class="hidden xl:flex items-center gap-2 bg-primary-600 text-white font-medium text-sm px-4 py-2.5 rounded-lg hover:bg-primary-700 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <span class="whitespace-nowrap">{{ __('Tư vấn Game-Net') }}</span>
                </a>

                <!-- Nút Build PC -->
                <a href="#" class="hidden xl:flex items-center gap-2 border border-gray-300 text-gray-800 font-medium text-sm px-4 py-2.5 rounded-lg hover:bg-gray-100 hover:border-gray-400 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.096 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>{{ __('Build PC') }}</span>
                </a>

                <!-- Auth Links (Đăng nhập/Đăng ký hoặc Tên người dùng/Hồ sơ/Đăng xuất) -->
                @guest
                    <a href="{{ route('login') }}" class="hidden lg:flex items-center gap-2 text-gray-800 hover:text-primary-600 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="font-medium text-sm">{{ __('Đăng nhập') }}</span>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ms-4 hidden lg:flex items-center gap-2 text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 px-4 py-2.5 rounded-lg">
                            {{ __('Đăng ký') }}
                        </a>
                    @endif
                @endguest

                @auth
                <!-- Settings Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <a href="#" class="hidden lg:flex items-center gap-2 border border-gray-300 text-gray-800 font-medium text-sm px-4 py-2.5 rounded-lg hover:bg-gray-100 hover:border-gray-400 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <div>{{ Auth::user()->name }}</div>
                            </a>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Hồ sơ') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Đăng xuất') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endauth

                <!-- Nút Giỏ hàng -->
                <a href="#" class="flex items-center gap-2 bg-rose-100 text-primary-600 border border-primary-500 font-medium text-sm px-3 py-2.5 rounded-lg hover:bg-primary-600 hover:text-white transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="hidden sm:inline">{{ __('Giỏ hàng') }}</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Hamburger) -->
    <div x-data="{ open: false }" :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            {{-- Responsive links here --}}
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Hồ sơ') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Đăng xuất') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @else
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Đăng nhập') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')">
                    {{ __('Đăng ký') }}
                </x-responsive-nav-link>
            </div>
            @endauth
        </div>
    </div>
</header>
