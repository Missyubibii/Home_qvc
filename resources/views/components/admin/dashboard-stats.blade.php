@props(['totalRevenue' => '1,250,000đ', 'newOrders' => 32, 'newCustomers' => 15, 'totalProducts' => 256])

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-md flex items-center gap-6">
        <div class="bg-red-100 text-red-600 p-4 rounded-full">
            <img src="{{ asset('icon/resources/svg/dollar.svg') }}" class="h-8 w-8">
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Tổng doanh thu</p>
            <p class="text-2xl font-bold text-gray-800">{{ $totalRevenue }}</p>
        </div>
    </div>

    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-md flex items-center gap-6">
        <div class="bg-blue-100 text-blue-600 p-4 rounded-full">
            <img src="{{ asset('icon/resources/svg/cart.svg') }}" class="h-8 w-8">
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Đơn hàng mới</p>
            <p class="text-2xl font-bold text-gray-800">{{ $newOrders }}</p>
        </div>
    </div>

    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-md flex items-center gap-6">
        <div class="bg-green-100 text-green-600 p-4 rounded-full">
            <img src="{{ asset('icon/resources/svg/users.svg') }}" class="h-8 w-8">
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Khách hàng mới</p>
            <p class="text-2xl font-bold text-gray-800">{{ $newCustomers }}</p>
        </div>
    </div>

    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-md flex items-center gap-6">
        <div class="bg-yellow-100 text-yellow-600 p-4 rounded-full">
            <img src="{{ asset('icon/resources/svg/package.svg') }}" class="h-8 w-8">
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Sản phẩm</p>
            <p class="text-2xl font-bold text-gray-800">{{ $totalProducts }}</p>
        </div>
    </div>
</div>
