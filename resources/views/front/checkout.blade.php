<!DOCTYPE html>

<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    @include('front.include.head')
</head>

<body>

    <!-- RTL -->
    <!-- <a href="javascript:void(0);" id="toggle-rtl" class="tf-btn animate-btn"><span>RTL</span></a> -->
    <!-- /RTL  -->

    <!-- Scroll Top -->
    <button id="goTop">
        <span class="border-progress"></span>
        <span class="icon icon-arrow-right"></span>
    </button>
    <!-- /Scroll Top -->


    <div id="wrapper">

        <!-- Top Bar-->
        @include('front.include.topbar')
        <!-- /Top Bar -->
        <!-- Header -->
        <header id="header" class="header-default header-absolute header-white header-uppercase">
            @include('front.include.header')
        </header>
        <!-- /Header -->

        <!-- Title Page -->
        <section class="tf-page-title" style="margin-top:20px;">
            <div class="container">
                <div class="box-title text-center">
                    <h4 class="title">Checkout</h4>
                    <div class="breadcrumb-list">
                        <a class="breadcrumb-item" href="{{route('index')}}">Home</a>
                        <div class="breadcrumb-item dot"><span></span></div>
                        <div class="breadcrumb-item current">Checkout</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Title Page -->

        <!-- Main Content -->
        <div class="flat-spacing-13">
            <form id="orderForm" method="POST" action="{{ route('order.place') }}">
    @csrf
                <div class="container">
                    <div class="row">
                            <div class="col-xl-8">
                                <div class="tf-checkout-cart-main">
                                    <div class="box-ip-select">
                                        <div class="title">
                                            <div class="text-lg fw-medium">Enter Delivery Address</div>
                                        </div>

                                        <div class="grid-3 mb_16">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" placeholder="Full Name" name="customer_name" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="tel" placeholder="Mobile Number"  name="customer_phone" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Address Line 1</label>
                                                <input type="text" placeholder="Address Line 1" name="address_line1" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Address Line 2</label>
                                                <input type="text" placeholder="Area, Landmark" name="address_line2" class="form-control" placeholder="Area, Landmark">
                                            </div>

                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" placeholder="City" required>
                                            </div>

                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" name="state" class="form-control" placeholder="State" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Pincode</label>
                                                <input type="text" name="pincode" class="form-control" placeholder="Pincode" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" value="India" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="box-ip-shipping">
                                        <div class="title text-lg fw-medium">Payment Method</div>
                                        <fieldset class="mb_16">
                                            <label for="cod" class="check-ship">
                                                <input type="radio" id="cod" class="tf-check-rounded" name="payment_method" value="cod" checked>
                                                <span class="text text-sm">
                                                    <span>Cash On Delivery (Estimated delivery in 2–3 days)</span>
                                                </span>
                                            </label>
                                        </fieldset>

                                        <fieldset class="mb_16">
                                            <label for="razorpay" class="check-ship">
                                                <input type="radio" id="razorpay" class="tf-check-rounded" name="payment_method" value="razorpay">
                                                <span class="text text-sm">
                                                    <span>Pay with Razorpay (Secure Online Payment)</span>
                                                </span>
                                            </label>
                                        </fieldset>                                
                                    </div>
                                
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="tf-page-cart-sidebar">
                                    @php
                                        $totalMrp = 0;
                                        $totalDiscount = 0;
                                    @endphp

                                    <div class="cart-box order-box">
                                        <div class="title text-lg fw-medium">In your cart</div>

                                        <ul class="list-order-product">
                                            @foreach (get_cart_items() as $item)
                                                @php
                                                    $mrp = $item->product->mrp ?? $item->product->selling_price;
                                                    $discount = $item->product->discount ?? 0;

                                                    $totalMrp += $mrp * $item->quantity;
                                                    $totalDiscount += $discount * $item->quantity;
                                                @endphp

                                                <li class="order-item">
                                                    <figure class="img-product">
                                                        <img src="{{ $item->product->product_images[0]->image_url }}" alt="product">
                                                    </figure>
                                                    <div class="content">
                                                        <div class="info">
                                                            <p class="name text-sm fw-medium">
                                                                {{ $item->product->title }} × {{ $item->quantity }}
                                                            </p>
                                                        </div>
                                                        <span class="price text-sm fw-medium">
                                                            ₹{{ number_format($item->product->selling_price * $item->quantity, 2) }}
                                                        </span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>

                                        @php
                                            $finalPrice = $totalMrp - $totalDiscount;
                                        @endphp

                                        <ul class="list-total">
                                            <li class="total-item text-sm d-flex justify-content-between">
                                                <span>Total MRP:</span>
                                                <span class="price-sub fw-medium">₹{{ number_format($totalMrp, 2) }} INR</span>
                                            </li>

                                            <li class="total-item text-sm d-flex justify-content-between">
                                                <span>Discount:</span>
                                                <span class="price-discount fw-medium">
                                                    − ₹{{ number_format($totalDiscount, 2) }} INR
                                                </span>
                                            </li>

                                            <!-- <li class="total-item text-sm d-flex justify-content-between">
                                                <span>Tax:</span>
                                                <span class="price-tax fw-medium">₹0.00 INR</span>
                                            </li> -->
                                        </ul>

                                        <div class="subtotal text-lg fw-medium d-flex justify-content-between">
                                            <span>Subtotal:</span>
                                            <span class="total-price-order">
                                                ₹{{ number_format($finalPrice, 2) }} INR
                                            </span>
                                        </div>

                                        <div class="btn-order">
                                            <button type="submit" id="submitBtn"
                                                class="tf-btn btn-dark2 animate-btn w-100 text-transform-none">
                                                Place order
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /Main Content -->

        <!-- Footer -->
        @include('front.include.footer')
        <!-- /Footer -->

        <!-- sidebar account-->
        <div class="offcanvas offcanvas-start canvas-sidebar" id="mbAccount">
            <div class="canvas-wrapper">
                <div class="canvas-header">
                    <span class="title">SIDEBAR ACCOUNT</span>
                    <button class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="canvas-body">
                    <div class="sidebar-account-wrap sidebar-mobile-append"></div>
                </div>
            </div>
        </div>
        <!-- End sidebar account -->

    </div>

    <!-- toolbar -->
   @include('front.include.toolbar')
    <!-- /toolbar  -->

    <!-- shoppingCart -->
    @include('front.include.cart')
    <!-- /shoppingCart -->

    <!-- Javascript -->
    <script src="{{asset_front('js/jquery.min.js')}}"></script>
    <script src="{{asset_front('js/bootstrap.min.js')}}"></script>
    <script src="{{asset_front('js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset_front('js/carousel.js')}}"></script>
    <script src="{{asset_front('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset_front('js/lazysize.min.js')}}"></script>
    <script src="{{asset_front('js/count-down.js')}}"></script>
    <script src="{{asset_front('js/wow.min.js')}}"></script>
    <script src="{{asset_front('js/multiple-modal.js')}}"></script>
    <script src="{{asset_front('js/api/logout.js')}}"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        console.log('Checkout script loaded');

        // Wait for jQuery to be available
        function initCheckout() {
            if (typeof $ === 'undefined') {
                console.log('Waiting for jQuery to load...');
                setTimeout(initCheckout, 100);
                return;
            }

            console.log('jQuery available, initializing...');

            $(document).ready(function() {
                console.log('Document ready - initializing checkout');
                
                calculateTotalPrice();

                // Handle form submission
                $('#orderForm').on('submit', async function(e) {
                    console.log('Form submit triggered');
                    e.preventDefault();

                    const paymentMethod = $('input[name="payment_method"]:checked').val();
                    console.log('Payment method selected:', paymentMethod);

                    // Validate form
                    if (!this.checkValidity()) {
                        e.stopPropagation();
                        $(this).addClass('was-validated');
                        return false;
                    }

                    if (paymentMethod === 'cod') {
                        console.log('Submitting as COD');
                        // For COD, submit normally
                        this.submit();
                    } else if (paymentMethod === 'razorpay') {
                        console.log('Handling Razorpay payment');
                        // For Razorpay, create order first then process payment
                        await handleRazorpayPayment();
                    }
                });

                // show/hide checkout form based on address selection
                $('#select-address').on('change', function() {
                    if (this.value === 'new') {
                        $('.box-ip-checkout').show();
                    } else {
                        $('.box-ip-checkout').hide();
                    }
                });

            }); // End of document.ready
        }
        // Start initialization
        document.addEventListener('DOMContentLoaded', initCheckout);
        // initCheckout();

        // calculate total-price-order in cart sidebar
        function calculateTotalPrice() {
            console.log("Calculating total price...");
            return;
            let totalPrice = 0;
            let discountPrice = 0;
            $('.list-order-product .order-item').each(function() {
                const priceText = $(this).find('.price').text().replace('₹', '').trim();
                const quantityText = $(this).find('.quantity').text().trim();
                 const discountText = $(this).find('.item-price-discount').text().replace('₹', '').trim();
                 console.log(discountText);
                const price = parseFloat(priceText);
                const quantity = parseInt(quantityText);
                const discount = parseInt(discountText);
                if (!isNaN(discount)) {
                   discountPrice += discount;
                }
                if (!isNaN(price) && !isNaN(quantity)) {
                    totalPrice += price * quantity;
                }
            });
            const priceSub= totalPrice + discountPrice;
            $('.total-price-order').text('₹' + totalPrice.toFixed(2) + ' INR');
            // update price-discount
            $('.price-discount').text('-₹' + discountPrice.toFixed(2) + ' INR');
            $('.price-sub').text('₹' + priceSub.toFixed(2) + ' INR');
        }

        // Handle Razorpay payment
        async function handleRazorpayPayment() {
            const form = document.getElementById('orderForm');
            const formData = new FormData(form);

            try {
                // Submit the form via AJAX to create order
                const response = await fetch('{{ route("order.place") }}', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();
                console.log('Order creation response:', data);

                if (!data.success) {
                    alert('Error: ' + (data.error || 'Failed to create order'));
                    return;
                }

                // Open Razorpay payment modal
                const orderId = data.order_id;
                console.log('Order created with ID:', orderId);
                
                const createOrderResponse = await fetch('{{ route("razorpay.create") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: JSON.stringify({
                        order_id: orderId
                    })
                });

                console.log('Razorpay create order response status:', createOrderResponse.status);
                const orderData = await createOrderResponse.json();
                console.log('Razorpay order data:', orderData);

                if (!orderData.success) {
                    alert('Error: ' + (orderData.error || 'Failed to create Razorpay order'));
                    return;
                }

                // Initialize Razorpay payment
                const options = {
                    key: orderData.razorpay_key_id,
                    amount: orderData.amount,
                    currency: 'INR',
                    name: 'Your Store',
                    description: 'Order #' + orderId,
                    order_id: orderData.razorpay_order_id,
                    customer_details: {
                        name: orderData.customer_name,
                        email: orderData.customer_email,
                        contact: orderData.customer_contact
                    },
                    handler: async function(response) {
                        // Verify payment signature
                        const verifyResponse = await fetch('{{ route("razorpay.verify") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                            body: JSON.stringify({
                                razorpay_payment_id: response.razorpay_payment_id,
                                razorpay_order_id: response.razorpay_order_id,
                                razorpay_signature: response.razorpay_signature
                            })
                        });

                        const verifyData = await verifyResponse.json();

                        if (verifyData.success) {
                            // Payment successful
                            window.location.href = '{{ route("account-order") }}?success=Payment+successful';
                        } else {
                            alert('Payment verification failed: ' + (verifyData.error || 'Unknown error'));
                        }
                    },
                    modal: {
                        ondismiss: async function() {
                            // Payment cancelled
                            await fetch('{{ route("razorpay.failed") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'X-Requested-With': 'XMLHttpRequest',
                                },
                                body: JSON.stringify({
                                    razorpay_order_id: orderData.razorpay_order_id,
                                    error_message: 'User cancelled payment'
                                })
                            });
                            alert('Payment cancelled');
                        }
                    }
                };

                const rzp1 = new Razorpay(options);
                rzp1.open();

            } catch (error) {
                console.error('Error:', error);
                alert('Error processing payment: ' + error.message);
            }
        }
    </script>
</body>

</html>