<header class="bg-white shadow-sm sticky top-0 z-50">
    <!-- 1. Banner quảng cáo ở trên cùng (ĐÃ ẨN TRÊN MOBILE) -->
    <div class="bg-primary-600 hidden lg:block">
        <a href="#" class="block w-full h-auto">
            <img src="" alt="{{ __('Banner quảng cáo Back to School') }}" class="w-full h-auto object-contain"
                onerror="this.onerror=null;this.src='https://placehold.co/1920x50/e53e3e/ffffff?text=Banner+Quang+Cao';">
        </a>
    </div>

    <!-- 2. Thanh điều hướng chính -->
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between gap-4 py-3">

            <!-- Nút mở menu mobile và Logo -->
            <div class="flex items-center gap-4">
                <button id="open-menu-btn" class="lg:hidden text-gray-600 hover:text-primary-500">
                    <svg class="w-6 h-6" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M16 132h416c8.8 0 16-7.2 16-16V84c0-8.8-7.2-16-16-16H16C7.2 68 0 75.2 0 84v32c0 8.8 7.2 16 16 16zm416 56H16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm0 128H16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="hidden lg:block flex-shrink-0">
                    <img class="h-10 md:h-14 w-auto" src="{{ asset('img/logo.png') }}"
                        alt="{{ __('Logo QuocViet Computer') }}"
                        onerror="this.onerror=null;this.src='{{ asset('img/logo-placeholder.png') }}';">
                </a>
            </div>

            <!-- Thanh tìm kiếm (Desktop) -->
            <div class="hidden lg:flex relative flex-grow mx-4">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-400" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="M505 442.7L405.3 343c28.3-34.9 45.2-79 45.2-127C450.5 96.5 354 0 225.2 0S0 96.5 0 216.1s96.5 216.1 216.1 216.1c48 0 92.1-16.9 127-45.2l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 0-33.9zM216.1 368.2c-84 0-152.1-68.1-152.1-152.1S132.1 64 216.1 64s152.1 68.1 152.1 152.1-68.1 152.1-152.1 152.1z">
                        </path>
                    </svg>
                </span>
                <input type="text" placeholder="{{ __('Bạn muốn mua gì hôm nay?') }}"
                    class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-shadow text-sm">
            </div>

            <!-- Các nút chức năng -->
            <div class="flex items-center gap-3">
                <a href="#"
                    class="flex items-center justify-center gap-2 w-10 h-10 lg:w-auto lg:h-auto lg:px-4 lg:py-2.5 rounded-full lg:rounded-lg bg-primary-600 text-white hover:bg-primary-700 transition-colors duration-300">
                    <svg class="w-5 h-5" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="headset"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="M256 48C141.1 48 48 141.1 48 256v80c0 26.5 21.5 48 48 48h16c8.8 0 16-7.2 16-16v-96c0-8.8-7.2-16-16-16H96v-16c0-88.2 71.8-160 160-160s160 71.8 160 160v16h-32c-8.8 0-16 7.2-16 16v96c0 8.8 7.2 16 16 16h16c26.5 0 48-21.5 48-48v-80c0-114.9-93.1-208-208-208z">
                        </path>
                    </svg>
                    <span
                        class="hidden lg:inline font-medium text-sm whitespace-nowrap">{{ __('Tư vấn Game - Net') }}</span>
                </a>
                <a href="#"
                    class="flex items-center justify-center gap-2 w-10 h-10 lg:w-auto lg:h-auto lg:px-4 lg:py-2.5 rounded-full lg:rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-primary-500 transition-colors duration-300">
                    <svg class="w-5 h-5" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="desktop"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor"
                            d="M528 0H48C21.5 0 0 21.5 0 48v320c0 26.5 21.5 48 48 48h192v32h-64c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h256c8.8 0 16-7.2 16-16v-16c0-8.8-7.2-16-16-16h-64v-32h192c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zm0 368H48V48h480v320z">
                        </path>
                    </svg>
                    <span
                        class="hidden lg:inline font-medium text-sm text-gray-800 hover:bg-gray-100 hover:text-primary-500 whitespace-nowrap">{{ __('Build PC') }}</span>
                </a>
                <a href="#"
                    class="flex items-center justify-center gap-2 w-10 h-10 lg:w-auto lg:h-auto lg:px-4 lg:py-2.5 rounded-full lg:rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-primary-500 transition-colors duration-300">
                    <svg class="w-5 h-5" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="shopping-cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor"
                            d="M528.12 301.319l47.273-208A16 16 0 0 0 560 80H128l-9.4-47.319A16 16 0 0 0 103.319 32H16A16 16 0 0 0 0 48v16a16 16 0 0 0 16 16h70.319l70.4 353.319A16 16 0 0 0 172.319 448h295.362a16 16 0 0 0 15.6-12.681l47.273-208zM172.319 400l-44.8-224h352.96l-44.8 224H172.319z">
                        </path>
                    </svg>
                    <span
                        class="hidden lg:inline font-medium text-sm text-gray-800 hover:bg-gray-100 hover:text-primary-500 whitespace-nowrap">{{ __('Giỏ hàng') }}</span>
                </a>
                <span id="cart-count"
                    class="absolute -top-1 -right-1 items-center justify-center w-5 h-5 bg-primary-600 text-white text-xs font-bold rounded-full hidden">0</span>
                <div class="relative">
                </div>
                @guest
                    <a href="{{ route('login') }}"
                        class="flex items-center justify-center gap-2 w-10 h-10 lg:w-auto lg:h-auto lg:px-4 lg:py-2.5 rounded-full lg:rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-primary-500 transition-colors duration-300">
                        <svg class="w-5 h-5" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-in-alt"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M497 273l-96-96c-15-15-41-4.5-41 17v65H176c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h184v65c0 21.5 26 32 41 17l96-96c9.4-9.4 9.4-24.6 0-34zM176 80h16c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16zm0 352h16c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16v-48c0-8.8 7.2-16 16-16z">
                            </path>
                        </svg>
                        <span
                            class="hidden lg:inline font-medium text-sm text-gray-800 hover:bg-gray-100 hover:text-primary-500">{{ __('Đăng nhập') }}</span>
                    </a>
                @endguest

                @auth
                    <!-- Settings Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center justify-center gap-2 w-10 h-10 lg:w-auto lg:h-auto lg:px-4 lg:py-2.5 rounded-full lg:rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-primary-500 transition-colors duration-300">
                                <svg class="w-5 h-5" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 0 0 0 256zm89.6 32h-17.8c-22.2 10.2-46.7 16-71.8 16s-49.6-5.8-71.8-16h-17.8C100.3 288 64 324.3 64 368v48c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48v-48c0-43.7-36.3-80-80-80z">
                                    </path>
                                </svg>
                                <div
                                    class="hidden lg:inline font-medium text-sm text-gray-800 hover:bg-gray-100 hover:text-primary-500">
                                    {{ Auth::user()->name }}</div>
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
            </div>
        </div>
    </div>

    <!-- Thanh tìm kiếm (Mobile) -->
    <div class="lg:hidden px-4 pb-3">
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M505 442.7L405.3 343c28.3-34.9 45.2-79 45.2-127C450.5 96.5 354 0 225.2 0S0 96.5 0 216.1s96.5 216.1 216.1 216.1c48 0 92.1-16.9 127-45.2l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 0-33.9zM216.1 368.2c-84 0-152.1-68.1-152.1-152.1S132.1 64 216.1 64s152.1 68.1 152.1 152.1-68.1 152.1-152.1 152.1z">
                    </path>
                </svg>
            </span>
            <input type="text" placeholder="{{ __('Bạn muốn mua gì hôm nay?') }}"
                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-shadow text-sm">
        </div>
    </div>
</header>
