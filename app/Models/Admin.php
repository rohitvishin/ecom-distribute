<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $fillable = [
        'otp',
        'name',
        'email',
        'mobile',
    ];


    public function companyProfile()
    {
        return $this->hasOne(CompanyProfile::class, 'admin_id', 'id');
    }

    public function loginHistory()
    {
        return $this->hasMany(AdminLoginHistory::class, 'admin_id', 'id');
    }

    public function generalSetting()
    {
        return $this->hasOne(GeneralSetting::class, 'admin_id', 'id');
    }
}
