# Razorpay Integration - API Examples & Response Formats

## Frontend to Backend Flow

### 1️⃣ Submit Checkout Form (for Razorpay)

**Request:**
```javascript
POST /place-order
Content-Type: multipart/form-data

{
  customer_name: "John Doe",
  email: "john@example.com",
  customer_phone: "9876543210",
  address_line1: "123 Main Street",
  address_line2: "Apt 4B",
  city: "Mumbai",
  state: "Maharashtra",
  pincode: "400001",
  payment_method: "razorpay"
}
```

**Response (Success):**
```json
{
  "success": true,
  "order_id": 42,
  "redirect": "/razorpay/create-order?order_id=42",
  "message": "Order created. Proceeding to payment..."
}
```

**Response (Error):**
```json
{
  "success": false,
  "error": "Failed to create order: Database error message"
}
```

---

### 2️⃣ Create Razorpay Order

**Request:**
```javascript
POST /razorpay/create-order
Content-Type: application/json
X-CSRF-TOKEN: {{ csrf_token }}

{
  "order_id": 42
}
```

**Response (Success):**
```json
{
  "success": true,
  "razorpay_order_id": "order_1A8l5n40U5sDZ9",
  "razorpay_key_id": "rzp_live_12345abcde",
  "amount": 149900,
  "customer_name": "John Doe",
  "customer_email": "john@example.com",
  "customer_contact": "9876543210"
}
```

**Response (Error):**
```json
{
  "success": false,
  "error": "Failed to create Razorpay order"
}
```

---

### 3️⃣ Verify Payment (After Razorpay Checkout)

**Request:**
```javascript
POST /razorpay/verify-payment
Content-Type: application/json
X-CSRF-TOKEN: {{ csrf_token }}

{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_1A8l5n40U5sDZ9",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

**Response (Success):**
```json
{
  "success": true,
  "message": "Payment verified successfully",
  "order_id": 42
}
```

**Response (Verification Failed):**
```json
{
  "success": false,
  "error": "Invalid payment signature"
}
```

---

### 4️⃣ Record Payment Failure

**Request:**
```javascript
POST /razorpay/payment-failed
Content-Type: application/json
X-CSRF-TOKEN: {{ csrf_token }}

{
  "razorpay_order_id": "order_1A8l5n40U5sDZ9",
  "error_message": "User cancelled payment"
}
```

**Response:**
```json
{
  "success": true,
  "message": "Payment failure recorded"
}
```

---

## Database Records

### Order Table (After Successful Razorpay Payment)

```sql
SELECT * FROM orders WHERE id = 42;

id           42
user_id      7
payment_status   'paid'              -- Updated to 'paid' after payment
mrp_amount       150.00
discount         0.00
paid_amount      150.00
payment_id       'pay_29QQoUBi66xm2f'  -- Razorpay payment ID
order_status     'processing'        -- Updated after payment
customer_name    'John Doe'
customer_phone   '9876543210'
```

### Payment Table (New Record Created)

```sql
SELECT * FROM payments WHERE order_id = 42;

id                    15
order_id              42
user_id               7
payment_method        'razorpay'
amount                150.00
currency              'INR'
status                'captured'       -- Payment captured
razorpay_payment_id   'pay_29QQoUBi66xm2f'
razorpay_order_id     'order_1A8l5n40U5sDZ9'
razorpay_signature    '9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d'
razorpay_response     { JSON response from Razorpay }
paid_at               '2026-05-31 14:30:45'
created_at            '2026-05-31 14:30:10'
updated_at            '2026-05-31 14:30:45'
```

---

## Browser Console Flow (JavaScript)

```javascript
// 1. User submits form
fetch('/place-order', {
  method: 'POST',
  body: formData
})
// Returns: { success: true, order_id: 42 }

// 2. Create Razorpay order
fetch('/razorpay/create-order', {
  method: 'POST',
  body: JSON.stringify({ order_id: 42 })
})
// Returns: { success: true, razorpay_order_id: "order_..." }

// 3. Open Razorpay modal
const rzp = new Razorpay(options)
rzp.open()  // User enters payment details

