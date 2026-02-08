<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Request $request){
        try{
            $validated = $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|min:1'
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
                ->where('status', 'published')
                ->first();

            if ($existingCartItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product already exists in cart'
                ], 409);
            }

            // Create new cart item
            $cartItem = Cart::create([
                'user_id' => $user->id,
                'product_id' => $validated['product_id'],
                'quantity' => $validated['quantity'],
                'status' => 'active'
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function removeCart(Request $request){
        try{
            $validated = $request->validate([
                'product_id' => 'required|exists:products,id'
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

            if (!$existingCartItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found in cart'
                ], 404);
            }

            // Remove cart item
            $existingCartItem->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Product removed from cart successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
