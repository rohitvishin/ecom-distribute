<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    @include('front.include.head')
</head>

<body class="bg-surface-3 primary-3">

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

        <!-- Slider -->
        <div class="tf-slideshow slider-plant slider-default">
            @include('front.include.sidebar')
        </div>
        <!-- /Slider -->

         <!-- Feature Collection -->
        <section class="flat-spacing-2 bg-gradient-2">
            <div class="container">
                <div class="flat-title wow fadeInUp">
                    <h3 class="title letter-0 text-start font-7">Our Products</h3>
                </div>
                <div class="fl-control-sw2 wrap-pos-nav sw-over-product wow fadeInUp">
                    <div dir="ltr" class="swiper tf-swiper wrap-sw-over"
                        data-swiper='{
                        "slidesPerView": 2,
                        "spaceBetween": 12,
                        "speed": 800,
                        "observer": true,
                        "observeParents": true,
                        "slidesPerGroup": 2,
                        "navigation": {
                            "clickable": true,
                            "nextEl": ".nav-next-product",
                            "prevEl": ".nav-prev-product"
                        },
                        "pagination": { "el": ".sw-pagination-product", "clickable": true },
                        "breakpoints": {
                        "768": { "slidesPerView": 3, "spaceBetween": 12, "slidesPerGroup": 3 },
                        "1200": { "slidesPerView": 4, "spaceBetween": 24, "slidesPerGroup": 4}
                        }
                    }'>
                        <div class="swiper-wrapper">
                                @foreach ($products as $product)
                                    <div class="swiper-slide">
                                        <div class="card-product">
                                            <div class="card-product-wrapper asp-ratio-0">
                                                <a href="{{ route('product-detail', $product->id) }}"
                                                    class="product-img">
                                                    <img class="img-product lazyload"
                                                        data-src="{{ $product->product_images[0]->image_url }}"
                                                        src="{{ $product->product_images[0]->image_url }}"
                                                        alt="{{ $product->title }}">
                                                    @if (isset($product->product_images[1]))
                                                        <img class="img-hover lazyload"
                                                            data-src="{{ $product->product_images[1]->image_url }}"
                                                            src="{{ $product->product_images[1]->image_url }}"
                                                            alt="{{ $product->title }}">
                                                    @endif
                                                </a>
                                                @if ($product->discount > 0)
                                                    <div class="on-sale-wrap">
                                                        <span class="on-sale-item">₹{{ $product->discount }}
                                                            Off</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="card-product-info">
                                                <a href="{{ route('product-detail', $product->id) }}"
                                                    class="name-product link fw-medium text-md">{{ $product->title }}</a>
                                                <p class="price-wrap fw-medium">
                                                    <span
                                                        class="price-new text-xl text-primary">₹{{ number_format($product->selling_price, 2) }}</span>
                                                    @if ($product->discount > 0)
                                                        <span
                                                            class="price-old">₹{{ number_format($product->mrp, 2) }}</span>
                                                    @endif
                                                </p>
                                                @if ($product->variants && count($product->variants) > 0)
                                                    <ul class="list-color-product style-2">
                                                        @foreach ($product->variants as $index => $variant)
                                                            <li
                                                                class="list-color-item hover-tooltip tooltip-bot color-swatch {{ $index === 0 ? 'active' : '' }}">
                                                                <span
                                                                    class="tooltip color-filter">{{ $variant->color }}</span>
                                                                <span class="swatch-value"
                                                                    style="background-color: {{ $variant->color_code }}"></span>
                                                                <img class="lazyload"
                                                                    data-src="{{ $variant->image }}"
                                                                    src="{{ $variant->image }}"
                                                                    alt="{{ $product->title }}">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        <div class="d-flex d-xl-none sw-dot-default sw-pagination-product justify-content-center">
                        </div>

                    </div>
                    <div class="d-none d-xl-flex swiper-button-next nav-swiper nav-next-product"></div>
                    <div class="d-none d-xl-flex swiper-button-prev nav-swiper nav-prev-product"></div>
                </div>
            </div>
        </section>
        <!-- /Feature Collection -->

        <!-- Icon box -->
        <div class="flat-spacing-26">
            <div class="container">
                <div class="flat-wrapper-iconbox">
                    <h3 class="title letter-0 font-7 fw-semibold">Why Shop With Us?</h3>
                    <div dir="ltr" class="swiper tf-swiper wow fadeInUp"
                        data-swiper='{
                        "slidesPerView": 1,
                        "spaceBetween": 12,
                        "speed": 800,
                        "preventInteractionOnTransition": false, 
                        "touchStartPreventDefault": false,
                        "pagination": { "el": ".sw-pagination-iconbox", "clickable": true },
                        "breakpoints": {
                            "575": { "slidesPerView": 3, "spaceBetween": 24,"slidesPerGroup": 2}, 
                            "992": { "slidesPerView": 3, "spaceBetween": 24,"slidesPerGroup": 2},
                            "1400": { "slidesPerView": 4, "spaceBetween": 80,"slidesPerGroup": 2}
                        }
                    }'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-3 justify-content-center justify-content-lg-start">
                                    <div class="box-icon">
                                        <img src="{{ asset_front('images/icons/minimal.png') }}" alt=""
                                            srcset="">
                                    </div>
                                    <div class="content">
                                        <div class="title fw-bold font-7">Quality-Checked Products</div>
                                        <!-- <p class="text-main-3 text-md">Always the best</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-3 justify-content-center justify-content-lg-start">
                                    <div class="box-icon">
                                        <img src="{{ asset_front('images/icons/leaf.png') }}" alt="" srcset="">
                                    </div>
                                    <div class="content">
                                        <div class="title fw-bold font-7">Safe & Natural Formulations</div>
                                        <!-- <p class="text-main-3 text-md">Expect more by default</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-3 justify-content-center justify-content-lg-start">
                                    <div class="box-icon">
                                        <img src="{{ asset_front('images/icons/luxury.png') }}" alt="" srcset="">
                                    </div>
                                    <div class="content">
                                        <div class="title fw-bold font-7">Fast & Reliable Delivery</div>
                                        <!-- <p class="text-main-3 text-md">We’re here to help</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-3 justify-content-center justify-content-lg-start">
                                    <div class="box-icon">
                                        <img src="{{ asset_front('images/icons/luxury.png') }}" alt="" srcset="">
                                    </div>
                                    <div class="content">
                                        <div class="title fw-bold font-7">Customer-First Policies</div>
                                        <!-- <p class="text-main-3 text-md">We’re here to help</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex d-xxl-none sw-dot-default sw-pagination-iconbox justify-content-center">
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- /Icon box -->
        <!-- Footer -->
         @include('front.include.footer')
        <!-- /Footer -->

    </div>


    <!-- modal demo -->
    <div class="modal fade modalDemo" id="modalDemo">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <h5 class="demo-title">Ultimate HTML Theme</h5>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="mega-menu">
                    <div class="row-demo">
                        <div class="demo-item">
                            <a href="index.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/fashion-1.jpg"
                                    src="images/demo/fashion-1.jpg" alt="home-fashion">
                                <div class="demo-label">
                                    <span>New</span>
                                    <span class="demo-hot">Hot</span>
                                </div>
                            </a>
                            <a href="index.html" class="demo-name link">Fashion Style 1</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-fashion-02.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/fashion-2.jpg"
                                    src="images/demo/fashion-2.jpg" alt="home-fashion">
                            </a>
                            <a href="home-fashion-02.html" class="demo-name link">Fashion Style
                                2</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-electronic.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/electronic.jpg"
                                    src="images/demo/electronic.jpg" alt="home-electronic">
                            </a>
                            <a href="home-electronic.html" class="demo-name link">Electronic</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-furniture.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/furniture.jpg"
                                    src="images/demo/furniture.jpg" alt="home-furniture">
                            </a>
                            <a href="home-furniture.html" class="demo-name link">Furniture</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-fashion-women.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/women-fashion.jpg"
                                    src="images/demo/women-fashion.jpg" alt="home-women-fashion">
                                <div class="demo-label">
                                    <span>New</span>
                                    <span class="demo-hot">Hot</span>
                                </div>
                            </a>
                            <a href="home-fashion-women.html" class="demo-name link">Women
                                Fashion</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-skincare.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/comestic.jpg"
                                    src="images/demo/comestic.jpg" alt="home-comestic">
                            </a>
                            <a href="home-skincare.html" class="demo-name link">Skincare</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-bicycle.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/bicycle.jpg"
                                    src="images/demo/bicycle.jpg" alt="home-bicycle">
                                <div class="demo-label"><span>New</span></div>
                            </a>
                            <a href="home-bicycle.html" class="demo-name link">Bicycle</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-phonecase.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/phonecase.jpg"
                                    src="images/demo/phonecase.jpg" alt="home-phonecase">
                            </a>
                            <a href="home-phonecase.html" class="demo-name link">Phone Case</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-pet-accessories.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/pet-accessories.jpg"
                                    src="images/demo/pet-accessories.jpg" alt="home-pet">
                            </a>
                            <a href="home-pet-accessories.html" class="demo-name link">Pet
                                Accessories</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-sportwear.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/sportwear.jpg"
                                    src="images/demo/sportwear.jpg" alt="home-bicycle">
                            </a>
                            <a href="home-sportwear.html" class="demo-name link">Sportwear</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-jewelry.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/jewelry.jpg"
                                    src="images/demo/jewelry.jpg" alt="home-jewelry">
                            </a>
                            <a href="home-jewelry.html" class="demo-name link">Jewelry</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-electric-accessories.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/eletric-accessories.jpg"
                                    src="images/demo/eletric-accessories.jpg" alt="home-electric-accessories">
                                <div class="demo-label">
                                    <span>New</span>
                                    <span class="demo-hot">Hot</span>
                                </div>
                            </a>
                            <a href="home-electric-accessories.html" class="demo-name link">Electric Accessories</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-mega-electronic.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/mega-shop.jpg"
                                    src="images/demo/mega-shop.jpg" alt="home-mega-electronic">
                            </a>
                            <a href="home-mega-electronic.html" class="demo-name link">Mega Shop</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-vegetable.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/supermarket.jpg"
                                    src="images/demo/supermarket.jpg" alt="home-supermarket">
                            </a>
                            <a href="home-vegetable.html" class="demo-name link">Supermarket</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-pod.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/pod.jpg" src="images/demo/pod.jpg"
                                    alt="home-pod">
                            </a>
                            <a href="home-pod.html" class="demo-name link">Print On Demand</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-baby.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/baby.jpg" src="images/demo/baby.jpg"
                                    alt="home-baby">
                                <div class="demo-label">
                                    <span>New</span>
                                </div>
                            </a>
                            <a href="home-baby.html" class="demo-name link">Baby</a>
                        </div>
                        <div class="demo-item">
                            <a href="index.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/plant.jpg" src="images/demo/plant.jpg"
                                    alt="home-plant">
                            </a>
                            <a href="index.html" class="demo-name link">Sipper</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-jewelry2.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/jewelry2.jpg"
                                    src="images/demo/jewelry2.jpg" alt="home-jewelry">
                            </a>
                            <a href="home-jewelry2.html" class="demo-name link">Jewelry 2</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-pickleball.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/pickleball.jpg"
                                    src="images/demo/pickleball.jpg" alt="home-pickleball">
                            </a>
                            <a href="home-pickleball.html" class="demo-name link">Pickleball</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-handcraft.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/handcraft.jpg"
                                    src="images/demo/handcraft.jpg" alt="home-handcraft">
                            </a>
                            <a href="home-handcraft.html" class="demo-name link">Handcraft</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-furniture2.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/furniture2.jpg"
                                    src="images/demo/furniture2.jpg" alt="home-furniture">
                            </a>
                            <a href="home-furniture2.html" class="demo-name link">Furniture 2</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-skincare2.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/skincare2.jpg"
                                    src="images/demo/skincare2.jpg" alt="home-skincare">
                            </a>
                            <a href="home-skincare2.html" class="demo-name link">Skincare 2</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-supplement.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/supplement.jpg"
                                    src="images/demo/supplement.jpg" alt="home-skincare">
                                <div class="demo-label"><span>New</span></div>
                            </a>
                            <a href="home-supplement.html" class="demo-name link">Supplement</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-footwear.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/footwear.jpg"
                                    src="images/demo/footwear.jpg" alt="home-skincare">
                                <div class="demo-label"><span>New</span></div>
                            </a>
                            <a href="home-footwear.html" class="demo-name link">Footwear</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-glasses.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/glasses.jpg"
                                    src="images/demo/glasses.jpg" alt="home-skincare">
                                <div class="demo-label"><span>New</span></div>
                            </a>
                            <a href="home-glasses.html" class="demo-name link">Glasses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal demo -->

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

    <!-- Reset pass -->
    <div class="offcanvas offcanvas-end popup-style-1 popup-reset-pass" id="resetPass">
        <div class="canvas-wrapper">
            <div class="canvas-header popup-header">
                <span class="title">Reset Your Password</span>
                <button class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="canvas-body popup-inner">
                <form action="#" class="form-login">
                    <div class="">
                        <p class="text text-sm text-main-2">Forgot your password? No worries! Enter your registered
                            email to receive a link and securely reset it in just a few steps.</p>
                        <fieldset class="email mb_12">
                            <input type="email" placeholder="Enter Your Email*" required>
                        </fieldset>
                    </div>
                    <div class="bot">
                        <div class="button-wrap">
                            <button class="subscribe-button tf-btn animate-btn bg-dark-2 w-100" type="submit">Reset
                                Password</button>
                            <button type="button" data-bs-dismiss="offcanvas"
                                class="tf-btn btn-out-line-dark2 w-100">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Reset pass -->

    <!-- shoppingCart -->
    @include('front.include.cart')
    <!-- /shoppingCart -->

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
    <script src="{{ asset_front('js/api/login.js') }}"></script>
</body>

</html>
