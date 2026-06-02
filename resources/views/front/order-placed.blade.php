<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .email-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .email-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .email-header p {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .email-body {
            padding: 30px;
        }
        
        .greeting {
            font-size: 16px;
            margin-bottom: 20px;
            color: #333;
        }
        
        .greeting strong {
            color: #667eea;
        }
        
        .order-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 6px;
            margin: 20px 0;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e0e0e0;
            font-size: 14px;
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-row label {
            color: #999;
            font-weight: 600;
        }
        
        .detail-row strong {
            color: #333;
            font-weight: 600;
        }
        
        .address-section {
            margin: 25px 0;
        }
        
        .address-section h3 {
            font-size: 14px;
            color: #667eea;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .address-content {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            font-size: 14px;
            line-height: 1.8;
            color: #666;
        }
        
        .button-container {
            text-align: center;
            margin: 30px 0;
        }
        
        .btn {
            display: inline-block;
            padding: 14px 35px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .message {
            font-size: 14px;
            color: #666;
            margin: 20px 0;
            line-height: 1.8;
        }
        
        .note {
            background-color: #fffbea;
            border-left: 4px solid #ffc107;
            padding: 15px;
            border-radius: 4px;
            font-size: 13px;
            color: #856404;
            margin: 20px 0;
        }
        
        .email-footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
            font-size: 12px;
            color: #999;
        }
        
        .email-footer a {
            color: #667eea;
            text-decoration: none;
        }
        
        .email-footer a:hover {
            text-decoration: underline;
        }
        
        .order-id {
            font-size: 12px;
            color: #999;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>✓ Order Confirmed</h1>
            <p>Thank you for your purchase</p>
        </div>
        
        <!-- Body -->
        <div class="email-body">
            <div class="greeting">
                Hello <strong>{{ $order->customer_name }}</strong>,
            </div>
            
            <div class="message">
                Thank you for placing your order with us! We're excited to get your items ready and shipped to you as soon as possible. Your order has been successfully received and is now being processed.
            </div>
            
            <!-- Order Details -->
            <div class="order-details">
                <div class="detail-row">
                    <label>Order ID:</label>
                    <strong>#{{ $order->id }}</strong>
                </div>
                <div class="detail-row">
                    <label>Order Date:</label>
                    <strong>{{ $order->created_at->format('d M Y, h:i A') }}</strong>
                </div>
                <div class="detail-row">
                    <label>Total Amount:</label>
                    <strong style="color: #667eea; font-size: 16px;">₹{{ number_format($order->paid_amount, 2) }}</strong>
                </div>
                <div class="detail-row">
                    <label>Payment Method:</label>
                    <strong>{{ $order->payment_id ? 'Razorpay' : 'Cash on Delivery' }}</strong>
                </div>
                <div class="detail-row">
                    <label>Payment Status:</label>
                    <strong>{{ ucfirst($order->payment_status) }}</strong>
                </div>
                <div class="detail-row">
                    <label>Order Status:</label>
                    <strong>{{ ucfirst($order->order_status) }}</strong>
                </div>
            </div>
            
            <!-- Shipping Address -->
            <div class="address-section">
                <h3>Shipping Address</h3>
                <div class="address-content">
                    @php
                        $shipping = json_decode($order->shipping_address, true);
                    @endphp
                    <strong>{{ $order->customer_name }}</strong><br>
                    {{ $shipping['line1'] ?? '' }}<br>
                    @if($shipping['line2'] ?? false)
                        {{ $shipping['line2'] }}<br>
                    @endif
                    {{ $shipping['city'] ?? '' }}, {{ $shipping['state'] ?? '' }} - {{ $shipping['pincode'] ?? '' }}<br>
                    {{ $shipping['country'] ?? 'India' }}<br>
                    <strong>Phone:</strong> {{ $order->customer_phone }}
                </div>
            </div>
            
            <!-- View Invoice Button -->
            <div class="button-container">
                <a href="{{ route('order.invoice', $order->id) }}" class="btn">📄 View Invoice</a>
            </div>
            
            <!-- Note -->
            <div class="note">
                <strong>📦 What's Next?</strong><br>
                We will notify you via email once your order is shipped. You can track your order status anytime by logging into your account.
            </div>
            
            <div class="message">
                If you have any questions or concerns about your order, please don't hesitate to <a href="mailto:{{ config('mail.from.address', 'zemathcmails@gmail.com') }}">contact our support team</a>.
            </div>
        </div>
        
        <!-- Footer -->
        <div class="email-footer">
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p style="margin-top: 10px;">
                <a href="{{ url('/') }}">Visit Website</a> | 
                <a href="{{ url('contact') }}">Contact Us</a> | 
                <a href="{{ url('privacy-policy') }}">Privacy Policy</a>
            </p>
            <div class="order-id">
                Order ID: #{{ $order->id }} | Reference Date: {{ $order->created_at->format('d M Y') }}
            </div>
        </div>
    </div>
</body>
</html>
