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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="hidden lg:block flex-shrink-0">
                    <img class="h-10 md:h-14 w-auto"
                        src="{{ asset('img/logo.png') }}"
                        alt="{{ __('Logo QuocViet Computer') }}"
                        onerror="this.onerror=null;this.src='{{ asset('img/logo-placeholder.png') }}';">
                </a>
            </div>

            <!-- Thanh tìm kiếm (Desktop) -->
            <div class="hidden lg:flex relative flex-grow mx-4">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
                </span>
                <input type="text" placeholder="{{ __('Bạn muốn mua gì hôm nay?') }}" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-shadow text-sm">
            </div>

            <!-- Các nút chức năng -->
            <div class="flex items-center gap-3">
                <a href="#" class="flex items-center justify-center gap-2 w-10 h-10 lg:w-auto lg:h-auto lg:px-4 lg:py-2.5 rounded-full lg:rounded-lg bg-primary-600 text-white hover:bg-primary-700 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                    <span class="hidden lg:inline font-medium text-sm whitespace-nowrap">{{ __('Tư vấn Game - Net') }}</span>
                </a>
                <a href="#" class="flex items-center justify-center gap-2 w-10 h-10 lg:w-auto lg:h-auto lg:px-4 lg:py-2.5 rounded-full lg:rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-primary-500 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="hidden lg:inline font-medium text-sm text-gray-800 hover:bg-gray-100 hover:text-primary-500 whitespace-nowrap">{{ __('Build PC') }}</span>
                </a>
                <div class="relative">
                    @auth
                    <a href="#" class="flex items-center justify-center gap-2 w-10 h-10 lg:w-auto lg:h-auto lg:px-4 lg:py-2.5 rounded-full lg:rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-primary-500 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span class="hidden lg:inline font-medium text-sm text-gray-800 hover:bg-gray-100 hover:text-primary-500">{{ __('Giỏ hàng') }}</span>
                    </a>
                    <span id="cart-count" class="absolute -top-1 -right-1 items-center justify-center w-5 h-5 bg-primary-600 text-white text-xs font-bold rounded-full hidden">0</span>
                    @endauth
                </div>
                @guest
                <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 w-10 h-10 lg:w-auto lg:h-auto lg:px-4 lg:py-2.5 rounded-full lg:rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-primary-500 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <span class="hidden lg:inline font-medium text-sm text-gray-800 hover:bg-gray-100 hover:text-primary-500">{{ __('Đăng nhập') }}</span>
                </a>
                @endguest

                @auth
                <!-- Settings Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center justify-center gap-2 w-10 h-10 lg:w-auto lg:h-auto lg:px-4 lg:py-2.5 rounded-full lg:rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-primary-500 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <div class="hidden lg:inline font-medium text-sm text-gray-800 hover:bg-gray-100 hover:text-primary-500">{{ Auth::user()->name }}</div>
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
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
            </span>
            <input type="text" placeholder="{{ __('Bạn muốn mua gì hôm nay?') }}" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-shadow text-sm">
        </div>
    </div>
</header>
