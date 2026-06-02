<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['user', 'orderItems'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        return view('admin.order.manage', compact('orders'));
    }

    /**
     * Get order details via AJAX
     */
    public function show($order_id)
    {
        try {
            $order = Order::with('orderItems.product')->findOrFail($order_id);
            
            return response()->json([
                'success' => true,
                'order' => [
                    'id' => $order->id,
                    'customer_name' => $order->customer_name,
                    'customer_phone' => $order->customer_phone,
                    'order_status' => $order->order_status,
                    'payment_status' => $order->payment_status,
                    'mrp_amount' => number_format($order->mrp_amount, 2),
                    'discount' => number_format($order->discount, 2),
                    'paid_amount' => number_format($order->paid_amount, 2),
                    'created_at' => $order->created_at->format('d M Y, h:i A'),
                    'shipping_address' => json_decode($order->shipping_address, true),
                    'items' => $order->orderItems->map(function ($item) {
                        return [
                            'product_name' => $item->product->title ?? 'N/A',
                            'quantity' => $item->quantity,
                            'mrp_amount' => number_format($item->mrp_amount, 2),
                            'discount_amount' => number_format($item->discount_amount, 2),
                        ];
                    }),
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Order not found',
            ], 404);
        }
    }

    /**
     * Update order status
     */
    public function updateStatus(Request $request, $order_id)
    {
        try {
            $request->validate([
                'order_status' => 'required|in:pending,processing,shipped,delivered,cancelled',
            ]);

            $order = Order::findOrFail($order_id);
            $order->update([
                'order_status' => $request->order_status,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Order status updated successfully',
                'order_status' => ucfirst($order->order_status),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Display admin invoice
     */
    public function invoice($order_id)
    {
        $order = Order::with('orderItems.product')
            ->findOrFail($order_id);
        
        $company_profile = \App\Models\CompanyProfile::first();
        
        return view('front.invoice', compact('order', 'company_profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
