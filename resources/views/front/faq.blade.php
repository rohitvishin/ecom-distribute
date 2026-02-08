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
                    <h4 class="title">Frequently Asked Questions</h4>
                    <div class="breadcrumb-list">
                        <a class="breadcrumb-item" href="{{ route('index') }}">Home</a>
                        <div class="breadcrumb-item dot"><span></span></div>
                        <div class="breadcrumb-item current">Frequently Asked Questions</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Title Page -->

        <!-- FAQ -->
        <section class="s-faq flat-spacing-13">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8">
                        <ul class="faq-list">
                            <li class="faq-item">
                                <div class="faq-wrap" id="accordionShoping">
                                    <div class="widget-accordion">
                                        <div class="accordion-title" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne" role="button">
                                            <span>What is Zemat Healthcare?</span>
                                            <span class="icon icon-arrow-down"></span>
                                        </div>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionShoping">
                                            <div class="accordion-body widget-desc">
                                                <p class="text-main">
                                                   www.zemathealthcare.com is an online platform that allows customers to purchase genuine pharmaceutical and healthcare products conveniently, subject to applicable laws and regulations.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-accordion">
                                        <div class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo" role="button">
                                            <span>What payment methods do you accept??</span>
                                            <span class="icon icon-arrow-down"></span>
                                        </div>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionShoping">
                                            <div class="accordion-body widget-material">
                                                <p class="text-main">
                                                   We accept secure online payment methods such as:
                                                        • Credit/Debit Cards
                                                        • Net Banking
                                                        • UPI / Digital Wallets
                                                        • Cash on Delivery (if available in your location)
                                                    Available payment options may vary by region.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-accordion">
                                        <div class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree" role="button">
                                            <span>Is my payment information secure?</span>
                                            <span class="icon icon-arrow-down"></span>
                                        </div>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionShoping">
                                            <div class="accordion-body">
                                                <p class="text-main">
                                                    Yes. All transactions are processed through secure, encrypted payment gateways. We do not store your card or banking details.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-accordion">
                                        <div class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour" role="button">
                                            <span>How long does delivery take?</span>
                                            <span class="icon icon-arrow-down"></span>
                                        </div>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionShoping">
                                            <div class="accordion-body">
                                                <p class="text-main">
                                                    Delivery timelines depend on your location, prescription verification, and product availability. Estimated delivery times are shown at checkout.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="widget-accordion">
                                        <div class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour" role="button">
                                            <span>Can I track my order?</span>
                                            <span class="icon icon-arrow-down"></span>
                                        </div>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionShoping">
                                            <div class="accordion-body">
                                                <p class="text-main">
                                                    Yes. Once your order is shipped, you will receive a tracking link via email or SMS.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="widget-accordion">
                                        <div class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour" role="button">
                                            <span>Can I return medicines?</span>
                                            <span class="icon icon-arrow-down"></span>
                                        </div>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionShoping">
                                            <div class="accordion-body">
                                                <p class="text-main">
                                                    Due to safety and regulatory reasons, medicines cannot usually be returned. Returns or refunds are allowed only in specific cases such as damaged, expired, or incorrect products.
Please refer to our Return & Refund Policy for details.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="widget-accordion">
                                        <div class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour" role="button">
                                            <span>When will I receive my refund?</span>
                                            <span class="icon icon-arrow-down"></span>
                                        </div>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionShoping">
                                            <div class="accordion-body">
                                                <p class="text-main">
                                                    Approved refunds are processed within 20 business days to the original payment method.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="widget-accordion">
                                        <div class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour" role="button">
                                            <span>Are the medicines genuine?</span>
                                            <span class="icon icon-arrow-down"></span>
                                        </div>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionShoping">
                                            <div class="accordion-body">
                                                <p class="text-main">
                                                   Yes. All medicines sold on [Company Name] are sourced from licensed manufacturers and authorized distributors and comply with regulatory standards.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="widget-accordion">
                                        <div class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour" role="button">
                                            <span>Can your pharmacist consult me?</span>
                                            <span class="icon icon-arrow-down"></span>
                                        </div>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionShoping">
                                            <div class="accordion-body">
                                                <p class="text-main">
                                                 Our pharmacists may assist with order-related or medicine-usage queries, but they do not diagnose conditions or prescribe medication.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="widget-accordion">
                                        <div class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour" role="button">
                                            <span>What should I do if I receive the wrong or damaged product?</span>
                                            <span class="icon icon-arrow-down"></span>
                                        </div>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionShoping">
                                            <div class="accordion-body">
                                                <p class="text-main">
                                                Please contact customer support within 2 days of delivery with your order details and photos of the product. We’ll resolve it quickly.
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- /FAQ -->


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