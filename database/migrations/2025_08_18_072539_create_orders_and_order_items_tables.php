<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Bảng Orders
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('legacy_id')->unique()->nullable()->comment('ID từ bảng idv_seller_order');

            // Thông tin cơ bản & khách hàng
            $table->string('order_code')->unique()->comment('Tương đương orderKey');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->comment('Tương đương buyerId');
            $table->string('customer_name')->comment('Tương đương buyerName');
            $table->string('customer_email')->comment('Tương đương buyerEmail');
            $table->string('customer_phone')->comment('Tương đương buyerInfo hoặc customer.tel');
            $table->text('shipping_address')->comment('Tương đương shipping_address');

            // Ghi chú từ khách & nội bộ
            $table->text('customer_note')->nullable()->comment('Tương đương buyerInstruction');
            $table->text('admin_note')->nullable()->comment('Ghi chú nội bộ của nhân viên');

            // Chi tiết giá cả
            $table->decimal('subtotal', 15, 2)->comment('Tổng tiền hàng trước phí');
            $table->decimal('shipping_fee', 15, 2)->default(0.00)->comment('Tương đương shippingFee');
            $table->string('coupon_code')->nullable()->comment('Mã giảm giá');
            $table->enum('discount_type', ['fixed', 'percentage'])->nullable()->comment('Loại giảm giá: fixed hoặc percentage');
            $table->decimal('discount_amount', 15, 2)->default(0.00)->comment('Giá trị giảm giá');
            $table->decimal('tax_amount', 15, 2)->default(0.00)->comment('Thuế VAT');
            $table->decimal('total_amount', 15, 2)->comment('Tổng giá trị đơn hàng sau cùng');

            // Trạng thái đơn hàng & thanh toán
            $table->string('payment_method')->default('COD')->comment('Tương đương payMethod');
            $table->enum('payment_status', ['unpaid', 'paid', 'refunded'])->default('unpaid')->comment('Tương đương payStatus');
            $table->enum('status', ['pending', 'processing', 'shipped', 'completed', 'cancelled'])->default('pending')->comment('Tương đương system_status');

            // Vận chuyển
            $table->string('shipping_method')->nullable()->comment('Tên đơn vị vận chuyển như GHTK, Viettel Post...');
            $table->string('tracking_code')->nullable()->comment('Mã vận đơn');

            // Thời gian
            $table->timestamps(); // created_at = order_time
        });

        // Bảng Order Items
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('legacy_id')->unique()->nullable()->comment('ID từ bảng idv_seller_order_detail');
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained('products')->nullOnDelete()->comment('Tương đương item_id');

            $table->string('product_name')->comment('Tên sản phẩm');
            $table->unsignedInteger('quantity');
            $table->decimal('price', 15, 2)->comment('Giá sản phẩm');
            $table->timestamps();
        });

        // Bảng Order History
        Schema::create('order_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();

            $table->string('from_status')->nullable()->comment('Trạng thái cũ');
            $table->string('to_status')->comment('Trạng thái mới');
            $table->string('changed_by')->nullable()->comment('Người thay đổi (tên hoặc ID nhân viên)');
            $table->text('note')->nullable()->comment('Ghi chú thêm');

            $table->timestamp('changed_at')->useCurrent()->comment('Thời gian thay đổi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_history');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
