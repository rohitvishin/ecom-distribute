<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLoginHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'ip_address',
        'user_agent',
        'login_at',
        'logout_at',
        'status',
        'created_at',
        'updated_at',
    ];

    public static function log($adminId, $ip, $userAgent, $status)
    {
        self::create([
            'admin_id'    => $adminId,
            'ip_address'  => $ip,
            'user_agent'  => $userAgent,
            'login_at'    => now(),
            'status'      => $status,
        ]);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}


