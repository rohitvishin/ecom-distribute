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
                    <h4 class="title">My Account</h4>
                    <div class="breadcrumb-list">
                        <a class="breadcrumb-item" href="{{route('index')}}">Home</a>
                        <div class="breadcrumb-item dot"><span></span></div>
                        <div class="breadcrumb-item current">Account</div>
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

                <!-- Section-acount -->
                <div class="main-content-account">
                    @include('front.include.account-sidebar')
                    <div class="my-acount-content account-dashboard">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                        <form action="{{ route('userUpdate') }}" method="post" class="form-edit-account">
                            @csrf
                            <h6 class="display-xs title-form">Account Details</h6>
                            <div class="form-name">
                                <div class="tf-field style-2 style-3">
                                    <input class="tf-field-input tf-input" id="fullname" value="{{$user->fullname??''}}" type="text"
                                        name="fullname" required>
                                    <label class="tf-field-label" for="fullname">Fullname</label>
                                </div>
                                <div class="tf-field style-2 style-3">
                                    <input class="tf-field-input tf-input" id="email" value="{{$user->email??''}}" type="email"
                                        name="email" required>
                                    <label class="tf-field-label" for="email">Email</label>
                                </div>
                                <div class="tf-field style-2 style-3">
                                    <input class="tf-field-input tf-input" id="phone" value="{{$user->phone}}" type="text"
                                        name="phone" required readonly>
                                    <label class="tf-field-label" for="phone" >Mobile</label>
                                </div>
                            </div>
                            
                           <button type="submit" class="tf-btn animate-btn">Save Changes</button>
                        </form>
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
</body>

</html>