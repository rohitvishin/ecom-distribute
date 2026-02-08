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
                    <h4 class="title">Terms & Condition</h4>
                    <div class="breadcrumb-list">
                        <a class="breadcrumb-item" href="{{ route('index') }}">Home</a>
                        <div class="breadcrumb-item dot"><span></span></div>
                        <div class="breadcrumb-item current">Terms & Condition</div>
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
                        Welcome to BLUE LEAF (“Company,” “we,” “our,” or “us”). These Terms and Conditions (“Terms”) govern your access to and use of www.zemathealthcare.com (the “Website”) and any purchases made through it.
                        By accessing or using this Website, you agree to be bound by these Terms. If you do not agree, please do not use the Website.
                    </p>

                    <h5 class="margin-bottom-10">1. Eligibility to Use the Website</h5>
                    <ul class="margin-bottom-10">
                        <li>You must be at least 18 years old to use this Website.</li>
                        <li>By using the Website, you confirm that you are legally capable of entering into a binding agreement.</li>
                        <li>Certain products may only be purchased by users who meet additional legal or medical requirements.</li>
                    </ul>

                   
                    <h5 class="margin-bottom-10">2. Medical Disclaimer</h5>
                    <ul class="margin-bottom-10">
                        <li>The content on this Website is provided for informational purposes only and is not a substitute for professional medical advice, diagnosis, or treatment.</li>
                        <li>Always consult a licensed physician or qualified healthcare provider before using any medication.</li>
                        <li>Do not disregard medical advice or delay treatment based on information from this Website.</li>                        
                    </ul>

                    <h5 class="margin-bottom-10">3. Prescription Medications</h5>
                    <p>The following items are not eligible for return or refund:</p>
                    <ul class="margin-bottom-10">
                        <li>Prescription medications will only be dispensed upon receipt and verification of a valid prescription from a licensed healthcare professional.</li>
                        <li>Verify prescriptions with prescribing physicians</li>
                        <li>Refuse or cancel orders that do not comply with legal or regulatory requirements</li>
                        <li>Submission of false, altered, or expired prescriptions is strictly prohibited.</li>
                    </ul>

                    <h5 class="margin-bottom-10">4. Orders and Acceptance</h5>
                    <ul class="margin-bottom-10">
                        <li>All orders placed through the Website are subject to acceptance and availability.</li>
                        <li>We reserve the right to refuse, cancel, or limit quantities of any order at our sole discretion.</li>
                        <li>Order confirmation does not guarantee acceptance; fulfillment occurs only after verification and processing.</li>
                    </ul>

                    <h5 class="margin-bottom-10">5. Pricing and Payment</h5>
                    <ul class="margin-bottom-10">
                        <li>All prices are listed in Indian Rupees and are subject to change without notice.</li>
                        <li>Payment must be made through approved payment methods available on the Website.</li>
                        <li>We are not responsible for pricing errors and reserve the right to cancel orders resulting from such errors.</li>
                    </ul>

                    <h5 class="margin-bottom-10">6. Shipping and Delivery</h5>
                    <ul class="margin-bottom-10">
                        <li>Delivery timelines are estimates and may vary due to regulatory checks, courier delays, or force majeure events.</li>
                        <li>We are not responsible for delays caused by incorrect shipping information provided by the user.</li>
                        <li>Certain medications may have shipping restrictions based on location.</li>
                    </ul>

                    <h5 class="margin-bottom-10">7. Returns and Refunds</h5>
                    <ul>
                        <li>Due to the nature of pharmaceutical products, returns may be restricted or prohibited by law.</li>
                        <li>Refunds, if applicable, will be processed in accordance with our Return & Refund Policy.</li>
                        <li>Opened, used, or temperature-sensitive medications are generally non-returnable.</li>
                    </ul>

                    <h5 class="margin-bottom-10">8. User Accounts</h5>
                    <ul>
                        <li>You are responsible for maintaining the confidentiality of your account credentials.</li>
                        <li>You agree to provide accurate, complete, and current information.</li>
                        <li>We reserve the right to suspend or terminate accounts for misuse or violation of these Terms.</li>
                    </ul>

                    <h5 class="margin-bottom-10">9.Prohibited Use [You agree not to]</h5>
                    <ul>
                        <li>Use the Website for unlawful purposes.</li>
                        <li>Attempt to obtain medications without a valid prescription.</li>
                        <li>Misrepresent your identity or medical information.</li>
                        <li>Interfere with Website security or functionality.</li>
                        <li>Resell or redistribute medications purchased from us.</li>
                    </ul>

                    <h5 class="margin-bottom-10">10. Intellectual Property</h5>
                    <ul>
                        <li>All content on this Website, including text, logos, graphics, and software, is the property of BLUE LEAF or its licensors.</li>
                        <li>Unauthorized use, reproduction, or distribution is strictly prohibited.</li>
                    </ul>

                    <h5 class="margin-bottom-10">11. Limitation of Liability</h5>
                    <ul>
                        <li>We shall not be liable for any indirect, incidental, special, or consequential damages.</li>
                        <li>Our total liability shall not exceed the amount paid by you for the product giving rise to the claim.</li>
                    </ul>

                    <h5 class="margin-bottom-10">12. Indemnification</h5>
                    <p>You agree to indemnify and hold harmless BLUE LEAF, its directors, officers, employees, and partners from any claims arising out of:</p>
                    <ul>
                        <li>Your violation of these Terms.</li>
                        <li>Misuse of the Website or products.</li>
                        <li>Submission of inaccurate or false information.</li>
                    </ul>

                     <h5 class="margin-bottom-10">13. Privacy</h5>
                     <p>Your use of the Website is also governed by our Privacy Policy, which explains how we collect and use personal and health-related information.</p>

                     <h5 class="margin-bottom-10">14. Regulatory Compliance</h5>
                     <p>We operate in compliance with applicable pharmaceutical, healthcare, and data protection laws, including but not limited to:</p>
                     <ul>
                        <li>Drug and pharmacy regulations</li>
                        <li>Consumer protection laws</li>
                        <li>Data privacy laws (e.g., GDPR, CCPA, HIPAA where applicable)</li>
                    </ul>

                    <h5 class="margin-bottom-10">15. Termination</h5>
                     <p>We reserve the right to suspend or terminate your access to the Website at any time, without notice, for violation of these Terms or applicable laws.</p>

                    <h5 class="margin-bottom-10">16. Governing Law and Jurisdiction</h5>
                     <p>These Terms shall be governed by and construed in accordance with the laws of [Mumbai,Maharashtra], without regard to conflict of law principles.</p>
                    
                     <h5 class="margin-bottom-10">17. Changes to These Terms</h5>
                     <p>We may update these Terms from time to time. Changes will be effective immediately upon posting on the Website. Continued use of the Website constitutes acceptance of the revised Terms.</p>


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