<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Payment;
use Razorpay\Api\Api;
use Exception;

class RazorpayService
{
    private $api;
    private $keyId;
    private $keySecret;

    public function __construct()
    {
        $this->keyId = config('services.razorpay.key_id');
        $this->keySecret = config('services.razorpay.key_secret');
        $this->api = new Api($this->keyId, $this->keySecret);
    }

    /**
     * Create a Razorpay order for the given Order
     *
     * @param Order $order
     * @return array
     */
    public function createOrder(Order $order)
    {
        try {
            $razorpayOrder = $this->api->order->create([
                'amount' => (int)($order->paid_amount * 100), // Amount in paise
                'currency' => 'INR',
                'receipt' => 'order_' . $order->id,
                'notes' => [
                    'order_id' => $order->id,
                    'customer_name' => $order->customer_name,
                    'customer_email' => auth()->user()->email ?? '',
                ],
            ]);

            // Store payment record with Razorpay order ID
            Payment::create([
                'order_id' => $order->id,
                'user_id' => $order->user_id,
                'payment_method' => 'razorpay',
                'amount' => $order->paid_amount,
                'currency' => 'INR',
                'status' => 'pending',
                'razorpay_order_id' => $razorpayOrder['id'],
            ]);

            return [
                'success' => true,
                'order_id' => $razorpayOrder['id'],
                'amount' => $razorpayOrder['amount'],
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Verify Razorpay payment signature
     *
     * @param string $paymentId
     * @param string $orderId
     * @param string $signature
     * @return bool
     */
    public function verifyPaymentSignature($paymentId, $orderId, $signature)
    {
        try {
            $attributes = array(
                'razorpay_order_id' => $orderId,
                'razorpay_payment_id' => $paymentId,
                'razorpay_signature' => $signature,
            );

            $this->api->utility->verifyPaymentSignature($attributes);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Handle successful payment
     *
     * @param string $paymentId
     * @param string $orderId
     * @param string $signature
     * @return array
     */
    public function handlePaymentSuccess($paymentId, $orderId, $signature)
    {
        try {
            // Verify signature first
            if (!$this->verifyPaymentSignature($paymentId, $orderId, $signature)) {
                return [
                    'success' => false,
                    'error' => 'Invalid payment signature',
                ];
            }

            // Get payment details from Razorpay
            $payment = $this->api->payment->fetch($paymentId);

            // Update payment record
            $paymentRecord = Payment::where('razorpay_order_id', $orderId)->first();
            if ($paymentRecord) {
                $paymentRecord->update([
                    'razorpay_payment_id' => $paymentId,
                    'razorpay_signature' => $signature,
                    'status' => 'captured',
                    'razorpay_response' => json_encode($payment),
                    'paid_at' => now(),
                ]);

                // Update order payment status
                $order = Order::find($paymentRecord->order_id);
                if ($order) {
                    $order->update([
                        'payment_status' => 'paid',
                        'payment_id' => $paymentId,
                        'order_status' => 'processing',
                    ]);
                }

                return [
                    'success' => true,
                    'message' => 'Payment successful',
                    'order_id' => $order->id ?? null,
                ];
            }

            return [
                'success' => false,
                'error' => 'Payment record not found',
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Handle failed payment
     *
     * @param string $orderId
     * @param string $errorMessage
     * @return array
     */
    public function handlePaymentFailure($orderId, $errorMessage = null)
    {
        try {
            $paymentRecord = Payment::where('razorpay_order_id', $orderId)->first();
            if ($paymentRecord) {
                $paymentRecord->update([
                    'status' => 'failed',
                    'error_message' => $errorMessage,
                ]);
            }

            return [
                'success' => true,
                'message' => 'Payment failure recorded',
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Get Razorpay API key ID
     */
    public function getKeyId()
    {
        return $this->keyId;
    }
}
