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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('legacy_id')->unique()->nullable()->comment('ID từ bảng idv_attribute');

            $table->string('name');
            $table->string('slug')->unique();
            // Kiểu hiển thị: select, color, button...
            $table->string('type')->default('select');
            $table->boolean('is_filterable')->default(false)->comment('Có dùng để lọc sản phẩm không?');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
