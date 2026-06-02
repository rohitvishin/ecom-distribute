<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice #{{ $order->id }}</title>
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
        
        .invoice-container {
            max-width: 900px;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .invoice-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        
        .company-info h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .company-info p {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 5px;
        }
        
        .invoice-number {
            text-align: right;
        }
        
        .invoice-number h2 {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .invoice-number p {
            font-size: 13px;
            opacity: 0.9;
        }
        
        .invoice-body {
            padding: 40px;
        }
        
        .invoice-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .detail-section h3 {
            font-size: 13px;
            text-transform: uppercase;
            color: #999;
            font-weight: 600;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }
        
        .detail-section p {
            font-size: 15px;
            margin-bottom: 8px;
            line-height: 1.8;
        }
        
        .detail-section strong {
            display: block;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }
        
        .invoice-table {
            width: 100%;
            margin: 30px 0;
            border-collapse: collapse;
            background-color: #f9f9f9;
        }
        
        .invoice-table thead {
            background-color: #667eea;
            color: white;
        }
        
        .invoice-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .invoice-table td {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
            font-size: 14px;
        }
        
        .invoice-table tbody tr:hover {
            background-color: #f0f0f0;
        }
        
        .invoice-table tfoot {
            background-color: #f5f5f5;
        }
        
        .invoice-table tfoot td {
            border-top: 2px solid #667eea;
            border-bottom: none;
            font-weight: 600;
            padding: 15px;
        }
        
        .summary-box {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin: 30px 0;
        }
        
        .summary-item {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 6px;
            border-left: 4px solid #667eea;
        }
        
        .summary-item label {
            display: block;
            font-size: 12px;
            color: #999;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }
        
        .summary-item .amount {
            font-size: 24px;
            font-weight: 700;
            color: #333;
        }
        
        .total-summary {
            display: flex;
            justify-content: flex-end;
            margin: 30px 0;
        }
        
        .total-box {
            background-color: #667eea;
            color: white;
            padding: 30px 40px;
            border-radius: 6px;
            min-width: 300px;
            text-align: right;
        }
        
        .total-box .label {
            font-size: 13px;
            text-transform: uppercase;
            opacity: 0.9;
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .total-box .total-amount {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .total-box .payment-status {
            font-size: 12px;
            padding: 8px 15px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            display: inline-block;
        }
        
        .invoice-footer {
            background-color: #f9f9f9;
            padding: 30px 40px;
            border-top: 1px solid #e0e0e0;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 30px;
        }
        
        .footer-section h4 {
            font-size: 13px;
            text-transform: uppercase;
            color: #999;
            font-weight: 600;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
        }
        
        .footer-section p {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
        }
        
        .footer-divider {
            border-top: 1px solid #e0e0e0;
            padding-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #999;
        }
        
        .print-button {
            text-align: center;
            margin: 20px 0;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        
        .btn:hover {
            background-color: #764ba2;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            margin-left: 10px;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .status-paid {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-processing {
            background-color: #cfe2ff;
            color: #084298;
        }
        
        .status-shipped {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        
        .status-delivered {
            background-color: #d4edda;
            color: #155724;
        }
        
        @media (max-width: 768px) {
            .invoice-header {
                flex-direction: column;
                padding: 30px 20px;
            }
            
            .invoice-header .invoice-number {
                text-align: left;
                margin-top: 20px;
            }
            
            .invoice-body {
                padding: 20px;
            }
            
            .invoice-details {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .summary-box {
                grid-template-columns: 1fr;
            }
            
            .total-box {
                min-width: auto;
            }
            
            .invoice-table {
                font-size: 12px;
            }
            
            .invoice-table th,
            .invoice-table td {
                padding: 10px;
            }
            
            .print-button {
                margin-top: 20px;
            }
            
            .btn {
                display: block;
                width: 100%;
                margin-bottom: 10px;
            }
            
            .btn-secondary {
                margin-left: 0;
            }
        }
        
        @media print {
            body {
                background-color: white;
            }
            
            .invoice-container {
                box-shadow: none;
                margin: 0;
            }
            
            .print-button {
                display: none;
            }
            
            .invoice-header {
                page-break-after: avoid;
            }
            
            .invoice-table {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="invoice-header">
            <div class="company-info">
                <h1>{{ $company_profile->company_name ?? 'Your Company' }}</h1>
                <p><strong>Email:</strong> {{ $company_profile->support_email ?? 'zemathcmails@gmail.com' }}</p>
                <p><strong>Phone:</strong> {{ $company_profile->support_phone ?? '+91 705866 1621' }}</p>
            </div>
            <div class="invoice-number">
                <h2>Invoice</h2>
                <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                <p><strong>Order Time:</strong> {{ $order->created_at->format('h:i A') }}</p>
            </div>
        </div>
        
        <!-- Body -->
        <div class="invoice-body">
            <!-- Customer Details -->
            <div class="invoice-details">
                <div class="detail-section">
                    <h3>Bill To</h3>
                    <strong>{{ $order->customer_name }}</strong>
                    <p>{{ $order->customer_phone }}</p>
                </div>
                <div class="detail-section">
                    <h3>Shipping Address</h3>
                    @php
                        $shipping = json_decode($order->shipping_address, true);
                    @endphp
                    <strong>{{ $order->customer_name }}</strong>
                    <p>
                        {{ $shipping['line1'] ?? '' }}<br>
                        @if($shipping['line2'] ?? false)
                            {{ $shipping['line2'] }}<br>
                        @endif
                        {{ $shipping['city'] ?? '' }}, {{ $shipping['state'] ?? '' }} - {{ $shipping['pincode'] ?? '' }}<br>
                        {{ $shipping['country'] ?? 'India' }}
                    </p>
                </div>
            </div>
            
            <!-- Items Table -->
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>SKU</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: right;">Unit Price</th>
                        <th style="text-align: right;">Discount</th>
                        <th style="text-align: right;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($order->orderItems as $item)
                    <tr>
                        <td>
                            <strong>{{ $item->product->title ?? 'Product' }}</strong>
                        </td>
                        <td>{{ $item->product->sku ?? '-' }}</td>
                        <td style="text-align: center;">{{ $item->quantity }}</td>
                        <td style="text-align: right;">₹{{ number_format($item->mrp_amount, 2) }}</td>
                        <td style="text-align: right;">₹{{ number_format($item->discount_amount * $item->quantity, 2) }}</td>
                        <td style="text-align: right;">₹{{ number_format(($item->mrp_amount - $item->discount_amount) * $item->quantity, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #999;">No items found</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"></td>
                        <td style="text-align: right;"><strong>Subtotal:</strong></td>
                        <td style="text-align: right;">₹{{ number_format($order->mrp_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td style="text-align: right;"><strong>Total Discount:</strong></td>
                        <td style="text-align: right;">-₹{{ number_format($order->discount, 2) }}</td>
                    </tr>
                    <tr style="background-color: #667eea; color: white;">
                        <td colspan="4"></td>
                        <td style="text-align: right;"><strong>Total Amount:</strong></td>
                        <td style="text-align: right;"><strong>₹{{ number_format($order->paid_amount, 2) }}</strong></td>
                    </tr>
                </tfoot>
            </table>
            
            <!-- Summary -->
            <div class="summary-box">
                <div class="summary-item">
                    <label>Payment Status</label>
                    <div class="status-badge status-{{ strtolower($order->payment_status) }}">
                        {{ ucfirst($order->payment_status) }}
                    </div>
                </div>
                <div class="summary-item">
                    <label>Order Status</label>
                    <div class="status-badge status-{{ strtolower($order->order_status) }}">
                        {{ ucfirst($order->order_status) }}
                    </div>
                </div>
                <div class="summary-item">
                    <label>Payment Method</label>
                    <div style="font-weight: 600; color: #333;">
                        @if($order->payment_id)
                            Razorpay
                        @else
                            Cash on Delivery
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Total Box -->
            <div class="total-summary">
                <div class="total-box">
                    <div class="label">Total Amount Due</div>
                    <div class="total-amount">₹{{ number_format($order->paid_amount, 2) }}</div>
                    <div class="payment-status">
                        @if($order->payment_status == 'completed')
                            ✓ Payment Completed
                        @elseif($order->payment_status == 'pending')
                            ⏱ Payment Pending
                        @else
                            Payment {{ ucfirst($order->payment_status) }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="invoice-footer">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Payment Terms</h4>
                    <p>Payment is due upon receipt of this invoice. Please make payment within 30 days to avoid late charges.</p>
                </div>
                <div class="footer-section">
                    <h4>Contact & Support</h4>
                    <p><strong>Email:</strong> {{ $company_profile->support_email ?? 'zemathcmails@gmail.com' }}</p>
                    <p><strong>Phone:</strong> {{ $company_profile->support_phone ?? '+91 705866 1621' }}</p>
                    
                </div>
            </div>
            <div class="footer-divider">
                <p>Thank you for your business! This is a computer-generated invoice and does not require a signature.</p>
                <p style="margin-top: 10px; opacity: 0.7;">© {{ date('Y') }} {{ $company_profile->company_name ?? 'Your Company' }}. All rights reserved.</p>
            </div>
        </div>
    </div>
    
    <!-- Print Button -->
    <div class="print-button">
        <button class="btn" onclick="window.print()">Print Invoice</button>
        <a href="{{ route('account-order') }}" class="btn btn-secondary">Back to Orders</a>
    </div>
</body>
</html>
