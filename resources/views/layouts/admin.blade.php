<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hệ Thống Quản Trị') - {{ config('app.name', 'Home QVC') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body, input, select, textarea, button {
            font-family: 'Inter', sans-serif;
        }
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #9ca3af; }
        .sidebar-link.active {
            background-color: #ef4444; /* red-500 */
            color: white;
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">

        @include('layouts.admin-navigation')

        <div class="flex-1 flex flex-col overflow-hidden md:ml-64">
            <!-- Header -->
            <header class="bg-white shadow-sm z-20">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <button id="open-sidebar-btn" class="md:hidden text-gray-500 hover:text-gray-700">
                            <i data-lucide="menu" class="h-6 w-6"></i>
                        </button>
                        <div class="hidden md:block relative">
                            <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400"></i>
                            <input type="text" placeholder="Tìm kiếm..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500/50">
                        </div>
                        <div class="flex items-center gap-4">
                            <button class="text-gray-500 hover:text-gray-700 relative">
                                <i data-lucide="bell" class="h-6 w-6"></i>
                                <span class="absolute -top-1 -right-1 h-3 w-3 bg-red-500 rounded-full border-2 border-white"></span>
                            </button>
                            <div class="relative">
                                <button id="profile-btn" class="flex items-center gap-2">
                                    <span class="hidden md:inline font-semibold text-sm text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</span>
                                    <i data-lucide="chevron-down" class="h-4 w-4 text-gray-500"></i>
                                </button>
                                <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-1 hidden z-30">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tài khoản</a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đăng xuất</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-4 sm:p-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        lucide.createIcons();

        document.addEventListener('DOMContentLoaded', function() {
            // Logic cho Profile Dropdown
            const profileBtn = document.getElementById('profile-btn');
            const profileDropdown = document.getElementById('profile-dropdown');
            if (profileBtn) {
                profileBtn.addEventListener('click', () => profileDropdown.classList.toggle('hidden'));
                document.addEventListener('click', (e) => {
                    if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
                        profileDropdown.classList.add('hidden');
                    }
                });
            }

            // Logic cho Sidebar trên mobile
            const openSidebarBtn = document.getElementById('open-sidebar-btn');
            const sidebar = document.getElementById('sidebar'); // Giả sử sidebar có ID là 'sidebar'
            const sidebarOverlay = document.getElementById('sidebar-overlay'); // Giả sử có overlay

            if (openSidebarBtn && sidebar && sidebarOverlay) {
                const openSidebar = () => {
                    sidebar.classList.remove('-translate-x-full');
                    sidebarOverlay.classList.remove('hidden');
                };
                const closeSidebar = () => {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                };
                openSidebarBtn.addEventListener('click', openSidebar);
                sidebarOverlay.addEventListener('click', closeSidebar);
            }
        });
    </script>

    {{-- ĐÂY LÀ DÒNG QUAN TRỌNG ĐỂ CÁC SCRIPT CON HOẠT ĐỘNG --}}
    @stack('scripts')

</body>
</html>
