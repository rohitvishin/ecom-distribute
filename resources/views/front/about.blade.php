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

        <!-- Why Choose -->
        <section class="flat-spacing-3">
            <div class="container">
                <div class="flat-title text-center">
                    <p class="display-md-2 fw-medium">
                        About Us
                    </p>
                </div>
                <div class="row">
                    <div class="col-xl-7 col-md-6">
                        <ul class="list-esd d-md-flex flex-md-column justify-content-md-center h-100">
                            <li class="item">
                                <h6>
                                   Who We Are
                                </h6>
                                <p class="text-md text-main">
                                    Zemat Healthcare Establishment, founded in 2017, is an Ayurvedic medicine manufacturer and wholesaler located in Vasai East, Palghar, Maharashtra. The company specializes in a wide range of herbal and Ayurvedic products, including syrups, capsules, and tablets. Their focus is on providing high-quality, customer-centric healthcare solution
                                </p>
                            </li>
                            <li class="item">
                                <h6>
                                    Why Choose Us
                                </h6>
                                <p class="text-md text-main">                                    
                                    Diverse Product Range: Zemat Healthcare offers a comprehensive selection of products, including syrups, capsules, and tablets, formulated to address various health issues such as joint pain, liver health, and general wellness.
                                    </p>
                                    <p class="text-md text-main">
                                    Focus on Quality: The company is committed to delivering top-notch products. They emphasize quality assurance and conduct regular tests to ensure the effectiveness and longevity of their formulations.
                                    </p>
                                    <p class="text-md text-main">
                                    Customer-Centric Approach: With a focus on building long-term relationships, Zemat Healthcare prioritizes customer satisfaction. They aim to provide seamless transactions and positive experiences for their clients.
                                </p>
                            </li>                           
                        </ul>
                    </div>
                    <div class="col-xl-5 col-md-6">
                        <div class="image radius-16 overflow-hidden w-100 h-100">
                            <img src="{{ asset_front('images/about-img.png') }}" data-src="{{ asset_front('images/about-img.png') }}" alt=""
                                class="lazyload w-100 h-100 object-fit-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Why Choose -->

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
                                <img class="lazyload" data-src="images/demo/comestic.jpg" src="images/demo/comestic.jpg"
                                    alt="home-comestic">
                            </a>
                            <a href="home-skincare.html" class="demo-name link">Skincare</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-bicycle.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/bicycle.jpg" src="images/demo/bicycle.jpg"
                                    alt="home-bicycle">
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
                                <img class="lazyload" data-src="images/demo/jewelry.jpg" src="images/demo/jewelry.jpg"
                                    alt="home-jewelry">
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
                                <img class="lazyload" data-src="images/demo/jewelry2.jpg" src="images/demo/jewelry2.jpg"
                                    alt="home-jewelry">
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

    <!-- mobile menu -->
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <button class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <div class="mb-content-top">
                    <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    </ul>
                </div>
                <div class="mb-other-content">
                    <div class="group-icon">
                        
                        <a href="#login" data-bs-toggle="offcanvas" class="site-nav-icon">
                            <i class="icon icon-user"></i>
                            Login
                        </a>
                    </div>
                    <div class="mb-notice">
                        <a href="contact-us.html" class="text-need">Need Help?</a>
                    </div>
                    <div class="mb-contact">
                        <p>Address: 165/003, Sector 6, Evershine City, Vasai East, Vasai-Virar, Maharashtra 401208</p>
                    </div>
                    <ul class="mb-info">
                        <li>
                            Email:
                            <b class="fw-medium">clientcare@ecom.com</b>
                        </li>
                        <li>
                            Phone:
                            <b class="fw-medium">1.888.838.3022</b>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mb-bottom">
                <div class="bottom-bar-language">
                    <div class="tf-currencies">
                        <select class="image-select center style-default type-currencies">
                            <option selected data-thumbnail="images/country/us.png">USD</option>
                            <option data-thumbnail="images/country/fr.png">EUR</option>
                            <option data-thumbnail="images/country/ger.png">EUR</option>
                            <option data-thumbnail="images/country/vn.png">VND</option>
                        </select>
                    </div>
                    <div class="tf-languages">
                        <select class="image-select center style-default type-languages">
                            <option>English</option>
                            <option>العربية</option>
                            <option>简体中文</option>
                            <option>اردو</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /mobile menu -->

    <!-- toolbar -->
    <div class="tf-toolbar-bottom">
        <div class="toolbar-item">
            <a href="index.html">
                <div class="toolbar-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.21534 1H3.08153C1.93379 1 1 1.93379 1 3.08153V7.21534C1 8.36309 1.93379 9.29688 3.08153 9.29688H7.21534C8.36309 9.29688 9.29688 8.36309 9.29688 7.21534V3.08153C9.29688 1.93379 8.36309 1 7.21534 1ZM7.89062 7.21534C7.89062 7.58768 7.58768 7.89062 7.21534 7.89062H3.08153C2.70919 7.89062 2.40625 7.58768 2.40625 7.21534V3.08153C2.40625 2.70919 2.70919 2.40625 3.08153 2.40625H7.21534C7.58768 2.40625 7.89062 2.70919 7.89062 3.08153V7.21534Z"
                            fill="black" />
                        <path
                            d="M16.8906 1H12.8125C11.6494 1 10.7031 1.94627 10.7031 3.10938V7.1875C10.7031 8.35061 11.6494 9.29688 12.8125 9.29688H16.8906C18.0537 9.29688 19 8.35061 19 7.1875V3.10938C19 1.94627 18.0537 1 16.8906 1ZM17.5938 7.1875C17.5938 7.5752 17.2783 7.89062 16.8906 7.89062H12.8125C12.4248 7.89062 12.1094 7.5752 12.1094 7.1875V3.10938C12.1094 2.72167 12.4248 2.40625 12.8125 2.40625H16.8906C17.2783 2.40625 17.5938 2.72167 17.5938 3.10938V7.1875Z"
                            fill="black" />
                        <path
                            d="M7.21534 10.7031H3.08153C1.93379 10.7031 1 11.6369 1 12.7847V16.9185C1 18.0662 1.93379 19 3.08153 19H7.21534C8.36309 19 9.29688 18.0662 9.29688 16.9185V12.7847C9.29688 11.6369 8.36309 10.7031 7.21534 10.7031ZM7.89062 16.9185C7.89062 17.2908 7.58768 17.5938 7.21534 17.5938H3.08153C2.70919 17.5938 2.40625 17.2908 2.40625 16.9185V12.7847C2.40625 12.4123 2.70919 12.1094 3.08153 12.1094H7.21534C7.58768 12.1094 7.89062 12.4123 7.89062 12.7847V16.9185Z"
                            fill="black" />
                        <path
                            d="M16.8906 10.7031H12.8125C11.6494 10.7031 10.7031 11.6494 10.7031 12.8125V16.8906C10.7031 18.0537 11.6494 19 12.8125 19H16.8906C18.0537 19 19 18.0537 19 16.8906V12.8125C19 11.6494 18.0537 10.7031 16.8906 10.7031ZM17.5938 16.8906C17.5938 17.2783 17.2783 17.5938 16.8906 17.5938H12.8125C12.4248 17.5938 12.1094 17.2783 12.1094 16.8906V12.8125C12.1094 12.4248 12.4248 12.1094 12.8125 12.1094H16.8906C17.2783 12.1094 17.5938 12.4248 17.5938 12.8125V16.8906Z"
                            fill="black" />
                    </svg>
                </div>
                <div class="toolbar-label">Home</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="#login" data-bs-toggle="offcanvas">
                <div class="toolbar-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.6849 6.28659C12.6849 7.00267 12.4004 7.68943 11.8941 8.19578C11.3877 8.70212 10.701 8.98659 9.98488 8.98659C9.2688 8.98659 8.58204 8.70212 8.07569 8.19578C7.56934 7.68943 7.28488 7.00267 7.28488 6.28659C7.28488 5.5705 7.56934 4.88375 8.07569 4.3774C8.58204 3.87105 9.2688 3.58659 9.98488 3.58659C10.701 3.58659 11.3877 3.87105 11.8941 4.3774C12.4004 4.88375 12.6849 5.5705 12.6849 6.28659ZM14.3515 6.28659C14.3515 6.86003 14.2386 7.42785 14.0192 7.95764C13.7997 8.48743 13.4781 8.96881 13.0726 9.37429C12.6671 9.77977 12.1857 10.1014 11.6559 10.3209C11.1261 10.5403 10.5583 10.6533 9.98488 10.6533C9.41144 10.6533 8.84362 10.5403 8.31383 10.3209C7.78404 10.1014 7.30266 9.77977 6.89718 9.37429C6.4917 8.96881 6.17005 8.48743 5.95061 7.95764C5.73116 7.42785 5.61821 6.86003 5.61821 6.28659C5.61821 5.12848 6.07827 4.0178 6.89718 3.19889C7.71609 2.37998 8.82677 1.91992 9.98488 1.91992C11.143 1.91992 12.2537 2.37998 13.0726 3.19889C13.8915 4.0178 14.3515 5.12848 14.3515 6.28659ZM3.83488 17.7049C3.83488 16.2183 4.48488 15.0616 5.55571 14.2524C6.64738 13.4283 8.20571 12.9491 9.98738 12.9491C11.7699 12.9491 13.3282 13.4283 14.419 14.2524C15.4907 15.0608 16.1407 16.2191 16.1407 17.7049C16.1407 17.9259 16.2285 18.1379 16.3848 18.2942C16.5411 18.4505 16.753 18.5383 16.974 18.5383C17.1951 18.5383 17.407 18.4505 17.5633 18.2942C17.7196 18.1379 17.8074 17.9259 17.8074 17.7049C17.8074 15.6633 16.8849 14.0258 15.424 12.9224C13.9824 11.8341 12.0474 11.2824 9.98738 11.2824C7.92738 11.2824 5.99238 11.8341 4.55155 12.9224C3.08988 14.0258 2.16821 15.6641 2.16821 17.7049C2.16821 17.9259 2.25601 18.1379 2.41229 18.2942C2.56857 18.4505 2.78053 18.5383 3.00155 18.5383C3.22256 18.5383 3.43452 18.4505 3.5908 18.2942C3.74708 18.1379 3.83488 17.9259 3.83488 17.7049Z"
                            fill="black" />
                    </svg>
                </div>
                <div class="toolbar-label">Account</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="shop-default.html">
                <div class="toolbar-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.875 8.479C1.875 8.134 2.155 7.854 2.5 7.854C2.845 7.854 3.125 8.134 3.125 8.479V15.5623C3.125 16.5982 3.96417 17.4373 5 17.4373H15C16.0358 17.4373 16.875 16.5982 16.875 15.5623V8.479C16.875 8.134 17.155 7.854 17.5 7.854C17.845 7.854 18.125 8.134 18.125 8.479V15.5623C18.125 17.2882 16.7258 18.6873 15 18.6873H5C3.27417 18.6873 1.875 17.2882 1.875 15.5623V8.479Z"
                            fill="black" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10 11.1875C10.8292 11.1875 11.6233 11.5167 12.21 12.1025C12.7958 12.6892 13.125 13.4833 13.125 14.3125V18.0625C13.125 18.4075 12.845 18.6875 12.5 18.6875C12.155 18.6875 11.875 18.4075 11.875 18.0625V14.3125C11.875 13.815 11.6775 13.3383 11.3258 12.9867C10.9742 12.635 10.4975 12.4375 10 12.4375C9.5025 12.4375 9.02583 12.635 8.67417 12.9867C8.3225 13.3383 8.125 13.815 8.125 14.3125V18.0625C8.125 18.4075 7.845 18.6875 7.5 18.6875C7.155 18.6875 6.875 18.4075 6.875 18.0625V14.3125C6.875 13.4833 7.20417 12.6892 7.79 12.1025C8.37667 11.5167 9.17083 11.1875 10 11.1875Z"
                            fill="black" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.45325 1.9375V6.625C7.45325 8.385 6.02492 9.8125 4.26492 9.8125C3.27242 9.8125 2.33492 9.355 1.72408 8.57333C1.11325 7.79083 0.897416 6.77167 1.13742 5.80833L1.79992 3.15917C2.07158 2.07333 3.04658 1.3125 4.16492 1.3125H6.82825C7.17325 1.3125 7.45325 1.5925 7.45325 1.9375ZM6.20325 2.5625H4.16492C3.61992 2.5625 3.14492 2.93333 3.01325 3.46167L2.35075 6.11167C2.20325 6.70083 2.33575 7.325 2.70908 7.80417C3.08325 8.2825 3.65742 8.5625 4.26492 8.5625C5.33492 8.5625 6.20325 7.695 6.20325 6.625V2.5625Z"
                            fill="black" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.1716 1.3125H15.835C16.9533 1.3125 17.9283 2.07333 18.2 3.15917L18.8625 5.80833C19.1025 6.77167 18.8866 7.79083 18.2758 8.57333C17.665 9.355 16.7275 9.8125 15.735 9.8125C13.975 9.8125 12.5466 8.385 12.5466 6.625V1.9375C12.5466 1.5925 12.8266 1.3125 13.1716 1.3125ZM13.7966 2.5625V6.625C13.7966 7.695 14.665 8.5625 15.735 8.5625C16.3425 8.5625 16.9166 8.2825 17.2908 7.80417C17.6641 7.325 17.7966 6.70083 17.6491 6.11167L16.9866 3.46167C16.855 2.93333 16.38 2.5625 15.835 2.5625H13.7966Z"
                            fill="black" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.82153 1.3125H13.1715C13.3374 1.3125 13.4965 1.37833 13.614 1.49583C13.7315 1.61333 13.7965 1.7725 13.7965 1.93833L13.7924 6.47167C13.7907 8.3175 12.294 9.8125 10.449 9.8125H9.5407C7.69403 9.8125 6.19653 8.31583 6.19653 6.46917V1.9375C6.19653 1.5925 6.47653 1.3125 6.82153 1.3125ZM7.44653 2.5625V6.46917C7.44653 7.625 8.38403 8.5625 9.5407 8.5625H10.449C11.6049 8.5625 12.5415 7.62667 12.5424 6.47083L12.5465 2.5625H7.44653Z"
                            fill="black" />
                    </svg>
                </div>
                <div class="toolbar-label">Shop</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="wish-list.html">
                <div class="toolbar-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_4013_1872)">
                            <path
                                d="M18.3932 3.30791C16.218 1.13334 12.6795 1.13334 10.5049 3.30791L9.99983 3.8127L9.49504 3.30791C7.32046 1.13304 3.78163 1.13304 1.60706 3.30791C-0.523361 5.43833 -0.537195 8.81527 1.57498 11.1632C3.50142 13.3039 9.18304 17.9289 9.4241 18.1246C9.58775 18.2576 9.78467 18.3224 9.9804 18.3224C9.98688 18.3224 9.99335 18.3224 9.99953 18.3221C10.202 18.3315 10.406 18.2621 10.575 18.1246C10.816 17.9289 16.4982 13.3039 18.4253 11.1629C20.5371 8.81527 20.5233 5.43833 18.3932 3.30791ZM17.1125 9.98174C15.6105 11.6503 11.4818 15.0917 9.99953 16.313C8.51724 15.092 4.38944 11.6509 2.88773 9.98203C1.41427 8.34433 1.40044 6.01199 2.85564 4.55679C3.59885 3.81388 4.57488 3.44213 5.5509 3.44213C6.52693 3.44213 7.50295 3.81358 8.24616 4.55679L9.3564 5.66703C9.48856 5.79919 9.65516 5.87807 9.82999 5.90574C10.1137 5.96667 10.4216 5.88749 10.6424 5.66732L11.7532 4.55679C13.2399 3.07067 15.6582 3.07097 17.144 4.55679C18.5992 6.01199 18.5854 8.34433 17.1125 9.98174Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4013_1872">
                                <rect width="20" height="20" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <div class="toolbar-count">0</div>
                </div>
                <div class="toolbar-label">Wishlist</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="#shoppingCart" data-bs-toggle="offcanvas">
                <div class="toolbar-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4.70906 7.42985L4.0424 16.699H15.8641L15.1974 7.42985H4.70906ZM16.7491 5.76318H3.15823L2.38073 16.5798C2.36436 16.8082 2.39521 17.0374 2.47134 17.2533C2.54748 17.4692 2.66727 17.6671 2.82325 17.8347C2.97923 18.0022 3.16805 18.1358 3.37795 18.2272C3.58785 18.3186 3.81431 18.3657 4.04323 18.3657H15.8641C16.0931 18.3657 16.3196 18.3185 16.5296 18.2271C16.7395 18.1357 16.9284 18.002 17.0844 17.8344C17.2404 17.6667 17.3601 17.4687 17.4362 17.2527C17.5123 17.0368 17.5431 16.8074 17.5266 16.579L16.7491 5.76318Z"
                            fill="black" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9.38996 3.86652C9.17153 3.86641 8.95523 3.90936 8.75342 3.99292C8.55162 4.07649 8.36826 4.19901 8.21385 4.3535C8.05944 4.50799 7.93701 4.6914 7.85355 4.89325C7.77009 5.0951 7.72724 5.31143 7.72746 5.52985V6.10068C7.72746 6.3217 7.63966 6.53366 7.48338 6.68994C7.3271 6.84622 7.11514 6.93402 6.89412 6.93402C6.67311 6.93402 6.46115 6.84622 6.30487 6.68994C6.14859 6.53366 6.06079 6.3217 6.06079 6.10068V5.52985C6.06068 5.09263 6.14672 4.65967 6.31399 4.2557C6.48125 3.85174 6.72647 3.48469 7.03564 3.17553C7.3448 2.86637 7.71185 2.62115 8.11581 2.45388C8.51977 2.28661 8.95273 2.20057 9.38996 2.20068H10.5275C11.412 2.2009 12.2603 2.55246 12.8857 3.17802C13.5111 3.80359 13.8625 4.65194 13.8625 5.53652V6.10068C13.8625 6.3217 13.7747 6.53366 13.6184 6.68994C13.4621 6.84622 13.2501 6.93402 13.0291 6.93402C12.8081 6.93402 12.5961 6.84622 12.4399 6.68994C12.2836 6.53366 12.1958 6.3217 12.1958 6.10068V5.53652C12.1958 5.09397 12.02 4.66954 11.7072 4.35653C11.3943 4.04353 10.97 3.86757 10.5275 3.86735"
                            fill="black" />
                    </svg>
                    <div class="toolbar-count">0</div>
                </div>
                <div class="toolbar-label">Cart</div>
            </a>
        </div>
    </div>
    <!-- /toolbar  -->

    <!-- login -->
     <div class="offcanvas offcanvas-end popup-style-1 popup-login" id="login">
        <div class="canvas-wrapper">
            <div class="canvas-header popup-header">
                <span class="title">Log in</span>
                <button class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="canvas-body popup-inner">
                <form action="account-page.html" accept-charset="utf-8" class="form-login">
                    <div>
                        <fieldset class="mb_12">
                            <input type="text" placeholder="phone*" required>
                        </fieldset>
                    </div>
                    <div class="bot">
                        <div class="button-wrap">
                            <button class="subscribe-button tf-btn animate-btn d-inline-flex bg-dark-2 w-100"
                                type="submit">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /login -->

    <!-- register -->
    <div class="offcanvas offcanvas-end popup-style-1 popup-register" id="register">
        <div class="canvas-wrapper">
            <div class="canvas-header popup-header">
                <span class="title">Create account</span>
                <button class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="canvas-body popup-inner">
                <form action="account-page.html" class="form-login">
                    <div class="">
                        <fieldset class="mb_12">
                            <input type="text" placeholder="First name">
                        </fieldset>
                        <fieldset class="mb_12">
                            <input type="text" placeholder="Last name">
                        </fieldset>
                        <fieldset class="email mb_12">
                            <input type="email" placeholder="Email*" required>
                        </fieldset>
                        <fieldset class="password">
                            <input type="password" placeholder="Password*" required>
                        </fieldset>
                    </div>
                    <div class="bot">
                        <p class="text text-sm text-main-2">Sign up for early Sale access plus tailored new
                            arrivals, trends and promotions. To opt out, click unsubscribe in our emails.</p>
                        <div class="button-wrap">
                            <button class="subscribe-button tf-btn animate-btn bg-dark-2 w-100" type="submit">Sign
                                up</button>
                            <button type="button" data-bs-target="#login" data-bs-toggle="offcanvas"
                                class="tf-btn btn-out-line-dark2 w-100">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /register -->

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

    <!-- search -->
    <div class="modal fade popup-search" id="search">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="header">
                    <button class="icon-close icon-close-popup" data-bs-dismiss="modal"></button>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="looking-for-wrap">
                                <div class="heading">What are you looking for?</div>
                                <form class="form-search">
                                    <fieldset class="text">
                                        <input type="text" placeholder="Search" class="" name="text" tabindex="0"
                                            value="" aria-required="true" required="">
                                    </fieldset>
                                    <button type="submit">
                                        <i class="icon icon-search"></i>
                                    </button>
                                </form>
                                <div class="popular-searches justify-content-md-center">
                                    <div class="text fw-medium">Popular searches:</div>
                                    <ul>
                                        <li><a class="link" href="#">Featured</a></li>
                                        <li><a class="link" href="#">Trendy</a></li>
                                        <li><a class="link" href="#">New</a></li>
                                        <li><a class="link" href="#">Sale</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="featured-product">
                                <div class="text-xl-2 fw-medium featured-product-heading">Featured product</div>
                                <div dir="ltr" class="swiper tf-swiper wrap-sw-over" data-swiper='{
                                        "slidesPerView": 2,
                                        "spaceBetween": 12,
                                        "speed": 800,
                                        "observer": true,
                                        "observeParents": true,
                                        "slidesPerGroup": 2,
                                        "pagination": { "el": ".sw-pagination-search", "clickable": true },
                                        "breakpoints": {
                                        "768": { "slidesPerView": 3, "spaceBetween": 12, "slidesPerGroup": 3 },
                                        "1200": { "slidesPerView": 4, "spaceBetween": 24, "slidesPerGroup": 4}
                                        }
                                    }'>
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="card-product style-3 card-product-size">
                                                <div class="card-product-wrapper">
                                                    <a href="product-detail.html" class="product-img">
                                                        <img class="img-product lazyload"
                                                            data-src="images/products/fashion/product-27.jpg"
                                                            src="images/products/fashion/product-27.jpg"
                                                            alt="image-product">
                                                        <img class="img-hover lazyload"
                                                            data-src="images/products/fashion/product-23.jpg"
                                                            src="images/products/fashion/product-23.jpg"
                                                            alt="image-product">
                                                    </a>
                                                    <ul class="list-product-btn">
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="box-icon hover-tooltip wishlist">
                                                                <span class="icon icon-heart2"></span>
                                                                <span class="tooltip">Add to Wishlist</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="btn-quickview box-icon hover-tooltip quickview">
                                                                <span class="icon icon-view"></span>
                                                                <span class="tooltip">Quick View</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="box-icon hover-tooltip compare btn-compare">
                                                                <span class="icon icon-compare"></span>
                                                                <span class="tooltip">Add to Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="product-btn-main">
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="btn-main-product">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="text-md fw-medium">
                                                                Add to Cart
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <ul class="size-box">
                                                        <li class="size-item text-xs text-white">M</li>
                                                        <li class="size-item text-xs text-white">L</li>
                                                        <li class="size-item text-xs text-white">XL</li>
                                                    </ul>
                                                </div>
                                                <div class="card-product-info">
                                                    <a href="product-detail.html"
                                                        class="name-product link fw-medium text-md">Basic Sports T-Shirt
                                                        Crew Neck Ribbed</a>
                                                    <p class="price-wrap fw-medium">
                                                        <span class="price-new">80.00</span>
                                                        <span class="price-old">₹100.00</span>
                                                    </p>
                                                    <ul class="list-color-product">
                                                        <li
                                                            class="list-color-item color-swatch hover-tooltip tooltip-bot active">
                                                            <span class="tooltip color-filter">Purple</span>
                                                            <span class="swatch-value bg-light-purple-3"></span>
                                                            <img class="lazyload"
                                                                data-src="images/products/fashion/product-27.jpg"
                                                                src="images/products/fashion/product-27.jpg"
                                                                alt="image-product">
                                                        </li>
                                                        <li
                                                            class="list-color-item color-swatch hover-tooltip tooltip-bot">
                                                            <span class="tooltip color-filter">Light Grey</span>
                                                            <span class="swatch-value bg-grey-4"></span>
                                                            <img class="lazyload"
                                                                data-src="images/products/fashion/product-11.jpg"
                                                                src="images/products/fashion/product-11.jpg"
                                                                alt="image-product">
                                                        </li>
                                                        <li
                                                            class="list-color-item color-swatch hover-tooltip tooltip-bot">
                                                            <span class="tooltip color-filter">Light Orange</span>
                                                            <span class="swatch-value bg-light-orange"></span>
                                                            <img class="lazyload"
                                                                data-src="images/products/fashion/product-12.jpg"
                                                                src="images/products/fashion/product-12.jpg"
                                                                alt="image-product">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="card-product style-3">
                                                <div class="card-product-wrapper">
                                                    <a href="product-detail.html" class="product-img">
                                                        <img class="img-product lazyload"
                                                            data-src="images/products/fashion/product-10.jpg"
                                                            src="images/products/fashion/product-10.jpg"
                                                            alt="image-product">
                                                        <img class="img-hover lazyload"
                                                            data-src="images/products/fashion/product-20.jpg"
                                                            src="images/products/fashion/product-20.jpg"
                                                            alt="image-product">
                                                    </a>
                                                    <ul class="list-product-btn">
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="box-icon hover-tooltip wishlist">
                                                                <span class="icon icon-heart2"></span>
                                                                <span class="tooltip">Add to Wishlist</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="btn-quickview box-icon hover-tooltip quickview">
                                                                <span class="icon icon-view"></span>
                                                                <span class="tooltip">Quick View</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="box-icon hover-tooltip compare btn-compare">
                                                                <span class="icon icon-compare"></span>
                                                                <span class="tooltip">Add to Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="product-btn-main">
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="btn-main-product">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="text-md fw-medium">
                                                                Add to Cart
                                                            </span>
                                                        </a>
                                                    </div>

                                                </div>
                                                <div class="card-product-info">
                                                    <a href="product-detail.html"
                                                        class="name-product link fw-medium text-md">Regular Fit
                                                        Fine Knit Polo Shirt</a>
                                                    <p class="price-wrap fw-medium">
                                                        <span class="price-new">₹65.00</span>
                                                        <span class=" price-old">₹90.00</span>
                                                    </p>
                                                    <ul class="list-color-product">
                                                        <li
                                                            class="list-color-item color-swatch hover-tooltip tooltip-bot active">
                                                            <span class="tooltip color-filter">Light Blue</span>
                                                            <span class="swatch-value bg-light-blue-2"></span>
                                                            <img class=" lazyload"
                                                                data-src="images/products/fashion/product-10.jpg"
                                                                src="images/products/fashion/product-10.jpg"
                                                                alt="image-product">
                                                        </li>
                                                        <li
                                                            class="list-color-item color-swatch hover-tooltip tooltip-bot">
                                                            <span class="tooltip color-filter">Black</span>
                                                            <span class="swatch-value bg-dark"></span>
                                                            <img class=" lazyload"
                                                                data-src="images/products/fashion/product-13.jpg"
                                                                src="images/products/fashion/product-13.jpg"
                                                                alt="image-product">
                                                        </li>
                                                        <li
                                                            class="list-color-item color-swatch hover-tooltip tooltip-bot">
                                                            <span class="tooltip color-filter">Purple</span>
                                                            <span class="swatch-value bg-light-purple"></span>
                                                            <img class=" lazyload"
                                                                data-src="images/products/fashion/product-14.jpg"
                                                                src="images/products/fashion/product-14.jpg"
                                                                alt="image-product">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="card-product style-3">
                                                <div class="card-product-wrapper">
                                                    <a href="product-detail.html" class="product-img">
                                                        <img class="img-product lazyload"
                                                            data-src="images/products/fashion/product-21.jpg"
                                                            src="images/products/fashion/product-21.jpg"
                                                            alt="image-product">
                                                        <img class="img-hover lazyload"
                                                            data-src="images/products/fashion/women-black-3.jpg"
                                                            src="images/products/fashion/women-black-3.jpg"
                                                            alt="image-product">
                                                    </a>
                                                    <ul class="list-product-btn">
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="box-icon hover-tooltip wishlist">
                                                                <span class="icon icon-heart2"></span>
                                                                <span class="tooltip">Add to Wishlist</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="btn-quickview box-icon hover-tooltip quickview">
                                                                <span class="icon icon-view"></span>
                                                                <span class="tooltip">Quick View</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="box-icon hover-tooltip compare btn-compare">
                                                                <span class="icon icon-compare"></span>
                                                                <span class="tooltip">Add to Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="product-btn-main">
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="btn-main-product">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="text-md fw-medium">
                                                                Add to Cart
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-product-info">
                                                    <a href="product-detail.html"
                                                        class="name-product link fw-medium text-md">Crop College
                                                        T-Shirt</a>
                                                    <p class="price-wrap fw-medium">
                                                        <span class="price-new">₹80.00</span>
                                                        <span class=" price-old">₹100.00</span>
                                                    </p>
                                                    <ul class="list-color-product">
                                                        <li
                                                            class="list-color-item color-swatch hover-tooltip tooltip-bot active">
                                                            <span class="tooltip color-filter">Dark Green</span>
                                                            <span class="swatch-value bg-dark-green"></span>
                                                            <img class=" lazyload"
                                                                data-src="images/products/fashion/product-21.jpg"
                                                                src="images/products/fashion/product-21.jpg"
                                                                alt="image-product">
                                                        </li>
                                                        <li
                                                            class="list-color-item color-swatch hover-tooltip tooltip-bot">
                                                            <span class="tooltip color-filter">Black</span>
                                                            <span class="swatch-value bg-dark"></span>
                                                            <img class=" lazyload"
                                                                data-src="images/products/fashion/women-black-3.jpg"
                                                                src="images/products/fashion/women-black-3.jpg"
                                                                alt="image-product">
                                                        </li>
                                                        <li
                                                            class="list-color-item color-swatch hover-tooltip tooltip-bot">
                                                            <span class="tooltip color-filter">Purple</span>
                                                            <span class="swatch-value bg-light-purple-3"></span>
                                                            <img class="lazyload"
                                                                data-src="images/products/fashion/product-23.jpg"
                                                                src="images/products/fashion/product-23.jpg"
                                                                alt="image-product">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="card-product style-3 card-product-size">
                                                <div class="card-product-wrapper">
                                                    <a href="product-detail.html" class="product-img">
                                                        <img class="img-product lazyload"
                                                            data-src="images/products/fashion/product-22.jpg"
                                                            src="images/products/fashion/product-22.jpg"
                                                            alt="image-product">
                                                        <img class="img-hover lazyload"
                                                            data-src="images/products/fashion/product-5.jpg"
                                                            src="images/products/fashion/product-5.jpg"
                                                            alt="image-product">
                                                    </a>
                                                    <ul class="list-product-btn">
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="box-icon hover-tooltip wishlist">
                                                                <span class="icon icon-heart2"></span>
                                                                <span class="tooltip">Add to Wishlist</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="btn-quickview box-icon hover-tooltip quickview">
                                                                <span class="icon icon-view"></span>
                                                                <span class="tooltip">Quick View</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                class="box-icon hover-tooltip compare btn-compare">
                                                                <span class="icon icon-compare"></span>
                                                                <span class="tooltip">Add to Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="product-btn-main">
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="btn-main-product">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="text-md fw-medium">
                                                                Add to Cart
                                                            </span>
                                                        </a>
                                                    </div>

                                                    <ul class="size-box">
                                                        <li class="size-item text-xs text-white">XS</li>
                                                        <li class="size-item text-xs text-white">S</li>
                                                        <li class="size-item text-xs text-white">M</li>
                                                        <li class="size-item text-xs text-white">L</li>
                                                        <li class="size-item text-xs text-white">XL</li>
                                                        <li class="size-item text-xs text-white">2XL</li>
                                                    </ul>

                                                </div>
                                                <div class="card-product-info">
                                                    <a href="product-detail.html"
                                                        class="name-product link fw-medium text-md">Bow-Tie T-Shirt</a>
                                                    <p class="price-wrap fw-medium">
                                                        <span class="price-new">₹120.00</span>
                                                        <span class=" price-old">₹140.00</span>
                                                    </p>
                                                    <ul class="list-color-product">
                                                        <li
                                                            class="list-color-item color-swatch hover-tooltip tooltip-bot active">
                                                            <span class="tooltip color-filter">Black</span>
                                                            <span class="swatch-value bg-dark"></span>
                                                            <img class=" lazyload"
                                                                data-src="images/products/fashion/product-22.jpg"
                                                                src="images/products/fashion/product-22.jpg"
                                                                alt="image-product">
                                                        </li>
                                                        <li
                                                            class="list-color-item color-swatch hover-tooltip tooltip-bot">
                                                            <span class="tooltip color-filter">Beige</span>
                                                            <span class="swatch-value bg-beige"></span>
                                                            <img class=" lazyload"
                                                                data-src="images/products/fashion/product-5.jpg"
                                                                src="images/products/fashion/product-5.jpg"
                                                                alt="image-product">
                                                        </li>
                                                        <li
                                                            class="list-color-item color-swatch hover-tooltip line tooltip-bot">
                                                            <span class="tooltip color-filter">White</span>
                                                            <span class="swatch-value bg-white"></span>
                                                            <img class=" lazyload"
                                                                data-src="images/products/fashion/product-1.jpg"
                                                                src="images/products/fashion/product-1.jpg"
                                                                alt="image-product">
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex d-xl-none sw-dot-default sw-pagination-search justify-content-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /search -->

    <!-- shoppingCart -->
    <div class="offcanvas offcanvas-end popup-style-1 popup-shopping-cart" id="shoppingCart">
        <div class="canvas-wrapper">
            <div class="popup-header">
                <span class="title">Shopping cart</span>
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas"></span>
            </div>
            <div class="wrap">
                <div class="tf-mini-cart-threshold">
                    <div class="text">
                        Spend <span class="fw-medium">₹100</span> more to get <span class="fw-medium">Free
                            Shipping</span>
                    </div>
                    <div class="tf-progress-bar tf-progress-ship">
                        <div class="value" style="width: 0%;" data-progress="75">
                            <i class="icon icon-car"></i>
                        </div>
                    </div>
                </div>
                <div class="tf-mini-cart-wrap">
                    <div class="tf-mini-cart-main">
                        <div class="tf-mini-cart-sroll">
                            <div class="tf-mini-cart-items">
                                <div class="tf-mini-cart-item file-delete">
                                    <div class="tf-mini-cart-image">
                                        <a href="product-detail.html">
                                            <img class="lazyload" data-src="images/products/fashion/women-1.jpg"
                                                src="images/products/fashion/women-1.jpg" alt="img-product">
                                        </a>
                                    </div>
                                    <div class="tf-mini-cart-info">
                                        <div class="d-flex justify-content-between">
                                            <a class="title link text-md fw-medium" href="product-detail.html">Short
                                                Sleeve Sweat</a>
                                            <i class="icon icon-close remove fs-12"></i>
                                        </div>
                                        <div class="info-variant">
                                            <select class="text-xs">
                                                <option value="White / L">White / L</option>
                                                <option value="White / M">White / M</option>
                                                <option value="Black / L">Black / L</option>
                                            </select>
                                            <i class="icon-pen edit"></i>
                                        </div>
                                        <p class="price-wrap text-sm fw-medium">
                                            <span class="new-price text-primary">₹130.00</span>
                                            <span
                                                class="old-price text-decoration-line-through text-dark-1">₹150.00</span>
                                        </p>
                                        <div class="wg-quantity small">
                                            <button class="btn-quantity minus-btn">-</button>
                                            <input class="quantity-product font-4" type="text" name="number" value="1">
                                            <button class="btn-quantity plus-btn">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-mini-cart-item file-delete">
                                    <div class="tf-mini-cart-image">
                                        <a href="product-detail.html">
                                            <img class="lazyload" data-src="images/products/fashion/women-2.jpg"
                                                src="images/products/fashion/women-2.jpg" alt="img-product">
                                        </a>
                                    </div>
                                    <div class="tf-mini-cart-info">
                                        <div class="d-flex justify-content-between">
                                            <a class="title link text-md fw-medium" href="product-detail.html">Loose
                                                Fit Tee</a>
                                            <i class="icon icon-close remove fs-12"></i>
                                        </div>
                                        <div class="info-variant">
                                            <select class="text-xs">
                                                <option value="White / L">White / L</option>
                                                <option value="White / M">White / M</option>
                                                <option value="Black / L">Black / L</option>
                                            </select>
                                            <i class="icon-pen edit"></i>
                                        </div>
                                        <p class="price-wrap text-sm fw-medium">
                                            <span class="new-price text-primary">₹130.00</span>
                                            <span
                                                class="old-price text-decoration-line-through text-dark-1">₹150.00</span>
                                        </p>
                                        <div class="wg-quantity small">
                                            <button class="btn-quantity minus-btn">-</button>
                                            <input class="quantity-product font-4" type="text" name="number" value="1">
                                            <button class="btn-quantity plus-btn">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-minicart-recommendations">
                                <div
                                    class="tf-minicart-recommendations-heading d-flex justify-content-between align-items-end">
                                    <div class="tf-minicart-recommendations-title text-md fw-medium">You may also
                                        like</div>
                                    <div class="d-flex gap-10">
                                        <div
                                            class="swiper-button-prev nav-swiper arrow-1 size-30 nav-prev-also-product">
                                        </div>
                                        <div
                                            class="swiper-button-next nav-swiper arrow-1 size-30 nav-next-also-product">
                                        </div>
                                    </div>
                                </div>
                                <div dir="ltr" class="swiper tf-swiper" data-swiper='{
                                            "slidesPerView": 1,
                                            "spaceBetween": 10,
                                            "speed": 800,
                                            "observer": true,
                                            "observeParents": true,
                                            "slidesPerGroup": 1,
                                            "navigation": {
                                                "clickable": true,
                                                "nextEl": ".nav-next-also-product",
                                                "prevEl": ".nav-prev-also-product"
                                            }
                                        }'>
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="tf-mini-cart-item line radius-16">
                                                <div class="tf-mini-cart-image">
                                                    <a href="product-detail.html">
                                                        <img class="lazyload"
                                                            data-src="images/products/fashion/product-1.jpg"
                                                            src="images/products/fashion/product-1.jpg"
                                                            alt="img-product">
                                                    </a>
                                                </div>
                                                <div class="tf-mini-cart-info justify-content-center">
                                                    <a class="title link text-md fw-medium"
                                                        href="product-detail.html">Polo T-Shirt</a>
                                                    <p class="price-wrap text-sm fw-medium">
                                                        <span class="new-price text-primary">₹130.00</span>
                                                        <span
                                                            class="old-price text-decoration-line-through text-dark-1">₹150.00</span>
                                                    </p>
                                                    <a href="#"
                                                        class="tf-btn animate-btn d-inline-flex bg-dark-2 w-max-content">Add
                                                        to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="tf-mini-cart-item line radius-16">
                                                <div class="tf-mini-cart-image">
                                                    <a href="product-detail.html">
                                                        <img class="lazyload"
                                                            data-src="images/products/fashion/product-2.jpg"
                                                            src="images/products/fashion/product-2.jpg"
                                                            alt="img-product">
                                                    </a>
                                                </div>
                                                <div class="tf-mini-cart-info justify-content-center">
                                                    <a class="title link text-md fw-medium"
                                                        href="product-detail.html">Short Sleeve Sweat</a>
                                                    <p class="price-wrap text-sm fw-medium">
                                                        <span class="new-price text-primary">₹100.00</span>
                                                        <span
                                                            class="old-price text-decoration-line-through text-dark-1">₹115.00</span>
                                                    </p>
                                                    <a href="#"
                                                        class="tf-btn animate-btn d-inline-flex bg-dark-2 w-max-content">Add
                                                        to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="tf-mini-cart-item line radius-16">
                                                <div class="tf-mini-cart-image">
                                                    <a href="product-detail.html">
                                                        <img class="lazyload"
                                                            data-src="images/products/fashion/product-3.jpg"
                                                            src="images/products/fashion/product-3.jpg"
                                                            alt="img-product">
                                                    </a>
                                                </div>
                                                <div class="tf-mini-cart-info justify-content-center">
                                                    <a class="title link text-md fw-medium"
                                                        href="product-detail.html">Crop T-shirt</a>
                                                    <p class="price-wrap text-sm fw-medium">
                                                        <span class="new-price text-primary">₹80.00</span>
                                                        <span
                                                            class="old-price text-decoration-line-through text-dark-1">₹100.00</span>
                                                    </p>
                                                    <a href="#"
                                                        class="tf-btn animate-btn d-inline-flex bg-dark-2 w-max-content">Add
                                                        to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tf-mini-cart-bottom">
                        <div class="tf-mini-cart-tool">
                            <div class="tf-mini-cart-tool-btn btn-add-gift">
                                <i class="icon icon-gift2"></i>
                                <div class="text-xxs">Add gift wrap</div>
                            </div>
                            <div class="tf-mini-cart-tool-btn btn-add-note">
                                <i class="icon icon-note"></i>
                                <div class="text-xxs">Order note</div>
                            </div>
                            <div class="tf-mini-cart-tool-btn btn-coupon">
                                <i class="icon icon-coupon"></i>
                                <div class="text-xxs">Coupon</div>
                            </div>
                            <div class="tf-mini-cart-tool-btn btn-estimate-shipping">
                                <i class="icon icon-car"></i>
                                <div class="text-xxs">Shipping</div>
                            </div>
                        </div>
                        <div class="tf-mini-cart-bottom-wrap">
                            <div class="tf-cart-totals-discounts">
                                <div class="tf-cart-total text-xl fw-medium">Total:</div>
                                <div class="tf-totals-total-value text-xl fw-medium">₹130.00 USD</div>
                            </div>
                            <div class="tf-cart-tax text-sm opacity-8">Taxes and shipping calculated at checkout
                            </div>
                            <div class="tf-cart-checkbox">
                                <div class="tf-checkbox-wrapp">
                                    <input class="" type="checkbox" id="CartDrawer-Form_agree" name="agree_checkbox">
                                    <div>
                                        <i class="icon-check"></i>
                                    </div>
                                </div>
                                <label for="CartDrawer-Form_agree" class="text-sm">
                                    I agree with the
                                    <a href="term-and-condition.html" title="Terms of Service" class="fw-medium">terms
                                        and conditions</a>
                                </label>
                            </div>
                            <div class="tf-mini-cart-view-checkout">
                                <a href="checkout.html"
                                    class="tf-btn animate-btn d-inline-flex bg-dark-2 w-100 justify-content-center"><span>Check
                                        out</span></a>
                                <a href="view-cart.html"
                                    class="tf-btn btn-out-line-dark2 w-100 justify-content-center">View cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="tf-mini-cart-tool-openable add-gift">
                        <div class="overplay tf-mini-cart-tool-close"></div>
                        <form action="#" class="tf-mini-cart-tool-content">
                            <div class="tf-mini-cart-tool-text text-sm fw-medium">Add gift wrap</div>
                            <div class="tf-mini-cart-tool-text1">The product will be wrapped carefully.
                                Fee is only <span class="text fw-medium text-dark">₹10.00</span>. Do you want a
                                gift wrap?</div>
                            <div class="tf-cart-tool-btns">
                                <button class="subscribe-button tf-btn animate-btn d-inline-flex bg-dark-2 w-100"
                                    type="submit">Add a Gift Wrap</button>
                                <div class="tf-btn btn-out-line-dark2 w-100 tf-mini-cart-tool-close">Cancel</div>
                            </div>
                        </form>
                    </div>
                    <div class="tf-mini-cart-tool-openable add-note">
                        <div class="overplay tf-mini-cart-tool-close"></div>
                        <form action="#" class="tf-mini-cart-tool-content">
                            <label for="Cart-note" class="tf-mini-cart-tool-text text-sm fw-medium">Order
                                note</label>
                            <textarea name="note" id="Cart-note" placeholder="Instruction for seller..."></textarea>
                            <div class="tf-cart-tool-btns">
                                <button class="subscribe-button tf-btn animate-btn d-inline-flex bg-dark-2 w-100"
                                    type="submit">Save</button>
                                <div class="tf-btn btn-out-line-dark2 w-100 tf-mini-cart-tool-close">Close</div>
                            </div>
                        </form>
                    </div>
                    <div class="tf-mini-cart-tool-openable coupon">
                        <div class="overplay tf-mini-cart-tool-close"></div>
                        <form action="#" class="tf-mini-cart-tool-content">
                            <div class="tf-mini-cart-tool-text text-sm fw-medium">Add coupon</div>
                            <div class="tf-mini-cart-tool-text1">* Discount will be calculated and
                                applied at checkout</div>
                            <input type="text" name="text" placeholder="">
                            <div class="tf-cart-tool-btns">
                                <button class="subscribe-button tf-btn animate-btn d-inline-flex bg-dark-2 w-100"
                                    type="submit">Save</button>
                                <div class="tf-btn btn-out-line-dark2 w-100 tf-mini-cart-tool-close">Close</div>
                            </div>
                        </form>
                    </div>
                    <div class="tf-mini-cart-tool-openable estimate-shipping">
                        <div class="overplay tf-mini-cart-tool-close"></div>
                        <form id="shipping-form" class="tf-mini-cart-tool-content">
                            <div class="tf-mini-cart-tool-text text-sm fw-medium">Shipping estimates</div>
                            <div class="field">
                                <p class="text-sm">Country</p>
                                <div class="tf-select">
                                    <select class="w-100" id="shipping-country-form" name="address[country]"
                                        data-default="">
                                        <option value="Indore"
                                            data-provinces='[["Indoren Capital Territory","Indoren Capital Territory"],["New South Wales","New South Wales"],["Northern Territory","Northern Territory"],["Queensland","Queensland"],["South Indore","South Indore"],["Tasmania","Tasmania"],["Victoria","Victoria"],["Western Indore","Western Indore"]]'>
                                            Indore</option>
                                        <option value="Austria" data-provinces='[]'>Austria</option>
                                        <option value="Belgium" data-provinces='[]'>Belgium</option>
                                        <option value="Canada"
                                            data-provinces='[["Ontario","Ontario"],["Quebec","Quebec"]]'>Canada
                                        </option>
                                        <option value="Czech Republic" data-provinces='[]'>Czechia</option>
                                        <option value="Denmark" data-provinces='[]'>Denmark</option>
                                        <option value="Finland" data-provinces='[]'>Finland</option>
                                        <option value="France" data-provinces='[]'>France</option>
                                        <option value="Germany" data-provinces='[]'>Germany</option>
                                        <option selected value="United States"
                                            data-provinces='[["Alabama","Alabama"],["California","California"],["Florida","Florida"]]'>
                                            United States</option>
                                        <option value="United Kingdom"
                                            data-provinces='[["England","England"],["Scotland","Scotland"],["Wales","Wales"],["Northern Ireland","Northern Ireland"]]'>
                                            United Kingdom</option>
                                        <option value="India" data-provinces='[]'>India</option>
                                        <option value="Japan" data-provinces='[]'>Japan</option>
                                        <option value="Mexico" data-provinces='[]'>Mexico</option>
                                        <option value="South Korea" data-provinces='[]'>South Korea</option>
                                        <option value="Spain" data-provinces='[]'>Spain</option>
                                        <option value="Italy" data-provinces='[]'>Italy</option>
                                        <option value="Vietnam"
                                            data-provinces='[["Ha Noi","Ha Noi"],["Da Nang","Da Nang"],["Ho Chi Minh","Ho Chi Minh"]]'>
                                            Vietnam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <p class="text-sm">State/Province</p>
                                <div class="tf-select">
                                    <select id="shipping-province-form" name="address[province]"
                                        data-default=""></select>
                                </div>
                            </div>
                            <div class="field">
                                <p class="text-sm">Zipcode</p>
                                <input type="text" data-opend-focus id="zipcode" name="address[zip]" value="">
                            </div>
                            <div id="zipcode-message" class="error" style="display: none;">
                                We found one shipping rate available for undefined.
                            </div>
                            <div id="zipcode-success" class="success" style="display: none;">
                                <p>We found one shipping rate available for your address:</p>
                                <p class="standard">Standard at <span>₹0.00</span> USD</p>
                            </div>
                            <div class="tf-cart-tool-btns">
                                <button class="subscribe-button tf-btn animate-btn d-inline-flex bg-dark-2 w-100"
                                    type="submit">Estimate</button>
                                <div
                                    class="tf-mini-cart-tool-primary tf-btn btn-out-line-dark2 w-100 tf-mini-cart-tool-close">
                                    Close</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /shoppingCart -->

    <!-- modal quickView -->
    <div class="modal fade modalCentered modal-quick-view" id="quickView">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                <div class="tf-product-media-wrap">
                    <div dir="ltr" class="swiper tf-single-slide">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" data-color="orange">
                                <div class="item">
                                    <img class="lazyload" data-src="images/products/fashion/product-40.jpg"
                                        src="images/products/fashion/product-40.jpg" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide" data-color="green">
                                <div class="item">
                                    <img class="lazyload" data-src="images/products/fashion/product-41.jpg"
                                        src="images/products/fashion/product-41.jpg" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide" data-color="pink">
                                <div class="item">
                                    <img class="lazyload" data-src="images/products/fashion/product-42.jpg"
                                        src="images/products/fashion/product-42.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-prev nav-swiper arrow-1 nav-prev-cls single-slide-prev"></div>
                        <div class="swiper-button-next nav-swiper arrow-1 nav-next-cls single-slide-next"></div>
                    </div>
                </div>
                <div class="tf-product-info-wrap">
                    <div class="tf-product-info-inner">
                        <div class="tf-product-heading">
                            <h6 class="product-name"><a class="link" href="product-detail.html">Striped T-Shirt</a>
                            </h6>
                            <div class="product-price">
                                <h6 class="price-new price-on-sale">₹100.00</h6>
                                <h6 class="price-old">₹130.00</h6>
                                <span class="badge-sale">20% Off</span>
                            </div>
                            <p class="text">Pants in an airy weave made from a linen and viscose blend. Featuring a high
                                waist and a zip fly with button. Shaping at the front and back and wide legs.</p>
                        </div>
                        <div class="tf-product-variant">
                            <div class="variant-picker-item variant-color">
                                <div class="variant-picker-label">
                                    Color:<span class="variant-picker-label-value value-currentColor">Orange</span>
                                </div>
                                <div class="variant-picker-values">
                                    <div class="hover-tooltip color-btn active" data-color="orange">
                                        <span class="check-color bg-light-orange-2"></span>
                                        <span class="tooltip">Orange</span>
                                    </div>
                                    <div class="hover-tooltip color-btn" data-color="green">
                                        <span class="check-color bg-light-green"></span>
                                        <span class="tooltip">Green</span>
                                    </div>
                                    <div class="hover-tooltip color-btn" data-color="pink">
                                        <span class="check-color bg-pink"></span>
                                        <span class="tooltip">Pink</span>
                                    </div>
                                </div>
                            </div>
                            <div class="variant-picker-item variant-size">
                                <div class="variant-picker-label">
                                    <div>Size:<span class="variant-picker-label-value value-currentSize">Small</span>
                                    </div>
                                </div>
                                <div class="variant-picker-values">
                                    <span class="size-btn active" data-size="small">S</span>
                                    <span class="size-btn" data-size="medium">M</span>
                                    <span class="size-btn" data-size="large">L</span>
                                    <span class="size-btn" data-size="extra large">XL</span>
                                </div>
                            </div>
                        </div>
                        <div class="tf-product-total-quantity">
                            <div class="group-btn">
                                <div class="wg-quantity">
                                    <button class="btn-quantity minus-btn">-</button>
                                    <input class="quantity-product font-4" type="text" name="number" value="1">
                                    <button class="btn-quantity plus-btn">+</button>
                                </div>
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn hover-primary">Add to
                                    cart</a>
                            </div>
                            <a href="checkout.html" class="tf-btn w-100 animate-btn paypal btn-primary">Buy It Now</a>
                            <a href="checkout.html" class="more-choose-payment link">More payment options</a>
                        </div>
                        <a href="product-detail.html" class="view-details link">View full details <i
                                class="icon icon-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal quickView -->

    <!-- compare  -->
    <div class="modal modalCentered fade modal-compare" id="compare">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <span class="icon icon-close btn-hide-popup" data-bs-dismiss="modal"></span>
                <div class="modal-compare-wrap list-file-delete">
                    <h6 class="title text-center">Compare Products</h6>
                    <div class="tf-compare-inner">
                        <div class="tf-compare-list">
                            <div class="tf-compare-item file-delete">
                                <span class="icon-close remove"></span>
                                <a href="product-detail.html" class="image">
                                    <img class="lazyload" data-src="images/products/fashion/product-8.jpg"
                                        src="images/products/fashion/product-8.jpg" alt="">
                                </a>
                                <div class="content">
                                    <div class="text-title">
                                        <a class="link text-line-clamp-2" href="product-detail.html">Striped T-Shirt</a>
                                    </div>
                                    <p class="price-wrap">
                                        <span class="new-price text-primary">₹130.00</span>
                                        <span class="old-price text-decoration-line-through text-dark-1">₹150.00</span>
                                    </p>
                                </div>
                            </div>
                            <div class="tf-compare-item file-delete">
                                <span class="icon-close remove"></span>
                                <a href="product-detail.html" class="image">
                                    <img class="lazyload" data-src="images/products/fashion/product-6.jpg"
                                        src="images/products/fashion/product-6.jpg" alt="">
                                </a>
                                <div class="content">
                                    <div class="text-title">
                                        <a class="link text-line-clamp-2" href="product-detail.html">Loose Fit Tee</a>
                                    </div>
                                    <p class="price-wrap">
                                        <span class="new-price text-primary">₹115.00</span>
                                        <span class="old-price text-decoration-line-through text-dark-1">₹130.00</span>
                                    </p>
                                </div>
                            </div>
                            <div class="tf-compare-item file-delete">
                                <span class="icon-close remove"></span>
                                <a href="product-detail.html" class="image">
                                    <img class="lazyload" data-src="images/products/fashion/product-15.jpg"
                                        src="images/products/fashion/product-15.jpg" alt="">
                                </a>
                                <div class="content">
                                    <div class="text-title">
                                        <a class="link text-line-clamp-2" href="product-detail.html">Oversized Fit
                                            Tee</a>
                                    </div>
                                    <p class="price-wrap">
                                        <span class="new-price text-primary">₹80.00</span>
                                        <span class="old-price text-decoration-line-through text-dark-1">₹100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tf-compare-buttons justify-content-center">
                        <a href="compare.html" class="tf-btn animate-btn justify-content-center">Compare</a>
                        <div class="tf-btn btn-out-line-dark justify-content-center clear-file-delete"><span>Clear
                                All</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /compare  -->



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