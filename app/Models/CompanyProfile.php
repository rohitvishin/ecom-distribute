<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $table = 'company_profiles';

    protected $fillable = [
        'admin_id',
        'cloudinary_public_id',
        'company_name',
        'logo',
        'favicon',
        'brand_tag_line',
        'fulladdress',
        'support_phone',
        'support_email',
        'whatsapp_number',
        'support_days',
        'support_hour_from',
        'support_hour_to',
        'social_media_links',
    ];

    protected $casts = [
        'social_media_links' => 'array',
        'support_days' => 'array',
    ];

    /**
     * Calculate profile completion percentage.
     *
     * @return int
     */
    public function profileCompletionPercentage(): int
    {
        $fields = [
            'company_name',
            'logo',
            'favicon',
            'about',
            'fulladdress',
            'support_phone',
            'support_email',
            'whatsapp_number',
            'support_days',
            'support_hour_from',
            'support_hour_to',
            'social_media_links',
        ];

        $completed = 0;
        foreach ($fields as $field) {
            if (!empty($this->$field)) {
                $completed++;
            }
        }

        return (int) round(($completed / count($fields)) * 100);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}
