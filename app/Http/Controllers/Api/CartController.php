<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addCart(Request $request){
        try{
            $validated = $request->validate([
                'product_id' => 'required|integer|exists:products,product_uid',
                'quantity' => 'required|integer|min:1'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status'=>'error',
                'message'=>$e->getMessage()
            ]);
        }

        try {
            // Get authenticated user
            $user = auth()->user();
            
            // Check if product already in cart
            $existingCartItem = Cart::where('user_id', $user->id)
                ->where('product_id', $validated['product_id'])
                ->where('status', 'active')
                ->first();

            if ($existingCartItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product already exists in cart',
                    'error_code' => 'PRODUCT_ALREADY_IN_CART'
                ], 409);
            }

            // Create new cart item
            $cartItem = Cart::create([
                'user_id' => $user->id,
                'product_id' => $validated['product_id'],
                'quantity' => $validated['quantity'],
                'status' => 'active'
            ]);

            // Load product details
            $cartItem->load(['product' => function($query) {
                $query->select('id', 'title', 'mrp', 'discount', 'selling_price');
            }]);
            
            // Get primary product image
            $primaryImage = ProductImage::where('product_id', $validated['product_id'])
                ->where('status', 'active')
                ->first();

            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully',
                'data' => [
                    'id' => $cartItem->id,
                    'user_id' => $cartItem->user_id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'status' => $cartItem->status,
                    'created_at' => $cartItem->created_at,
                    'updated_at' => $cartItem->updated_at,
                    'product' => [
                        'id' => $cartItem->product->id,
                        'title' => $cartItem->product->title,
                        'selling_price' => $cartItem->product->selling_price,
                        'image_url' => $primaryImage ? $primaryImage->image_url : null
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add product to cart',
                'error_code' => 'SERVER_ERROR'
            ], 500);
        }
    }
}
