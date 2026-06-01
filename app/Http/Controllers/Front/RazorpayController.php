<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\RazorpayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RazorpayController extends Controller
{
    private $razorpayService;

    public function __construct(RazorpayService $razorpayService)
    {
        $this->razorpayService = $razorpayService;
    }

    /**
     * Create Razorpay payment order
     * This is called via AJAX from the checkout form
     */
    public function createPaymentOrder(Request $request)
    {
        try {
            $orderId = $request->order_id;
            $order = Order::findOrFail($orderId);

            // Verify order belongs to authenticated user
            if ($order->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'error' => 'Unauthorized',
                ], 401);
            }

            // Create Razorpay order
            $response = $this->razorpayService->createOrder($order);

            if (!$response['success']) {
                Log::error('Razorpay order creation failed', ['error' => $response['error']]);
                return response()->json($response, 400);
            }

            return response()->json([
                'success' => true,
                'razorpay_order_id' => $response['order_id'],
                'razorpay_key_id' => $this->razorpayService->getKeyId(),
                'amount' => $response['amount'],
                'customer_name' => $order->customer_name,
                'customer_email' => auth()->user()->email,
                'customer_contact' => $order->customer_phone,
            ]);
        } catch (\Exception $e) {
            Log::error('Razorpay order creation exception', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'error' => 'Failed to create payment order',
            ], 500);
        }
    }

    /**
     * Verify payment and update order
     * This is called via AJAX after successful Razorpay payment
     */
    public function verifyPayment(Request $request)
    {
        try {
            $request->validate([
                'razorpay_payment_id' => 'required|string',
                'razorpay_order_id' => 'required|string',
                'razorpay_signature' => 'required|string',
            ]);

            $response = $this->razorpayService->handlePaymentSuccess(
                $request->razorpay_payment_id,
                $request->razorpay_order_id,
                $request->razorpay_signature
            );

            if (!$response['success']) {
                Log::warning('Razorpay payment verification failed', $response);
                return response()->json($response, 400);
            }

            return response()->json([
                'success' => true,
                'message' => 'Payment verified successfully',
                'order_id' => $response['order_id'],
            ]);
        } catch (\Exception $e) {
            Log::error('Razorpay payment verification exception', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'error' => 'Payment verification failed',
            ], 500);
        }
    }

    /**
     * Handle payment failure
     * This is called when user cancels payment or payment fails
     */
    public function paymentFailed(Request $request)
    {
        try {
            $request->validate([
                'razorpay_order_id' => 'required|string',
            ]);

            $response = $this->razorpayService->handlePaymentFailure(
                $request->razorpay_order_id,
                $request->error_message ?? 'Payment failed'
            );

            return response()->json($response);
        } catch (\Exception $e) {
            Log::error('Razorpay payment failure handling exception', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'error' => 'Failed to record payment failure',
            ], 500);
        }
    }

    /**
     * Redirect after successful payment
     */
    public function paymentSuccess()
    {
        return redirect()->route('account-order')->with('success', 'Payment successful! Your order has been confirmed.');
    }

    /**
     * Redirect after payment failure
     */
    public function paymentCancel()
    {
        return redirect()->route('checkout')->with('error', 'Payment was cancelled. Please try again.');
    }
}
