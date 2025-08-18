<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'legacy_id',
        'product_id',
        'path',
        'alt',
        'order',
        'is_thumbnail',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_thumbnail' => 'boolean',
    ];

    // Định nghĩa mối quan hệ: Một ảnh thuộc về một sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}