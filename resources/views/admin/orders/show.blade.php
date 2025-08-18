@extends('layouts.admin')

@section('title', 'Chi tiết Đơn hàng #' . $order->order_code)

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Chi tiết Đơn hàng #{{ $order->order_code }}</h1>
            <p class="text-sm text-gray-500 mt-1">Ngày đặt: {{ $order->created_at->format('d/m/Y H:i') }}</p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 flex items-center gap-2">
            <i data-lucide="arrow-left" class="h-5 w-5"></i>
            <span>Quay lại danh sách</span>
        </a>
    </div>

    @if (session('success'))
        <div id="success-alert" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <i data-lucide="check-circle-2" class="h-5 w-5 mr-3"></i>
            <div><span class="font-medium">Thành công!</span> {{ session('success') }}</div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Cột trái: Chi tiết sản phẩm & tính toán --}}
        <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Các sản phẩm trong đơn</h2>
            <div class="space-y-4">
                @foreach($order->items as $item)
                <div class="flex items-center gap-4 border-b pb-4 last:border-b-0">
                    <img src="{{ $item->product && $item->product->images->isNotEmpty() ? asset('media/product/' . $item->product->images->first()->path) : 'https://placehold.co/80x80/e2e8f0/a0aec0?text=N/A' }}" alt="{{ $item->product_name }}" class="w-20 h-20 object-cover rounded-md">
                    <div class="flex-1">
                        <a href="{{ $item->product ? route('product.public.show', $item->product->slug) : '#' }}" class="font-semibold text-gray-900 hover:text-red-600" target="_blank">{{ $item->product_name }}</a>
                        <p class="text-sm text-gray-500">Số lượng: {{ $item->quantity }}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold">{{ number_format($item->price * $item->quantity, 0, ',', '.') }} đ</p>
                        <p class="text-sm text-gray-500">({{ number_format($item->price, 0, ',', '.') }} đ/sp)</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="border-t mt-6 pt-4 space-y-2">
                <div class="flex justify-between"><span>Tổng tiền hàng:</span> <span>{{ number_format($order->subtotal, 0, ',', '.') }} đ</span></div>
                <div class="flex justify-between"><span>Phí vận chuyển:</span> <span>{{ number_format($order->shipping_fee, 0, ',', '.') }} đ</span></div>
                <div class="flex justify-between text-green-600">
                    <span>Giảm giá ({{ $order->coupon_code ?? 'Không có' }}):</span>
                    <span>- {{ number_format($order->discount_amount, 0, ',', '.') }} đ</span>
                </div>
                <div class="flex justify-between"><span>Thuế (VAT):</span> <span>{{ number_format($order->tax_amount, 0, ',', '.') }} đ</span></div>
                <div class="flex justify-between font-bold text-lg border-t pt-2 mt-2"><span>Tổng cộng:</span> <span class="text-red-600">{{ number_format($order->total_amount, 0, ',', '.') }} đ</span></div>
            </div>
        </div>

        {{-- Cột phải: Thông tin khách hàng & trạng thái --}}
        <div class="lg:col-span-1 space-y-6" x-data="{ openHistory: false }">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Thông tin khách hàng</h2>
                <div class="space-y-2 text-sm">
                    <p><strong>Tên:</strong> {{ $order->customer_name }}</p>
                    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                    <p><strong>SĐT:</strong> {{ $order->customer_phone }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $order->shipping_address }}</p>
                    @if($order->customer_note)
                        <p><strong>Ghi chú KH:</strong> {{ $order->customer_note }}</p>
                    @endif
                    @if($order->admin_note)
                        <p><strong>Ghi chú nội bộ:</strong> {{ $order->admin_note }}</p>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Trạng thái đơn hàng</h2>
                <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Trạng thái đơn hàng</label>
                        <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                            <option value="pending" @selected($order->status == 'pending')>Chờ xử lý</option>
                            <option value="processing" @selected($order->status == 'processing')>Đang xử lý</option>
                            <option value="shipped" @selected($order->status == 'shipped')>Đã giao hàng</option>
                            <option value="completed" @selected($order->status == 'completed')>Hoàn thành</option>
                            <option value="cancelled" @selected($order->status == 'cancelled')>Đã hủy</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Trạng thái thanh toán</label>
                        <select name="payment_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                            <option value="unpaid" @selected($order->payment_status == 'unpaid')>Chưa thanh toán</option>
                            <option value="paid" @selected($order->payment_status == 'paid')>Đã thanh toán</option>
                            <option value="refunded" @selected($order->payment_status == 'refunded')>Hoàn tiền</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Phương thức vận chuyển</label>
                        <input type="text" name="shipping_method" value="{{ $order->shipping_method }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mã vận đơn</label>
                        <input type="text" name="tracking_code" value="{{ $order->tracking_code }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ghi chú thay đổi</label>
                        <textarea name="note" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700">Cập nhật</button>
                </form>
            </div>

            {{-- Lịch sử thay đổi trạng thái --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center justify-between">
                    <span>Lịch sử thay đổi</span>
                    <button @click="openHistory = !openHistory" type="button" class="text-gray-500 hover:text-gray-700 flex items-center gap-1 text-sm">
                        <i data-lucide="chevron-down" class="h-4 w-4 transition-transform" :class="openHistory && 'rotate-180'"></i>
                        <span x-text="openHistory ? 'Ẩn' : 'Xem'"></span>
                    </button>
                </h2>

                <div x-show="openHistory" x-transition style="display: none;" class="space-y-3 text-sm">
                    @forelse($order->history as $history)
                        <div class="p-3 bg-gray-50 rounded-md border">
                            <p>
                                <span class="text-gray-500 text-xs">{{ $history->changed_at->format('d/m/Y H:i') }}</span><br>
                                <span class="font-medium text-gray-800">{{ $history->changed_by ?? 'System' }}</span>
                                đã thay đổi trạng thái
                                <span class="px-2 py-1 text-xs font-semibold rounded-full
                                    @switch($history->from_status)
                                        @case('pending') bg-yellow-100 text-yellow-800 @break
                                        @case('processing') bg-blue-100 text-blue-800 @break
                                        @case('shipped') bg-indigo-100 text-indigo-800 @break
                                        @case('completed') bg-green-100 text-green-800 @break
                                        @case('cancelled') bg-red-100 text-red-800 @break
                                    @endswitch">
                                    {{ $history->from_status ?? 'N/A' }}
                                </span>
                                →
                                <span class="px-2 py-1 text-xs font-semibold rounded-full
                                    @switch($history->to_status)
                                        @case('pending') bg-yellow-100 text-yellow-800 @break
                                        @case('processing') bg-blue-100 text-blue-800 @break
                                        @case('shipped') bg-indigo-100 text-indigo-800 @break
                                        @case('completed') bg-green-100 text-green-800 @break
                                        @case('cancelled') bg-red-100 text-red-800 @break
                                    @endswitch">
                                    {{ $history->to_status }}
                                </span>
                            </p>
                            @if($history->note)
                                <p class="text-gray-500 mt-1">Ghi chú: {{ $history->note }}</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">Chưa có thay đổi nào.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
