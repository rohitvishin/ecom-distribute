<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'payment_status',
        'mrp_amount',
        'discount',
        'paid_amount',
        'payment_id',
        'coupon_id',
        'order_status',
        'customer_name',
        'customer_phone',
        'shipping_address',
        'billing_address',
        'return_reason',
        'refund_amount',
        'status',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
