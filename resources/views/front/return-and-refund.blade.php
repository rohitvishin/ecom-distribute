<!DOCTYPE html>

<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
<style>
    .margin-bottom-10 {
        margin-bottom: 10px;
    }
</style>
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

    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->

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
        <section class="tf-page-title" style="margin-top: 20px;">
            <div class="container">
                <div class="box-title text-center">
                    <h4 class="title">Return & Refund Policy</h4>
                    <div class="breadcrumb-list">
                        <a class="breadcrumb-item" href="{{ route('index') }}">Home</a>
                        <div class="breadcrumb-item dot"><span></span></div>
                        <div class="breadcrumb-item current">Return & Refund Policy</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Title Page -->

        <!-- Privacy policy -->
        <section class="s-term-user flat-spacing-13">
            <div class="container">
                <div class="content">
                    <div class="term-item">
                    <p class="margin-bottom-10">
                        At BLUE LEAF, customer safety and satisfaction are our top priorities. Due to the sensitive nature of pharmaceutical products, our return and refund policy follows strict quality and regulatory standards.
                    </p>

                    <h5 class="margin-bottom-10">1. General Policy</h5>
                    <ul class="margin-bottom-10">
                        <li>Medicines and healthcare products are subject to strict regulatory guidelines.</li>
                        <li>Once delivered, most pharmaceutical products cannot be returned due to safety, hygiene, and storage concerns.</li>
                        <li>Refunds or replacements are only provided in specific, eligible circumstances outlined below.</li>
                    </ul>

                   
                    <h5 class="margin-bottom-10">2. Eligible Cases for Return or Refund</h5>
                    <p>You may be eligible for a return, replacement, or refund if :</p>
                    <ul class="margin-bottom-10">
                        <li>You received damaged, defective, or expired products</li>
                        <li>You received the wrong product or incorrect quantity</li>
                        <li>The order was lost in transit or not delivered</li>
                        <li>The product was tampered with or packaging was compromised at the time of delivery</li>                        
                    </ul>

                    <h5 class="margin-bottom-10">3. Non-Returnable / Non-Refundable Items</h5>
                    <p>The following items are not eligible for return or refund:</p>
                    <ul class="margin-bottom-10">
                        <li>Prescription medications (unless damaged, expired, or incorrectly supplied)</li>
                        <li>Opened, used, or partially consumed products</li>
                        <li>Products requiring cold-chain storage (unless damaged on arrival)</li>
                        <li>Products returned without original packaging or labels</li>
                        <li>Orders returned due to customer error (e.g., wrong address, refusal of delivery)</li>
                    </ul>

                    <h5 class="margin-bottom-10">4. Return Request Process</h5>
                    <p class="margin-bottom-10">
                       To request a return or refund:
                    </p>
                    <ul class="margin-bottom-10">
                        <li>Contact our customer support team within 2 days of delivery</li>
                        <li>Provide your order number and reason for the request</li>
                        <li>Share photos or videos of the product and packaging, if requested</li>
                        <li>Await verification and approval from our team</li>
                        <li>Unauthorized returns will not be accepted.</li>
                    </ul>

                    <h5 class="margin-bottom-10">5. Inspection and Approval</h5>
                    <ul class="margin-bottom-10">
                        <li>All approved returns are subject to quality inspection.</li>
                        <li>We reserve the right to reject a return or refund if the product does not meet eligibility criteria.</li>
                        <li>Decisions made by BLUE LEAF shall be final and in accordance with applicable laws.</li>
                    </ul>

                    <h5 class="margin-bottom-10">6. Refund Method and Timeline</h5>
                    <ul class="margin-bottom-10">
                        <li>Approved refunds will be processed to the original payment method.</li>
                        <li>Refund processing may take 15 business days after approval.</li>
                        <li>Shipping charges, taxes, or handling fees may be non-refundable unless required by law.</li>
                    </ul>

                    <h5 class="margin-bottom-10">7. Replacement Policy</h5>
                    <ul>
                        <li>In eligible cases, we may offer a replacement instead of a refund.</li>
                        <li>Replacements are subject to product availability and regulatory approval.</li>
                    </ul>

                    <h5 class="margin-bottom-10">8. Order Cancellation</h5>
                    <ul>
                        <li>Orders may be cancelled before shipment by contacting customer support.</li>
                        <li>Once shipped, orders cannot be cancelled.</li>
                        <li>Prescription orders cannot be cancelled once verification is completed.</li>
                    </ul>

                    <h5 class="margin-bottom-10">9. Shipping and Handling</h5>
                    <ul>
                        <li>Return shipping may be arranged or reimbursed at our discretion.</li>
                        <li>We are not responsible for returns damaged during unauthorized shipping.</li>
                    </ul>

                    <h5 class="margin-bottom-10">10. Regulatory Compliance</h5>
                    <ul>
                        <li>Pharmaceutical and drug safety regulations</li>
                        <li>Consumer protection laws</li>
                        <li>Public health and hygiene standards</li>
                    </ul>

                    </div>

                    
                </div>
            </div>
        </section>
        <!-- /Privacy policy -->


        @include('front.include.footer')

         <!-- toolbar -->
        @include('front.include.toolbar')
        <!-- /toolbar  -->
        <!-- login -->
        <div class="offcanvas offcanvas-end popup-style-1 popup-login" id="login">
            <div class="canvas-wrapper">
                <div class="canvas-header popup-header">
                    <span class="title">Log in</span>
                    <button class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="canvas-body popup-inner">
                    @include('front.include.login')
                </div>
            </div>
        </div>
        <!-- /login -->
        <!-- shoppingCart -->
        @include('front.include.cart')
        <!-- /shoppingCart -->
    </div>


    <!-- Javascript -->
    <script src="{{ asset_front('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset_front('js/jquery.min.js') }}"></script>
    <script src="{{ asset_front('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset_front('js/carousel.js') }}"></script>
    <script src="{{ asset_front('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset_front('js/lazysize.min.js') }}"></script>
    <script src="{{ asset_front('js/count-down.js') }}"></script>
    <script src="{{ asset_front('js/wow.min.js') }}"></script>
    <script src="{{ asset_front('js/multiple-modal.js') }}"></script>
    <script src="{{ asset_front('js/main.js') }}"></script>
</body>

</html>