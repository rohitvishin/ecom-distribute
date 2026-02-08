<style>
    .image {
    position: relative;
    overflow: hidden;
}

.image::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.45); /* adjust darkness */
    pointer-events: none;
}
</style>
<div dir="ltr" class="swiper tf-sw-slideshow slider-effect-fade" data-preview="1" data-tablet="1"
                data-mobile="1" data-centered="false" data-space="0" data-space-mb="0" data-loop="true"
                data-auto-play="true">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slider-wrap ">
                            <div class="image image-overlay">
                                <img src="{{ asset_front('images/sliders/achieve-icon2.jpg') }}" data-src="{{ asset_front('images/sliders/achieve-icon2.jpg') }}"
                                    alt="slider" class="lazyload">
                            </div>
                            <div class="box-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="content-slider text-center ">
                                                <div class="box-title-slider">
                                                    <div
                                                        class="heading font-7 display-2xl text-white fw-semibold fade-item fade-item-1">
                                                        We Are Here To Give You 
                                                    </div>
                                                    <div class="heading font-7 display-2xl text-white fw-semibold fade-item fade-item-1">
                                                        The Best Herb Products
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="wrap-pagination">
                    <div class="container">
                        <div class="sw-dots style-grey dot-white sw-pagination-slider justify-content-center"></div>
                    </div>
                </div>
            </div>