<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'legacy_id',
        'name',
        'slug',
        'sku',
        'summary',
        'description',
        'price',
        'old_price',
        'quantity',
        'meta_title',
        'meta_description',
        'created_at',
        'updated_at',
        'brand_id',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'old_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Lấy khóa route cho model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Các relationships (giữ nguyên)
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        // Laravel sẽ tự động tìm bảng trung gian là 'category_product'
        return $this->belongsToMany(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // public function attributeValues()
    // {
    //     return $this->belongsToMany(AttributeValue::class, 'attribute_value_product');
    // }
}

