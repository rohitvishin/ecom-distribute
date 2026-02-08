<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'mrp_amount',
        'discount_amount',
        'purchase_price',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
