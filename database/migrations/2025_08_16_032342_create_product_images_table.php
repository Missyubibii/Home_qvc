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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();

            // Cột tham chiếu ID từ bảng cũ (idv_sell_product_image_name)
            $table->unsignedInteger('legacy_id')->unique()->nullable()->comment('ID từ bảng idv_sell_product_image_name');

            // Khóa ngoại liên kết với bảng products
            // constrained() sẽ tự động tham chiếu đến id của bảng products
            // onDelete('cascade') sẽ tự động xóa tất cả ảnh nếu sản phẩm bị xóa vĩnh viễn
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            // Thông tin về ảnh
            $table->string('path')->comment('Đường dẫn tới file ảnh');
            $table->string('alt')->nullable()->comment('Văn bản thay thế cho ảnh (SEO)');
            $table->integer('order')->default(0)->comment('Thứ tự hiển thị của ảnh');
            $table->boolean('is_thumbnail')->default(false)->comment('Đánh dấu ảnh đại diện');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
