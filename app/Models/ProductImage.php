<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    protected $fillable = [
        'product_uid', 
        'cloudinary_public_id',
        'image_url',
        'status',
        'created_at', 
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_uid', 'product_uid');
    }
}
