<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlacedMail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems')->where('user_id', Auth::id())->get();
        return view('front.account-order', compact('orders'));
    }

    /**
     * Display order invoice
     */
    public function invoice($order_id)
    {
        $order = Order::with('orderItems.product')
            ->where('id', $order_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        $company_profile = \App\Models\CompanyProfile::first();
        
        return view('front.invoice', compact('order', 'company_profile'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name'  => 'required|string',
            'email'  => 'required|email',
            'customer_phone' => 'required|string',
            'address_line1'  => 'required|string',
            'city'           => 'required|string',
            'state'          => 'required|string',
            'pincode'        => 'required|string',
            'payment_method' => 'required|in:cod,razorpay',
        ]);

        $cartItems = get_cart_items();

        if ($cartItems->isEmpty()) {
            abort(400, 'Cart is empty');
        }

        $totalMrp = 0;
        $totalDiscount = 0;
        $totalLogistics = 0;
        $totalTax = 0;

        foreach ($cartItems as $item) {
            $mrp = $item->product->mrp ?? $item->product->selling_price;
            $discount = $item->product->discount ?? 0;
            $logistics = $item->product->logistics_cost ?? 0;
            $tax = $item->product->tax_amount ?? 0;

            $totalMrp += $mrp * $item->quantity;
            $totalDiscount += $discount * $item->quantity;
            $totalLogistics += $logistics * $item->quantity;
            $totalTax += $tax * $item->quantity;
        }

        $paidAmount = ($totalMrp+$totalLogistics+$totalTax) - $totalDiscount;

        $shippingAddress = json_encode([
            'line1'   => $request->address_line1,
            'line2'   => $request->address_line2,
            'city'    => $request->city,
            'state'   => $request->state,
            'pincode' => $request->pincode,
            'country' => 'India',
        ]);

        // Handle COD
        if ($request->payment_method === 'cod') {
            return $this->processCODOrder($request, $totalMrp, $totalDiscount, $paidAmount, $shippingAddress, $cartItems);
        }

        // Handle Razorpay - create order with pending payment status
        return $this->createOrderForRazorpay($request, $totalMrp, $totalDiscount, $paidAmount, $shippingAddress, $cartItems);
    }

    /**
     * Process Cash On Delivery order
     */
    private function processCODOrder($request, $totalMrp, $totalDiscount, $paidAmount, $shippingAddress, $cartItems)
    {
        $result = null;
        DB::transaction(function () use ($request, $totalMrp, $totalDiscount, $paidAmount, $shippingAddress, $cartItems, &$result) {
            $order = Order::create([
                'user_id'          => Auth::id(),
                'payment_status'   => 'pending',
                'mrp_amount'       => $totalMrp,
                'discount'         => $totalDiscount,
                'paid_amount'      => $paidAmount,
                'payment_id'       => null,
                'coupon_id'        => 0,
                'order_status'     => 'pending',
                'customer_name'    => $request->customer_name,
                'customer_phone'   => $request->customer_phone,
                'shipping_address' => $shippingAddress,
                'billing_address'  => $shippingAddress,
                'refund_amount'    => 0,
                'status'           => 'active',
            ]);

            foreach ($cartItems as $item) {
                Product::where('id', $item->product_id)->decrement('available_qty', $item->quantity);
                $product = Product::where('id', $item->product_id)->first();
                OrderItem::create([
                    'order_id'        => $order->id,
                    'product_id'      => $item->product_id,
                    'quantity'        => $item->quantity,
                    'mrp_amount'      => $product->mrp,
                    'discount_amount' => $product->discount,
                    'purchase_price'  => $product->selling_price,
                ]);
            }

            clear_cart();
            
            if ($request->filled('email')) {
                Mail::to($request->email)->send(new OrderPlacedMail($order));
            }

            $result = redirect()->route('account-order')->with('success', 'Order placed successfully');
        });

        return $result ?? redirect()->route('index')->with('fail', 'Order failed');
    }

    /**
     * Create order for Razorpay payment
     */
    private function createOrderForRazorpay($request, $totalMrp, $totalDiscount, $paidAmount, $shippingAddress, $cartItems)
    {
        $order = null;
        try {
            DB::transaction(function () use ($request, $totalMrp, $totalDiscount, $paidAmount, $shippingAddress, $cartItems, &$order) {
                $order = Order::create([
                    'user_id'          => Auth::id(),
                    'payment_status'   => 'pending',
                    'mrp_amount'       => $totalMrp,
                    'discount'         => $totalDiscount,
                    'paid_amount'      => $paidAmount,
                    'payment_id'       => null,
                    'coupon_id'        => 0,
                    'order_status'     => 'pending',
                    'customer_name'    => $request->customer_name,
                    'customer_phone'   => $request->customer_phone,
                    'shipping_address' => $shippingAddress,
                    'billing_address'  => $shippingAddress,
                    'refund_amount'    => 0,
                    'status'           => 'active',
                ]);

                foreach ($cartItems as $item) {
                    Product::where('id', $item->product_id)->decrement('available_qty', $item->quantity);
                    $product = Product::where('id', $item->product_id)->first();
                    OrderItem::create([
                        'order_id'        => $order->id,
                        'product_id'      => $item->product_id,
                        'quantity'        => $item->quantity,
                        'mrp_amount'      => $product->mrp,
                        'discount_amount' => $product->discount,
                        'purchase_price'  => $product->selling_price,
                    ]);
                }
            });

            // Return order data for Razorpay payment processing
            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'message' => 'Order created. Proceeding to payment...',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to create order: ' . $e->getMessage(),
            ], 400);
        }
    }
}
