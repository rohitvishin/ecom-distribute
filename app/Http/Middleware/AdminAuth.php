<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use App\Models\GeneralSetting;
use CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            // ✅ Admin is logged in → load Cloudinary config from DB
            $settings = GeneralSetting::where('admin_id', Auth::guard('admin')->id())->first();

            if (
                $settings &&
                $settings->cloudinary_key_name &&
                $settings->cloudinary_api_key &&
                $settings->cloudinary_secret_key
            ) {
                $cloudUrl = sprintf(
                    'cloudinary://%s:%s@%s',
                    $settings->cloudinary_api_key,
                    $settings->cloudinary_secret_key,
                    $settings->cloudinary_key_name
                );

                config(['cloudinary.cloud_url' => $cloudUrl]);

                // 🔄 Rebind Cloudinary so the facade uses new config
                App::forgetInstance('cloudinary');
                App::bind('cloudinary', fn () => new CloudinaryEngine(config('cloudinary.cloud_url')));
            }
            
            return $next($request);
        }

        return redirect('/admin/login')->with('error', 'Unauthorized access.');
    }
}