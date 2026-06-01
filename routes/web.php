<?php

use App\Http\Controllers\front\AuthController;
use App\Http\Controllers\front\IndexController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\OrderController;
use App\Http\Controllers\Front\RazorpayController;
use Illuminate\Support\Facades\Route;

/*  
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/privacy-policy',function(){
    return view('front.privacy-policy');
})->name('privacy-policy');

Route::get('/terms-and-condition', function(){
    return view('front.term-and-condition');
})->name('terms-and-condition');

Route::get('/return-policy', function(){
    return view('front.return-and-refund');
})->name('return-policy');

Route::get('/faqs', function(){
    return view('front.faq');
})->name('faqs');

// route for login
Route::post('/requestOtp', [AuthController::class, 'requestOtp']);
Route::post('/loginOtp', [AuthController::class, 'login']);

Route::get('/about', function(){
    return view('front.about');
})->name('about');

Route::get('/contact', function(){
    return view('front.contact');
})->name('contact');

Route::get('/product-detail/{id}', [IndexController::class, 'productDetail'])->name('product-detail');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/addToCart',[CartController::class,'addCart'])->name('addToCart');
    Route::post('/removeCart',[CartController::class,'removeCart'])->name('removeCart');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/checkout',function(){
        return view('front.checkout');
        })->name('checkout');
    Route::post('/place-order', [OrderController::class, 'store'])->name('order.place');
    Route::post('/userUpdate',[AuthController::class,'userUpdate'])->name('userUpdate');
    Route::get('/account-order',[OrderController::class,'index'])->name('account-order');
    Route::get('/account-details',[AuthController::class,'userAccount'])->name('account-details');
    Route::get('/account-address',[AuthController::class,'userAddress'])->name('account-address');

    // Razorpay Routes
    Route::post('/razorpay/create-order', [RazorpayController::class, 'createPaymentOrder'])->name('razorpay.create');
    Route::post('/razorpay/verify-payment', [RazorpayController::class, 'verifyPayment'])->name('razorpay.verify');
    Route::post('/razorpay/payment-failed', [RazorpayController::class, 'paymentFailed'])->name('razorpay.failed');
    Route::get('/razorpay/success', [RazorpayController::class, 'paymentSuccess'])->name('razorpay.success');
    Route::get('/razorpay/cancel', [RazorpayController::class, 'paymentCancel'])->name('razorpay.cancel');
});
