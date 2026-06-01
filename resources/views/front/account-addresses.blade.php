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
        <section class="tf-page-title">
            <div class="container">
                <div class="box-title text-center">
                    <h4 class="title">Addresses</h4>
                    <div class="breadcrumb-list">
                        <a class="breadcrumb-item" href="index.html">Home</a>
                        <div class="breadcrumb-item dot"><span></span></div>
                        <div class="breadcrumb-item current">Addresses</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Title Page -->

        <!-- Main Content -->
        <div class="flat-spacing-13">
            <div class="container-7">
                <!-- sidebar-account -->
                <div class="btn-sidebar-mb d-lg-none">
                    <button data-bs-toggle="offcanvas" data-bs-target="#mbAccount">
                        <i class="icon icon-sidebar"></i>
                    </button>
                </div>
                <!-- /sidebar-account -->
                <!-- Account -->
                <div class="main-content-account">
                    @include('front.include.account-sidebar')
                    <div class="my-acount-content account-address">
                        <h6 class="title-account">
                            Your addresses (@if(count($addresses) > 0) {{count($addresses)}} @else 0 @endif)
                        </h6>
                        <div class="widget-inner-address ">
                            <button class="tf-btn btn-add-address animate-btn">
                                Add new address
                            </button>
                            <form action="#" class="wd-form-address form-default show-form-address">
                                <div class="cols">
                                    <fieldset>
                                        <label for="first-name">First Name</label>
                                        <input type="text" id="first-name" required>
                                    </fieldset>
                                    <fieldset>
                                        <label for="last-name">Last Name</label>
                                        <input type="text" id="last-name" required>
                                    </fieldset>
                                </div>
                             
                                <div class="cols">
                                    <fieldset>
                                        <label for="address-1">Address 1</label>
                                        <input type="text" id="address-1" required>
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <label for="address-2">Address 2 (optional)</label>
                                        <input type="text" id="address-2">
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <label for="city">City</label>
                                        <input type="text" id="city" required>
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <label for="region">State</label>
                                        <input type="text" id="state" required>
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <label for="zip-code">PIN code</label>
                                        <input type="text" id="zip-code" required>
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" required>
                                    </fieldset>
                                </div>
                                <div class="tf-cart-checkbox">
                                    <input type="checkbox" name="availability" class="tf-check" checked
                                        id="default-address-add">
                                    <label for="default-address-add" class="label">
                                        <span>Set as default address</span>
                                    </label>
                                </div>
                                <div class="box-btn">
                                    <button class="tf-btn animate-btn" type="submit">
                                        Update
                                    </button>
                                    <a href="javascript:void(0);" class="tf-btn btn-out-line-dark btn-hide-address">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                            <ul class="list-account-address tf-grid-layout md-col-2">
                                <li class="account-address-item">
                                    <p class="title text-md fw-medium">
                                        15 Yarran st (Default address)
                                    </p>
                                    <div class="info-detail">
                                        <div class="box-infor">
                                            <p class="text-md">BLUE LEAFPham</p>
                                            <p class="text-md">account@vince.com</p>
                                            <p class="text-md">Company</p>
                                            <p class="text-md">16 Yarran st</p>
                                            <p class="text-md">Punchbowl</p>
                                            <p class="text-md">Indore</p>
                                            <p class="text-md">2196</p>
                                            <p class="text-md">+61 1234 3435</p>
                                        </div>
                                        <div class="box-btn">
                                            <button class="tf-btn btn-out-line-dark btn-edit-address"
                                                data-form="form-edit-1">
                                                Edit
                                            </button>
                                            <button class="tf-btn btn-out-line-dark btn-delete-address"
                                                data-form="form-edit-1">
                                                Delete
                                            </button>
                                        </div>

                                    </div>
                                </li>
                                <li class="account-address-item">
                                    <p class="title text-md fw-medium">
                                        17 Yarran st
                                    </p>
                                    <div class="info-detail">
                                        <div class="box-infor">
                                            <p class="text-md">BLUE LEAFPham</p>
                                            <p class="text-md">account@vince.com</p>
                                            <p class="text-md">Company</p>
                                            <p class="text-md">17 Yarran st</p>
                                            <p class="text-md">Punchbowl</p>
                                            <p class="text-md">Indore</p>
                                            <p class="text-md">2196</p>
                                            <p class="text-md">+61 1234 3435</p>
                                        </div>
                                        <div class="box-btn">
                                            <button class="tf-btn btn-out-line-dark btn-edit-address"
                                                data-form="form-edit-2">
                                                Edit
                                            </button>
                                            <button class="tf-btn btn-out-line-dark btn-delete-address"
                                                data-form="form-edit-2">
                                                Delete
                                            </button>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                            <form action="#" class="wd-form-address form-default edit-form-address">
                                <div class="cols">
                                    <fieldset>
                                        <label for="first-name">First Name</label>
                                        <input type="text" id="first-name" required>
                                    </fieldset>
                                    <fieldset>
                                        <label for="last-name">Last Name</label>
                                        <input type="text" id="last-name" required>
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <label for="company">Company</label>
                                        <input type="text" id="company" required>
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <label for="address-1">Address 1</label>
                                        <input type="text" id="address-1" required>
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <label for="city">City</label>
                                        <input type="text" id="city" required>
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <label for="region">Country/region</label>
                                        <input type="text" id="region" required>
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <label for="provice">Province</label>
                                        <input type="text" id="provice" required>
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <label for="zip-code">Postal/ZIP code</label>
                                        <input type="text" id="zip-code" required>
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" required>
                                    </fieldset>
                                </div>
                                <div class="tf-cart-checkbox">
                                    <input type="checkbox" name="availability" class="tf-check" checked
                                        id="default-address-edit">
                                    <label for="default-address-edit" class="label">
                                        <span>Set as default address</span>
                                    </label>
                                </div>
                                <div class="box-btn">
                                    <button class="tf-btn animate-btn" type="submit">
                                        Update
                                    </button>
                                    <a href="javascript:void(0);"
                                        class="tf-btn btn-out-line-dark btn-hide-edit-address">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Account -->
            </div>
        </div>
        <!-- /Main Content -->
        
        <!-- Footer -->
        @include('front.include.footer')
        <!-- /Footer -->

        <!-- sidebar account-->
        <div class="offcanvas offcanvas-start canvas-filter canvas-sidebar canvas-sidebar-account" id="mbAccount">
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


    
    <script src="{{asset_front('js/bootstrap.min.js')}}"></script>
    <script src="{{asset_front('js/jquery.min.js')}}"></script>
    <script src="{{asset_front('js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset_front('js/carousel.js')}}"></script>
    <script src="{{asset_front('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset_front('js/lazysize.min.js')}}"></script>
    <script src="{{asset_front('js/count-down.js')}}"></script>
    <script src="{{asset_front('js/wow.min.js')}}"></script>
    <script src="{{asset_front('js/multiple-modal.js')}}"></script>
    <script src="{{asset_front('js/api/logout.js')}}"></script>
    <script src="{{asset_front('js/main.js')}}"></script>
</body>

</html>