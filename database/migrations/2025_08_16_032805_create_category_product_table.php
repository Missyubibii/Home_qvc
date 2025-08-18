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
        Schema::create('category_product', function (Blueprint $table) {
            // Khóa ngoại đến bảng categories
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            // Khóa ngoại đến bảng products
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            // Đặt hai cột trên làm khóa chính σύνθετο (composite primary key)
            // để đảm bảo một sản phẩm không thể được thêm vào cùng một danh mục hai lần.
            $table->primary(['category_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_product');
    }
};
