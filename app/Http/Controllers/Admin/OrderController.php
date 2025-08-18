<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Hiển thị danh sách đơn hàng
     */
    public function index(Request $request)
    {
        $query = Order::query();

        // Tìm kiếm theo mã đơn, tên KH, email
        if ($search = $request->input('search')) {
            $query->where('order_code', 'like', "%$search%")
                ->orWhere('customer_name', 'like', "%$search%")
                ->orWhere('customer_email', 'like', "%$search%");
        }

        $orders = $query->latest()->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Hiển thị chi tiết đơn hàng
     */
    public function show(Order $order)
    {
        $order->load(['items.product', 'user', 'histories']);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Trang chỉnh sửa đơn hàng
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Cập nhật trạng thái đơn hàng
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,completed,cancelled',
        ]);

        $oldStatus = $order->status;
        $newStatus = $request->input('status');

        if ($oldStatus === $newStatus) {
            return redirect()->route('admin.orders.show', $order)
                ->with('success', 'Trạng thái đơn hàng không thay đổi.');
        }

        // Cập nhật trạng thái đơn hàng
        $order->status = $newStatus;
        $order->save();

        // Ghi log lịch sử
        OrderHistory::create([
            'order_id'   => $order->id,
            'from_status'=> $oldStatus,
            'to_status'  => $newStatus,
            'changed_by' => Auth::check() ? Auth::user()->name : 'System',
            'note'       => $request->input('note'),
            'changed_at' => now(),
        ]);

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }

    /**
     * Xóa đơn hàng
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được xóa!');
    }
}
