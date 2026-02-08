<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
         $products = Product::with(['product_images'])
        ->where('status', 'published')
        ->orderBy('created_at', 'desc')
        ->get();

    // Return view with all products
    return view('front.index', [
        'products' => $products
    ]);
    }
    public function productDetail($id)
    {
        $cart_exists = false;
        if(auth()->check()){
            $user = auth()->user();
            // get cart items for the user and product
             $cartItems = Cart::where(['product_id'=>$id,'user_id'=>$user->id,'status'=>'active'])->get();
            if(count($cartItems)>0){
                $cart_exists = true;
            }
        }
        $product = Product::with(['product_images'])->findOrFail($id);
        return view('front.product-detail', [
            'product' => $product,
            'cart_exists' => $cart_exists
        ]);
    }
}
