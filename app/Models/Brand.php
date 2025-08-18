<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
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
        'description',
        'image',
        'is_active',
        'order',
    ];

    // Mối quan hệ: Một thương hiệu có nhiều sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}