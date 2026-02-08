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
                    <h4 class="title">Privacy Policy</h4>
                    <div class="breadcrumb-list">
                        <a class="breadcrumb-item" href="{{ route('index') }}">Home</a>
                        <div class="breadcrumb-item dot"><span></span></div>
                        <div class="breadcrumb-item current">Privacy Policy</div>
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
                        Zemat Healthcare (“we,” “our,” or “us”) is committed to protecting your privacy.
                        This Privacy Policy explains how we collect, use, disclose, and safeguard your
                        information when you visit or make a purchase from
                        <a href="https://www.zemathealthcare.com">www.zemathealthcare.com</a>
                        (the “Website”).
                    </p>

                    <h5 class="margin-bottom-10">1. Information We Collect</h5>

                    <strong class="margin-bottom-10">a. Personal Information</strong>
                    <p>We may collect personal information that you voluntarily provide, including:</p>
                    <ul>
                        <li>Full name</li>
                        <li>Email address</li>
                        <li>Phone number</li>
                        <li>Billing and shipping address</li>
                        <li>Payment information (processed securely by third-party payment providers)</li>
                        <li>Account login credentials</li>
                    </ul>

                    <strong class="margin-bottom-10">b. Health-Related Information</strong>
                    <p>When required for pharmaceutical purchases, we may collect:</p>
                    <ul>
                        <li>Prescription information</li>
                        <li>Medical or health details you provide voluntarily</li>
                    </ul>
                    <p>We handle health-related data with enhanced confidentiality and security.</p>

                    <strong class="margin-bottom-10">c. Automatically Collected Information</strong>
                    <p>When you visit our Website, we may automatically collect:</p>
                    <ul>
                        <li>IP address</li>
                        <li>Browser type and device information</li>
                        <li>Pages visited and time spent</li>
                        <li>Cookies and similar tracking technologies</li>
                    </ul>

                    <h5 class="margin-bottom-10">2. How We Use Your Information</h5>
                    <ul>
                        <li>Process and fulfill orders</li>
                        <li>Verify prescriptions and comply with legal obligations</li>
                        <li>Communicate order updates and customer support responses</li>
                        <li>Improve website functionality and user experience</li>
                        <li>Prevent fraud and ensure platform security</li>
                        <li>Send marketing communications (only with your consent)</li>
                    </ul>

                    <h5 class="margin-bottom-10">3. Disclosure of Your Information</h5>
                    <p>We may share your information with:</p>
                    <ul>
                        <li>Licensed pharmacists and healthcare professionals (as required)</li>
                        <li>Third-party service providers (payment processors, shipping partners, IT services)</li>
                        <li>Regulatory authorities when required by law</li>
                        <li>Law enforcement agencies to comply with legal obligations</li>
                    </ul>
                    <p class="margin-bottom-10">We do not sell or rent your personal or health information.</p>

                    <h5 class="margin-bottom-10">4. Data Security</h5>
                    <p class="margin-bottom-10">
                        We implement industry-standard administrative, technical, and physical safeguards
                        to protect your information, including:
                    </p>
                    <ul>
                        <li>SSL encryption</li>
                        <li>Secure servers</li>
                        <li>Restricted access to sensitive data</li>
                    </ul>
                    <p class="margin-bottom-10">Despite our efforts, no system can guarantee 100% security.</p>

                    <h5 class="margin-bottom-10">5. Cookies and Tracking Technologies</h5>
                    <p>We use cookies to:</p>
                    <ul>
                        <li>Enable essential website functions</li>
                        <li>Analyze website traffic</li>
                        <li>Remember user preferences</li>
                    </ul>
                    <p class="margin-bottom-10">You can control or disable cookies through your browser settings.</p>

                    <h5 class="margin-bottom-10">6. Your Rights and Choices</h5>
                    <p>Depending on your location, you may have the right to:</p>
                    <ul class="margin-bottom-10">
                        <li>Access your personal data</li>
                        <li>Request correction or deletion</li>
                        <li>Withdraw consent for marketing communications</li>
                        <li>Request data portability</li>
                    </ul>

                    <h5 class="margin-bottom-10">7. Compliance With Laws</h5>
                    <p>We comply with applicable data protection laws, including:</p>
                    <ul>
                        <li>GDPR (for EU users)</li>
                        <li>CCPA/CPRA (for California residents)</li>
                        <li>Applicable pharmaceutical and healthcare privacy regulations</li>
                    </ul>
                    <p class="margin-bottom-10">If you are a resident of the EU or California, additional rights may apply.</p>

                    <h5 class="margin-bottom-10">8. Third-Party Links</h5>
                    <p class="margin-bottom-10">
                        Our Website may contain links to third-party websites. We are not responsible for
                        the privacy practices of those websites.
                    </p>

                    <h5 class="margin-bottom-10">9. Children’s Privacy</h5>
                    <p class="margin-bottom-10">
                        Our Website is not intended for individuals under the age of 18. We do not knowingly
                        collect personal data from children.
                    </p>

                    <h5 class="margin-bottom-10">10. Changes to This Privacy Policy</h5>
                    <p class="margin-bottom-10">
                        We may update this Privacy Policy from time to time. Updates will be posted on this
                        page with a revised “Last Updated” date.
                    </p>

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