// 4. On successful payment
fetch('/razorpay/verify-payment', {
  method: 'POST',
  body: JSON.stringify({
    razorpay_payment_id: "pay_...",
    razorpay_order_id: "order_...",
    razorpay_signature: "signature..."
  })
})
// Returns: { success: true }
// Redirects to: /account-order
```

---

## Error Scenarios

### Scenario 1: Invalid Signature
```
User completes payment, but signature verification fails
↓
Response: { success: false, error: "Invalid payment signature" }
↓
User sees: "Payment verification failed"
↓
Payment record status: 'failed'
Order status: remains 'pending'
```

### Scenario 2: Order Not Found
```
Payment verified successfully, but order doesn't exist
↓
Response: { success: false, error: "Payment record not found" }
↓
User sees: "Payment verification failed"
↓
Payment record: not created
```

### Scenario 3: User Cancels Payment
```
User clicks close on Razorpay modal
↓
Request: POST /razorpay/payment-failed with order_id
↓
Response: { success: true, message: "Payment failure recorded" }
↓
Payment record status: 'failed'
Order status: remains 'pending'
User can retry payment
```

---

## Logging Examples

### `storage/logs/laravel.log`

```
[2026-05-31 14:30:10] local.INFO: Razorpay order creation for Order ID: 42
[2026-05-31 14:30:15] local.INFO: Razorpay order created: order_1A8l5n40U5sDZ9
[2026-05-31 14:30:45] local.INFO: Payment verified successfully: pay_29QQoUBi66xm2f
[2026-05-31 14:30:46] local.INFO: Order 42 updated: payment_status=paid, order_status=processing
[2026-05-31 14:31:00] local.INFO: Payment record saved for order 42

# In case of failure:
[2026-05-31 14:35:00] local.ERROR: Razorpay payment verification failed: Invalid signature
[2026-05-31 14:35:01] local.WARNING: Payment 'pay_29QQoUBi66xm2f' marked as failed
```

---

## HTTP Status Codes

| Endpoint | Success | Error | Validation |
|----------|---------|-------|-----------|
| `/place-order` | 200 (redirect) | 400 | Validates form fields |
| `/razorpay/create-order` | 200 | 400, 401, 500 | Validates order ownership |
| `/razorpay/verify-payment` | 200 | 400, 401, 500 | Validates signature |
| `/razorpay/payment-failed` | 200 | 400, 401, 500 | Validates order |

---

## Testing with Postman/cURL

### Create Razorpay Order

```bash
curl -X POST http://your-app.test/razorpay/create-order \
  -H "Content-Type: application/json" \
  -H "X-CSRF-TOKEN: your_csrf_token" \
  -H "Cookie: XSRF-TOKEN=your_token; PHPSESSID=your_session" \
  -d '{
    "order_id": 42
  }'
```

### Verify Payment

```bash
curl -X POST http://your-app.test/razorpay/verify-payment \
  -H "Content-Type: application/json" \
  -H "X-CSRF-TOKEN: your_csrf_token" \
  -H "Cookie: XSRF-TOKEN=your_token; PHPSESSID=your_session" \
  -d '{
    "razorpay_payment_id": "pay_29QQoUBi66xm2f",
    "razorpay_order_id": "order_1A8l5n40U5sDZ9",
    "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
  }'
```

---

## Key Points to Remember

1. **CSRF Token Required**: All AJAX requests need X-CSRF-TOKEN header
2. **Authentication Required**: All endpoints require authenticated user
3. **Order Must Exist**: Order created before Razorpay order creation
4. **Signature Verification**: Must succeed before updating order status
5. **Idempotency**: Same payment can't be processed twice (unique razorpay_payment_id)
6. **Status Transitions**: 
   - Order created: payment_status='pending'
   - Payment successful: payment_status='paid', order_status='processing'
   - Payment failed: payment_status='pending', order remains unchanged

---

## Production Considerations

1. **Use HTTPS**: Required by Razorpay in production
2. **Monitor Logs**: Check logs regularly for payment failures
3. **Handle Exceptions**: Ensure proper error messages for users
4. **Rate Limiting**: Consider rate limiting payment verification endpoint
5. **Webhook Verification**: Implement webhooks for additional security
6. **Timeout Handling**: Handle cases where payment is completed but verification fails
7. **Database Backup**: Regular backups to avoid losing payment records
