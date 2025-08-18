<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'legacy_id',
        'order_code',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'customer_note',
        'subtotal',
        'shipping_fee',
        'coupon_code',
        'discount_amount',
        'discount_type',
        'tax_amount',
        'total_amount',
        'payment_method',
        'payment_status',
        'status',
        'shipping_method',
        'tracking_code',
        'admin_note',
    ];

    // Một đơn hàng có nhiều item
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Một đơn hàng có nhiều lịch sử thay đổi
    public function history()
    {
        return $this->hasMany(OrderHistory::class)->latest();
    }

    // Nếu có liên kết với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
