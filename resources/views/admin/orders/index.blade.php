@extends('layouts.admin')

@section('title', 'Quản lý Đơn hàng')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Quản lý Đơn hàng</h1>
            <p class="text-sm text-gray-500 mt-1">Theo dõi và xử lý các đơn hàng của khách hàng.</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        @if (session('success'))
            <div id="success-alert"
                class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
                role="alert">
                <i data-lucide="check-circle-2" class="h-5 w-5 mr-3"></i>
                <div><span class="font-medium">Thành công!</span> {{ session('success') }}</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200"
                    onclick="document.getElementById('success-alert').style.display='none'">
                    <i data-lucide="x" class="h-5 w-5"></i>
                </button>
            </div>
        @endif

        <!-- Form tìm kiếm -->
        <div class="mb-6">
            <form action="{{ route('admin.orders.index') }}" method="GET">
                <div class="flex items-center">
                    <div class="relative w-full md:w-1/2 lg:w-1/3">
                        <input type="text" name="search" placeholder="Tìm theo mã đơn, tên, email khách hàng..."
                            class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                            value="{{ request('search') }}">
                        <button type="submit"
                            class="absolute inset-y-0 right-0 px-4 flex items-center text-gray-500 hover:text-red-600">
                            <i data-lucide="search" class="h-5 w-5"></i>
                        </button>
                    </div>
                    @if (request('search'))
                        <a href="{{ route('admin.orders.index') }}"
                            class="ml-4 text-sm text-gray-600 hover:text-gray-900 whitespace-nowrap">Xóa bộ lọc</a>
                    @endif
                </div>
            </form>
        </div>

        <div class="overflow-x-auto border rounded-lg">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Mã Đơn Hàng</th>
                        <th scope="col" class="px-6 py-3">Khách Hàng</th>
                        <th scope="col" class="px-6 py-3">Ngày Đặt</th>
                        <th scope="col" class="px-6 py-3">Tổng Tiền</th>
                        <th scope="col" class="px-6 py-3">Trạng Thái</th>
                        <th scope="col" class="px-6 py-3">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">
                                <a href="{{ route('admin.orders.show', $order) }}"
                                    class="hover:text-red-600 hover:underline">
                                    #{{ $order->order_code }}
                                </a>
                            </td>
                            <td class="px-6 py-4">{{ $order->customer_name }}</td>
                            <td class="px-6 py-4">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4">{{ number_format($order->total_amount, 0, ',', '.') }} đ</td>
                            <td class="px-6 py-4">
                                @php
                                    $statusClasses = [
                                        'pending'   => 'bg-yellow-100 text-yellow-800',
                                        'processing'=> 'bg-blue-100 text-blue-800',
                                        'shipped'   => 'bg-indigo-100 text-indigo-800',
                                        'completed' => 'bg-green-100 text-green-800',
                                        'cancelled' => 'bg-red-100 text-red-800',
                                    ];
                                    $statusClass = $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-800';
                                @endphp

                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <!-- Xem chi tiết (kiêm cập nhật trạng thái) -->
                                    <a href="{{ route('admin.orders.show', $order) }}"
                                        class="text-blue-500 hover:text-blue-700" title="Chi tiết & Cập nhật trạng thái">
                                        <i data-lucide="eye" class="h-5 w-5"></i>
                                    </a>
                                    <!-- Xóa -->
                                    <form id="delete-form-{{ $order->id }}"
                                        action="{{ route('admin.orders.destroy', $order) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            onclick="showConfirmModal('delete-form-{{ $order->id }}', 'Xác nhận xóa', 'Bạn có chắc chắn muốn xóa đơn hàng #{{ $order->order_code }}?')"
                                            class="text-red-500 hover:text-red-700" title="Xóa">
                                            <i data-lucide="trash-2" class="h-5 w-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                {{ request('search') ? 'Không tìm thấy đơn hàng nào.' : 'Chưa có đơn hàng nào.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>

    @include('layouts.partials.confirmation-modal')
@endsection
