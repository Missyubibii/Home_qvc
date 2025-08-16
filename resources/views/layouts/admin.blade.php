{{-- <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="flex">
        @include('layouts.admin-navigation')

        <div class="flex-1 ml-64">
            <!-- Header -->
            <header class="bg-white shadow-sm z-20">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <button id="open-sidebar-btn" class="md:hidden text-gray-500 hover:text-gray-700"><i
                                data-lucide="menu" class="h-6 w-6"></i></button>
                        <div class="hidden md:block relative"><i data-lucide="search"
                                class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400"></i><input
                                type="text" placeholder="Tìm kiếm đơn hàng, sản phẩm..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500/50">
                        </div>
                        <div class="flex items-center gap-4">
                            <button class="text-gray-500 hover:text-gray-700 relative"><i data-lucide="bell"
                                    class="h-6 w-6"></i><span
                                    class="absolute -top-1 -right-1 h-3 w-3 bg-red-500 rounded-full border-2 border-white"></span></button>
                            <div class="relative">
                                <button id="profile-btn" class="flex items-center gap-2">
                                    <span class="hidden md:inline font-semibold text-sm text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</span>
                                    <i data-lucide="chevron-down" class="h-4 w-4 text-gray-500"></i></button>
                                <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-1 hidden">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tài khoản</a>
                                    <form action="{{ route('logout') }}" method="POST" class="inline">
                                        @csrf
                                        <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left">Đăng xuất</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html> --}}

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ Thống Quản Trị</title>
    <!-- Tích hợp Tailwind CSS qua CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tích hợp Lucide Icons qua CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Tích hợp Chart.js để vẽ biểu đồ -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body,
        input,
        select,
        textarea,
        button {
            font-family: 'Inter', sans-serif;
        }

        /* Style cho scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }

        .sidebar-link.active {
            background-color: #ef4444;
            /* red-500 */
            color: white;
            font-weight: 600;
        }

        /* Styles cho modal nhận định AI */
        #insights-content ul {
            list-style-type: disc;
            padding-left: 1.5rem;
        }

        #insights-content li {
            margin-bottom: 0.75rem;
        }

        #insights-content strong {
            font-weight: 600;
            color: #1f2937;
        }

        /* Styles cho thông báo */
        #notification-toast.error {
            background-color: #ef4444;
        }

        /* red-500 */
        #notification-toast.success {
            background-color: #22c55e;
        }

        /* green-500 */
    </style>
</head>

<body >
    <div class="flex h-screen bg-gray-100">

        @include('layouts.admin-navigation')

        <div class="flex-1 flex flex-col overflow-hidden md:ml-64">
            <!-- Header -->
            <header class="bg-white shadow-sm z-20">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <button id="open-sidebar-btn" class="md:hidden text-gray-500 hover:text-gray-700"><i
                                data-lucide="menu" class="h-6 w-6"></i></button>
                        <div class="hidden md:block relative"><i data-lucide="search"
                                class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400"></i><input
                                type="text" placeholder="Tìm kiếm đơn hàng, sản phẩm..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500/50">
                        </div>
                        <div class="flex items-center gap-4">
                            <button class="text-gray-500 hover:text-gray-700 relative"><i data-lucide="bell"
                                    class="h-6 w-6"></i><span
                                    class="absolute -top-1 -right-1 h-3 w-3 bg-red-500 rounded-full border-2 border-white"></span></button>
                            <div class="relative">
                                <button id="profile-btn" class="flex items-center gap-2">
                                    <span class="hidden md:inline font-semibold text-sm text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</span>
                                    <i data-lucide="chevron-down" class="h-4 w-4 text-gray-500"></i></button>
                                <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-1 hidden">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tài khoản</a>
                                    <form action="{{ route('logout') }}" method="POST" class="inline">
                                        @csrf
                                        <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đăng xuất</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- CÁC TRANG NỘI DUNG -->
            <div id="page-content" class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-4 sm:p-6 lg:p-8">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
        document.addEventListener('DOMContentLoaded', function() {
            // --- Logic chung & Điều hướng ---
            const profileBtn = document.getElementById('profile-btn');
            const profileDropdown = document.getElementById('profile-dropdown');
            const openSidebarBtn = document.getElementById('open-sidebar-btn');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            const pages = document.querySelectorAll('.page');

            profileBtn.addEventListener('click', () => profileDropdown.classList.toggle('hidden'));
            document.addEventListener('click', (e) => {
                if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) profileDropdown
                    .classList.add('hidden');
            });
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

            function switchPage(hash) {
                const targetPageId = hash.substring(1) + '-page';
                pages.forEach(page => page.classList.toggle('hidden', page.id !== targetPageId));
                sidebarLinks.forEach(link => link.classList.toggle('active', link.hash === hash));
                if (window.innerWidth < 768) closeSidebar();
            }
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    history.pushState(null, '', this.href);
                    switchPage(this.hash);
                });
            });
            window.addEventListener('popstate', () => switchPage(location.hash || '#dashboard'));
            switchPage(location.hash || '#dashboard');

            // Nhận định nhanh từ Dashboard
            document.getElementById('get-insights-btn').addEventListener('click', async () => {
                const mockData = {
                    totalRevenue: "1,250,000đ",
                    newOrders: 32,
                    topSellingCategory: "Laptop",
                    slowestSellingCategory: "Phụ kiện",
                    recentSalesTrend: "Tăng nhẹ"
                };
                const prompt =
                    `Với vai trò là một chuyên gia phân tích dữ liệu, hãy đưa ra nhận định và gợi ý hành động dựa trên các số liệu sau của một cửa hàng máy tính. Viết dưới dạng gạch đầu dòng, ngắn gọn, dễ hiểu.\n- Tổng doanh thu: ${mockData.totalRevenue}\n- Đơn hàng mới: ${mockData.newOrders}\n- Danh mục bán chạy nhất: ${mockData.topSellingCategory}\n- Danh mục bán chậm nhất: ${mockData.slowestSellingCategory}\n- Xu hướng doanh thu gần đây: ${mockData.recentSalesTrend}\n\nĐưa ra 2-3 gợi ý cụ thể mà chủ cửa hàng có thể thực hiện ngay.`;
                const insights = await callGemini(prompt, document.getElementById('get-insights-btn'));
                if (insights) {
                    openInsightsModal(insights);
                }
            });

            // --- Logic cho biểu đồ (Chart.js) ---
            const salesCtx = document.getElementById('salesChart')?.getContext('2d');
            if (salesCtx) new Chart(salesCtx, {
                type: 'line',
                data: {
                    labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                    datasets: [{
                        label: 'Doanh thu',
                        data: [65, 59, 80, 81, 56, 55, 40],
                        fill: false,
                        borderColor: '#ef4444',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });


            const categoryCtx = document.getElementById('categoryChart')?.getContext('2d');
            if (categoryCtx) new Chart(categoryCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Laptop', 'Linh kiện', 'Màn hình', 'Phụ kiện'],
                    datasets: [{
                        label: 'Số lượng',
                        data: [300, 50, 100, 120],
                        backgroundColor: ['#ef4444', '#3b82f6', '#22c55e', '#f59e0b'],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>
