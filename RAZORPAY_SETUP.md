# Razorpay Integration Setup Guide

## Overview
This document describes the Razorpay payment gateway integration implemented in your e-commerce platform using Laravel.

## Features Implemented

1. **Dual Payment Method Support**
   - Cash On Delivery (COD) - Existing functionality preserved
   - Razorpay Online Payment - New integration

2. **Complete Payment Flow**
   - Order creation before payment processing
   - Razorpay order creation and payment handling
   - Payment signature verification
   - Order status updates based on payment status

3. **Database Changes**
   - Updated `payments` table with Razorpay-specific fields
   - New columns: `razorpay_payment_id`, `razorpay_order_id`, `razorpay_signature`, etc.

## Setup Instructions

### 1. Add Razorpay API Credentials to `.env`

```bash
RAZORPAY_KEY_ID=your_razorpay_key_id
RAZORPAY_KEY_SECRET=your_razorpay_key_secret
```

**How to get your credentials:**
1. Go to https://dashboard.razorpay.com/
2. Login to your Razorpay account
3. Navigate to Settings → API Keys
4. Copy the Key ID and Key Secret
5. Add them to your `.env` file

### 2. Files Created/Modified

#### New Files:
- `app/Services/RazorpayService.php` - Handles all Razorpay operations
- `app/Http/Controllers/Front/RazorpayController.php` - Payment endpoints
- `database/migrations/2025_05_31_000001_update_payments_table.php` - Database updates

#### Modified Files:
- `app/Models/Payment.php` - Added relationships and fillable properties
- `app/Http/Controllers/Front/OrderController.php` - Updated to handle both payment methods
- `routes/web.php` - Added Razorpay routes
- `config/services.php` - Added Razorpay configuration
- `resources/views/front/checkout.blade.php` - Added Razorpay payment option and JavaScript

### 3. Database Migration

The migration has already been executed. If needed to rollback:

```bash
php artisan migrate:rollback
```

Then migrate again:

```bash
php artisan migrate
```

## Payment Flow Explanation

### Cash On Delivery (COD)
1. User fills delivery address and selects COD
2. Clicks "Place order"
3. Order is immediately created with `payment_status = 'pending'`
4. User is redirected to account orders page
5. No payment processing required

### Razorpay Payment
1. User fills delivery address and selects Razorpay
2. Clicks "Place order"
3. Order is created with `payment_status = 'pending'`
4. Payment record is created with `status = 'pending'`
5. AJAX request creates a Razorpay order
6. Razorpay payment modal opens
7. User enters payment details (card, UPI, wallet, etc.)
8. On successful payment:
   - Signature is verified server-side
   - Payment record is updated with `status = 'captured'`
   - Order status is updated to `payment_status = 'paid'` and `order_status = 'processing'`
   - User is redirected to account orders page
9. On payment failure/cancellation:
   - Payment record is updated with `status = 'failed'`
   - User can retry payment or abandon

## API Endpoints

### Payment Endpoints (Protected - require authentication)

1. **POST `/razorpay/create-order`**
   - Creates a Razorpay order
   - Params: `order_id` (order ID)
   - Returns: Razorpay order details

2. **POST `/razorpay/verify-payment`**
   - Verifies payment signature
   - Params: `razorpay_payment_id`, `razorpay_order_id`, `razorpay_signature`
   - Returns: Success/failure response

3. **POST `/razorpay/payment-failed`**
   - Records payment failure
   - Params: `razorpay_order_id`, `error_message`
   - Returns: Success/failure response

4. **GET `/razorpay/success`**
   - Success redirect page
   - Returns: Redirect to account orders with success message

5. **GET `/razorpay/cancel`**
   - Cancel redirect page
   - Returns: Redirect to checkout with error message

## Model Relationships

### Payment Model
```php
$payment->order() // Returns associated Order
$payment->user()  // Returns associated User
```

### Order Model
```php
$order->payment() // Returns associated Payment (add if needed)
```

## Configuration

### services.php
```php
'razorpay' => [
    'key_id' => env('RAZORPAY_KEY_ID'),
    'key_secret' => env('RAZORPAY_KEY_SECRET'),
],
```

## Testing Razorpay Integration

### Test Card Numbers (Sandbox Mode)
- Success: `4111 1111 1111 1111`
- Failure: `4222 2222 2222 2222`
- CVV: Any 3 digits
- Date: Any future date

### Webhook Handling (Optional)
For production, consider implementing webhooks for:
- `payment.authorized`
- `payment.captured`
- `payment.failed`
- `refund.created`

## Error Handling

The implementation includes comprehensive error handling:
- Invalid signatures return 400 error
- Missing order data returns 404 error
- Database errors are logged and returned with user-friendly messages
- All errors are logged to `storage/logs/laravel.log`

## Security Features

1. **Signature Verification**: Every payment is verified using Razorpay's signature verification
2. **CSRF Protection**: All forms and AJAX requests are protected with CSRF tokens
3. **User Authorization**: Payment endpoints verify that orders belong to authenticated users
4. **Environment Variables**: API credentials are stored securely in `.env`
5. **HTTPS**: Razorpay checkout requires HTTPS in production

## Logging

All Razorpay operations are logged. Check logs at:
```
storage/logs/laravel.log
```

Key log entries:
- Order creation
- Payment creation
- Signature verification
- Payment success/failure

## Next Steps (Optional Enhancements)

1. **Webhooks**: Implement Razorpay webhooks for additional security
2. **Refunds**: Create refund functionality in admin panel
3. **Payment History**: Display payment history in user account
4. **Email Notifications**: Send payment confirmation emails
5. **Multiple Currencies**: Support for multiple currencies if needed
6. **Recurring Payments**: For subscription products

## Troubleshooting

### Payment Modal Not Opening
- Check browser console for JavaScript errors
- Verify Razorpay script is loaded: `https://checkout.razorpay.com/v1/checkout.js`
- Ensure RAZORPAY_KEY_ID is correct

### Signature Verification Fails
- Verify RAZORPAY_KEY_SECRET is correct
- Check that payment data matches exactly
- Ensure server time is synchronized (NTP)

### Order Not Created
- Check form validation messages
- Verify database connection
- Check `storage/logs/laravel.log` for errors

## Support

For Razorpay support, visit:
- Documentation: https://razorpay.com/docs/
- Dashboard: https://dashboard.razorpay.com/
- Email: support@razorpay.com

---

**Implementation Date**: May 31, 2026
**Laravel Version**: 10.10+
**PHP Version**: 8.1+
