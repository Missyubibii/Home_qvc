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
        Schema::create('products', function (Blueprint $table) {
            // 1. Khóa chính theo chuẩn Laravel
            $table->id();

            // 2. Cột tham chiếu ID từ bảng cũ (idv_sell_product_store)
            $table->unsignedInteger('legacy_id')->unique()->nullable()->comment('ID từ bảng idv_sell_product_store');

            // 3. Thông tin cơ bản (từ idv_sell_product_store)
            $table->string('name');
            $table->string('slug')->unique()->comment('Tương đương cột url');
            $table->string('sku')->unique()->nullable()->comment('Tương đương cột storeSKU');
            $table->text('summary')->nullable()->comment('Tương đương cột proSummary');

            // 4. Thông tin chi tiết (từ idv_sell_product_info)
            $table->longText('description')->nullable();
            $table->json('specifications')->nullable()->comment('Tương đương cột spec, lưu dưới dạng JSON');

            // 5. Thông tin giá và kho (từ idv_sell_product_price)
            $table->decimal('price', 15, 2)->default(0);
            $table->decimal('old_price', 15, 2)->nullable()->comment('Giá cũ để hiển thị khuyến mãi');
            $table->integer('quantity')->default(0);

            // 6. Thông tin SEO (từ idv_sell_product_store)
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            // 7. Các trạng thái
            $table->boolean('is_active')->default(true)->comment('Trạng thái bật/tắt chung');
            $table->boolean('is_featured')->default(false)->comment('Sản phẩm nổi bật');
            $table->boolean('online_only')->default(false)->comment('Chỉ bán online');

            // 8. Timestamps và Soft Deletes
            $table->timestamps(); // Tự động tạo created_at và updated_at
            $table->softDeletes(); // Tự động tạo deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};