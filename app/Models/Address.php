<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    
    protected $fillable = [
        'user_id',
        'address_type',
        'recipient_name',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'phone_number',
        'is_default',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
