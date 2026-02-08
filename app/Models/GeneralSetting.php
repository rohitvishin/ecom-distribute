<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'currency',
        'currency_symbol',
        'cloudinary_key_name',
        'cloudinary_api_key',
        'cloudinary_secret_key',
        'maintenance_mode',
        'default_meta_title',
        'default_meta_description',
        'default_schema',
        'custom_header',
        'custom_footer',
    ];

    protected $casts = [
        'maintenance_mode' => 'boolean',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}
