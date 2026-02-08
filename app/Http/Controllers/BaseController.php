<?php
namespace App\Http\Controllers;

use App\Services\AdminDetailService;

class BaseController extends Controller
{
    protected $data;

    public function __construct(AdminDetailService $adminService)
    {
        // Defer fetching authenticated data until middleware is resolved
        $this->middleware(function ($request, $next) use ($adminService) {
            $this->data = $adminService->getDetailsForAuthenticatedAdmin();
            return $next($request);
        });
    }
}