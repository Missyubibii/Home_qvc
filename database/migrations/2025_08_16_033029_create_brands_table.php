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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();

            // Cột tham chiếu ID từ bảng cũ (idv_brand)
            $table->unsignedInteger('legacy_id')->unique()->nullable()->comment('ID từ bảng idv_brand');

            // Thông tin cơ bản
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable()->comment('Logo thương hiệu');

            // Trạng thái và thứ tự
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
