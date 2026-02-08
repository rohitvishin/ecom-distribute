<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Cache;

class AdminDetailService
{
    public function getDetailsByAdminUid($id)
    {
        $admin = Admin::with([
            'companyProfile',
            'loginHistory' => fn($q) => $q->latest(), // order by latest, but return all
            'generalSetting'
        ])->find($id);

        return [
            'admin_details'    => $admin,
            'company_profile'  => $admin?->companyProfile,
            'general_settings' => $admin?->generalSetting,
            'login_histories'  => $admin?->loginHistory,
        ];
    }

    public function getDetailsForAuthenticatedAdmin()
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return null;
        }

        return $this->getDetailsByAdminUid($admin->id);
    }
}
