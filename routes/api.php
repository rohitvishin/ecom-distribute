<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


    Route::post('/requestOtp', [AuthController::class, 'requestOtp'])->name('requestOTP');
    Route::post('/loginOtp', [AuthController::class, 'login']);
    // Protected routes
    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/updateAddress', [AddressController::class, 'updateAddress']);
        Route::post('/addAddress', [AddressController::class, 'AddAddress']);
        Route::post('/addCart', [CartController::class, 'addCart']);
        Route::post('/orders', [OrderController::class, 'addOrder']); // with coupon functionality
        Route::post('/orderHistory', [OrderController::class, 'history']);
        Route::post('/products/{product_id}/review', [ReviewController::class, 'create']);
        Route::post('/orders/{order_id}/return', [OrderController::class, 'returnOrder']);
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });

    // product list and category
    Route::get('/categoryList',[CategoryController::class,'show'])->name('categoryList');
    Route::get('/productList',[ProductController::class,'index'])->name('productList');
    Route::get('/productDetails',[ProductController::class,'details'])->name('productDetails');