<h2>Order Confirmed</h2>

<p>Hello {{ $order->customer_name }},</p>

<p>Your order has been placed successfully.</p>

<p><strong>Order ID:</strong> #{{ $order->id }}</p>
<p><strong>Amount Paid:</strong> ₹{{ number_format($order->paid_amount, 2) }}</p>
<p><strong>Payment Method:</strong> Cash on Delivery</p>

<p><strong>Shipping Address:</strong></p>
<p>
    {{ json_decode($order->shipping_address)->line1 }}<br>
    {{ json_decode($order->shipping_address)->city }},
    {{ json_decode($order->shipping_address)->state }} -
    {{ json_decode($order->shipping_address)->pincode }}
</p>

<p>We will notify you once the order is shipped.</p>

<p>Thank you for shopping with us.</p>
