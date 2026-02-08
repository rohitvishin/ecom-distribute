<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table ='categories';

    protected $appends = ['parent_name'];
    protected $fillable = ['category_uid', 'parent_uid', 'name', 'slug', 'description', 'image_url', 'status'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_uid', 'category_uid');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_uid', 'category_uid');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_uid', 'category_uid');
    }

    public function getParentNameAttribute()
    {
        return $this->parent?->name ?? '-';
    }
}