<aside id="sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-white border-r md:translate-x-0">
    <div class="px-6 py-4 border-b">
        <a href="#" class="flex items-center gap-3">
            <i data-lucide="shield-check" class="text-red-500 h-8 w-8"></i>
            <span class="text-gray-800 text-lg font-bold">Admin Panel</span>
        </a>
    </div>
    <nav id="sidebar-nav" class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg active"><i
                data-lucide="layout-dashboard" class="h-5 w-5"></i><span>Dashboard</span></a>
        <p class="px-4 pt-4 pb-2 text-xs font-semibold text-gray-500 uppercase">Quản lý</p>
        <a href="{{ route('admin.products.index') }}"
            class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-gray-100 transition-colors"><i
                data-lucide="package" class="h-5 w-5"></i><span>Sản phẩm</span></a>
        <a href="#categories"
            class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-gray-100 transition-colors"><i
                data-lucide="folder-tree" class="h-5 w-5"></i><span>Danh mục</span></a>
        <a href="#customers"
            class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-gray-100 transition-colors"><i
                data-lucide="users" class="h-5 w-5"></i><span>Khách hàng</span></a>
        <a href="#staff"
            class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-gray-100 transition-colors"><i
                data-lucide="user-cog" class="h-5 w-5"></i><span>Nhân viên</span></a>
        <a href="#orders"
            class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-gray-100 transition-colors"><i
                data-lucide="shopping-cart" class="h-5 w-5"></i><span>Đơn hàng</span></a>
        <p class="px-4 pt-4 pb-2 text-xs font-semibold text-gray-500 uppercase">Hệ thống</p>
        <a href="#settings"
            class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-gray-100 transition-colors"><i
                data-lucide="settings" class="h-5 w-5"></i><span>Cài đặt</span></a>
    </nav>
    <div class="px-6 py-4 border-t">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-gray-100 transition-colors w-full">
                <i data-lucide="log-out" class="h-5 w-5"></i><span>Đăng xuất</span>
            </button>
        </form>
    </div>
</aside>
