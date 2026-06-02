<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\OrderController;

/*  
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function(){

    // ================ Strting Basic without AUTH REQUESTS ==============================

    Route::get('/',[AdminController::class, 'index'])->name('login');
    Route::get('/login',[AdminController::class, 'index'])->name('login');

    Route::post('/sendOtp',[AdminController::class, 'sendOtp'])->name('adminLoginPost');
    Route::post('/verifyOTP',[AdminController::class, 'verifyOTP'])->name('verifyOTP');

    // Google Login Routes
    Route::get('/auth/google/redirect',[AdminController::class, 'google_redirect'])->name('auth.google.redirect');
    Route::get('/auth/google/callback',[AdminController::class, 'google_callback'])->name('auth.google.callback');

    Route::middleware('admin.auth')->group(function () {

        // ================ GET REQUESTS ==============================

            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
            Route::get('/settings/all',[GeneralSettingController::class,'index'])->name('settings');
            Route::get('/account',[AdminController::class,'profile'])->name('profile');
            Route::get('/account/update',[AdminController::class,'edit_profile'])->name('edit-profile');
            

            // Products Routes
            Route::get('/product/manage', [ProductController::class, 'index'])->name('manage-products');
            Route::get('/product/add', [ProductController::class, 'create'])->name('add-product');
            Route::get('/product/edit/{product_uid}', [ProductController::class, 'edit'])->name('edit-product');
            Route::get('/product/export', [ProductController::class, 'export_data'])->name('export-product');

            // Category Routes
            Route::get('/category/add', [CategoryController::class, 'create'])->name('add_category');
            Route::get('/category/edit', [CategoryController::class, 'edit'])->name('edit_category');
            Route::get('/category/manage', [CategoryController::class, 'index'])->name('manage_category');
            Route::get('/category/get_all_category', [CategoryController::class, 'get_all_categories'])->name('get_all_category');

            // Orders Routes
            Route::get('/order/manage', [OrderController::class, 'index'])->name('manage-orders');
            Route::get('/order/{order_id}', [OrderController::class, 'show'])->name('order-show');
            Route::post('/order/{order_id}/update-status', [OrderController::class, 'updateStatus'])->name('order-update-status');
            Route::get('/order/{order_id}/invoice', [OrderController::class, 'invoice'])->name('order-invoice');

        // ================ POST REQUESTS ==============================

            // Profile POST routes
            Route::post('/account/update_brand_details',[CompanyProfileController::class,'update_brand_details'])->name('update-brand-details');
            Route::post('/account/update_logo',[CompanyProfileController::class,'update_logo'])->name('update-update-logo');
            Route::post('/account/update_basic_details',[AdminController::class,'update_basic_details'])->name('update-basic-details');
            Route::post('/account/update-brand-social-media',[CompanyProfileController::class,'update_brand_social_media'])->name('update-brand-social-media');

            // Product Routes
            Route::post('/product/create', [ProductController::class, 'store'])->name('product-create');
            Route::post('/product/update', [ProductController::class, 'store'])->name('product-update');
            Route::post('/product/thumbnail/update', [ProductController::class, 'update_image'])->name('update_product_thumbnail');
            Route::post('/product/draft/init', [ProductController::class, 'product_draft_init'])->name('product-draft-init');
            Route::post('/product/draft/gallery/add', [ProductController::class, 'update_draft_product_gallery_files'])->name('add-draft-product-gallery-files');
            Route::post('/product/draft/gallery/delete', [ProductController::class, 'delete_draft_product_gallery_files'])->name('delete-draft-product-gallery-files');

            // Category Routes
            Route::post('/category/store', [CategoryController::class, 'store'])->name('categories.store');
            Route::post('/category/update', [CategoryController::class, 'update'])->name('categories.update');
            Route::post('/category/update-category-status', [CategoryController::class, 'update_category_status'])->name('update_category_status');
            
            // General Settings
            Route::post('/general_settings/update',[GeneralSettingController::class,'update'])->name('settingEdit');
            Route::post('/general_settings/update-maintenance-status',[GeneralSettingController::class,'update_maintenance_status'])->name('update-maintenance-status');
            Route::post('/general_settings/update-general-settings',[GeneralSettingController::class,'update_general_settings'])->name('update-general-settings');
            
            // Admin Account
            Route::post('/account/{id}',[AdminController::class,'adminAccountUpdate'])->name('adminAccountUpdate');
            Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    });
});


// Admin Routes
Route::get('/',[AdminController::class, 'index']);
Route::get('/home',[AdminController::class, 'index'])->name('home');
Route::get('/product/{slug}', [IndexController::class, 'productDetail'])->name('product.show');
