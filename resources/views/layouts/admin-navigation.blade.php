<aside id="sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-slate-900 border-r md:translate-x-0">
    <div class="px-6 py-4 border-b">
        <a href="#" class="flex items-center gap-3">
            <i data-lucide="shield-check" class="text-red-500 h-8 w-8"></i>
            <span class="text-gray-300 text-lg font-bold">Hệ thống quản trị</span>
        </a>
    </div>
    <nav id="sidebar-nav" class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-300 hover:bg-red-500 transition-colors {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i
                data-lucide="layout-dashboard" class="h-5 w-5"></i><span>Trang chính</span></a>
        <p class="px-4 pt-4 pb-2 text-xs font-semibold text-gray-500 uppercase">Quản lý</p>
        <a href="{{ route('admin.products.index') }}"
            class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-300 hover:bg-red-500 transition-colors {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"><i
                data-lucide="package" class="h-5 w-5"></i><span>Sản phẩm</span></a>
        <a href="{{ route('admin.categories.index') }}"
            class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-300 hover:bg-red-500 transition-colors {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"><i
                data-lucide="folder-tree" class="h-5 w-5"></i><span>Danh mục</span></a>
        <a href="#customers"
            class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-300 hover:bg-red-500 transition-colors"><i
                data-lucide="users" class="h-5 w-5"></i><span>Khách hàng</span></a>
        <a href="#staff"
            class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-300 hover:bg-red-500 transition-colors"><i
                data-lucide="user-cog" class="h-5 w-5"></i><span>Nhân viên</span></a>
        <a href="{{ route('admin.orders.index') }}"
            class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-300 hover:bg-red-500 transition-colors"><i
                data-lucide="shopping-cart" class="h-5 w-5"></i><span>Đơn hàng</span></a>
        <p class="px-4 pt-4 pb-2 text-xs font-semibold text-gray-500 uppercase">Hệ thống</p>
        <a href="#settings"
            class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-300 hover:bg-red-500 transition-colors"><i
                data-lucide="settings" class="h-5 w-5"></i><span>Cài đặt</span></a>
    </nav>
</aside>
