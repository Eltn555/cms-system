@extends('front.master')
@section('content')
    <!-- mini cart start -->
    <div class="sidebar-cart-active">
        <div class="sidebar-cart-all">
            <a class="cart-close" href="#"><i class="pe-7s-close"></i></a>
            <div class="cart-content">
                <h3>Shopping Cart</h3>
                <ul>
                    <li>
                        <div class="cart-img">
                            <a href="#"><img src="assets/images/cart/cart-1.jpg" alt=""></a>
                        </div>
                        <div class="cart-title">
                            <h4><a href="#">Stylish Swing Chair</a></h4>
                            <span> 1 × $49.00	</span>
                        </div>
                        <div class="cart-delete">
                            <a href="#">×</a>
                        </div>
                    </li>
                    <li>
                        <div class="cart-img">
                            <a href="#"><img src="assets/images/cart/cart-2.jpg" alt=""></a>
                        </div>
                        <div class="cart-title">
                            <h4><a href="#">Modern Chairs</a></h4>
                            <span> 1 × $49.00	</span>
                        </div>
                        <div class="cart-delete">
                            <a href="#">×</a>
                        </div>
                    </li>
                </ul>
                <div class="cart-total">
                    <h4>Subtotal: <span>$170.00</span></h4>
                </div>
                <div class="cart-btn btn-hover">
                    <a class="theme-color" href="cart.html">view cart</a>
                </div>
                <div class="checkout-btn btn-hover">
                    <a class="theme-color" href="checkout.html">checkout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-category-area">
        <div class="slider-fixed-image slider-height-4 bg-img slider-bg-color-4" style="background-image:url(assets/images/slider/slider-fix-img.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider-content-4 pt-145 text-center">
                            <h5 data-aos="fade-up" data-aos-delay="200">new arrival</h5>
                            <h1 data-aos="fade-up" data-aos-delay="400">Summer New <br>Collection</h1>
                            <div class="slider-btn btn-hover" data-aos="fade-up" data-aos-delay="600">
                                <a href="product-details.html" class="btn btn-bg-white btn-text-black btn-border-radius btn-padding-inc hover-border-radius">
                                    Shop Now <i class=" ti-arrow-right "></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="category-area category-area-position">
            <div class="container">
                <div class="category-slider-active-2 swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <div class="category-img-2">
                                    <a href="shop.html">
                                        <img class="category-normal-img" src="assets/images/category/category-6.png" alt="">
                                        <img class="category-hover-img" src="assets/images/category/category-hover-6.png" alt="icon">
                                    </a>
                                </div>
                                <div class="category-content-2">
                                    <h4><a href="shop.html">Wooden Sat</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="400">
                                <div class="category-img-2">
                                    <a href="shop.html">
                                        <img class="category-normal-img" src="assets/images/category/category-7.png" alt="">
                                        <img class="category-hover-img" src="assets/images/category/category-hover-7.png" alt="icon">
                                    </a>
                                </div>
                                <div class="category-content-2">
                                    <h4><a href="shop.html">Office Cabin</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="600">
                                <div class="category-img-2">
                                    <a href="shop.html">
                                        <img class="category-normal-img" src="assets/images/category/category-8.png" alt="">
                                        <img class="category-hover-img" src="assets/images/category/category-hover-8.png" alt="icon">
                                    </a>
                                </div>
                                <div class="category-content-2">
                                    <h4><a href="shop.html">Bedroom Light</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="800">
                                <div class="category-img-2">
                                    <a href="shop.html">
                                        <img class="category-normal-img" src="assets/images/category/category-9.png" alt="">
                                        <img class="category-hover-img" src="assets/images/category/category-hover-9.png" alt="icon">
                                    </a>
                                </div>
                                <div class="category-content-2">
                                    <h4><a href="shop.html">Bathroom Kit</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="1000">
                                <div class="category-img-2">
                                    <a href="shop.html">
                                        <img class="category-normal-img" src="assets/images/category/category-10.png" alt="">
                                        <img class="category-hover-img" src="assets/images/category/category-hover-10.png" alt="icon">
                                    </a>
                                </div>
                                <div class="category-content-2">
                                    <h4><a href="shop.html">Kitchen Kit</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-category-wrap-2 text-center">
                                <div class="category-img-2">
                                    <a href="#">
                                        <img class="category-normal-img" src="assets/images/category/category-11.png" alt="">
                                        <img class="category-hover-img" src="assets/images/category/category-hover-11.png" alt="icon">
                                    </a>
                                </div>
                                <div class="category-content-2">
                                    <h4><a href="#">Computer Table</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-category-wrap-2 text-center">
                                <div class="category-img-2">
                                    <a href="#">
                                        <img class="category-normal-img" src="assets/images/category/category-7.png" alt="">
                                        <img class="category-hover-img" src="assets/images/category/category-hover-7.png" alt="icon">
                                    </a>
                                </div>
                                <div class="category-content-2">
                                    <h4><a href="#">Office Cabin</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-area padding-22-row-col pt-100 pb-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="200">
                        <a href="product-details.html"><img src="assets/images/banner/banner-6.png" alt=""></a>
                        <div class="banner-content-5">
                            <span>Up To 40% Off</span>
                            <h2>Dining Furniture</h2>
                            <div class="btn-style-3 btn-hover">
                                <a class="btn hover-border-radius" href="product-details.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="400">
                        <a href="product-details.html"><img src="assets/images/banner/banner-7.png" alt=""></a>
                        <div class="banner-content-5">
                            <span>Up To 40% Off</span>
                            <h2>Bed Furniture</h2>
                            <div class="btn-style-3 btn-hover">
                                <a class="btn hover-border-radius" href="product-details.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pb-95">
        <div class="container">
            <div class="tab-style-1 tab-style-1-modify tab-center nav" data-aos="fade-up" data-aos-delay="200">
                <a href="#pro-1" data-bs-toggle="tab">Hot Products </a>
                <a class="active" href="#pro-2" data-bs-toggle="tab">New Arrivals </a>
                <a href="#pro-3" data-bs-toggle="tab" class=""> Best Sellers </a>
                <a href="#pro-4" data-bs-toggle="tab" class=""> Sale Items </a>
            </div>
            <div class="tab-content jump">
                <div id="pro-1" class="tab-pane">
                    <div class="product-slider-active-2 swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-3.png" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-10%</span>
                                        </div>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                        <div class="product-price">
                                            <span class="old-price">$25.89 </span>
                                            <span class="new-price">$20.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-4.png" alt="">
                                        </a>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                        <div class="product-price">
                                            <span>$50.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-1.png" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-10%</span>
                                        </div>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">Easy Modern Chair</a></h3>
                                        <div class="product-price">
                                            <span class="old-price">$45.00 </span>
                                            <span class="new-price">$40.00 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-2.png" alt="">
                                        </a>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">Stylish Swing Chair</a></h3>
                                        <div class="product-price">
                                            <span>$30.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-2.png" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-10%</span>
                                        </div>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                        <div class="product-price">
                                            <span class="old-price">$80.50 </span>
                                            <span class="new-price">$75.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pro-2" class="tab-pane active">
                    <div class="product-slider-active-2 swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-1.png" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-10%</span>
                                        </div>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                        <div class="product-price">
                                            <span class="old-price">$25.89 </span>
                                            <span class="new-price">$20.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap" data-aos="fade-up" data-aos-delay="400">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-2.png" alt="">
                                        </a>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                        <div class="product-price">
                                            <span>$50.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap" data-aos="fade-up" data-aos-delay="600">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-3.png" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-10%</span>
                                        </div>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">Easy Modern Chair</a></h3>
                                        <div class="product-price">
                                            <span class="old-price">$45.00 </span>
                                            <span class="new-price">$40.00 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap" data-aos="fade-up" data-aos-delay="800">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-4.png" alt="">
                                        </a>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">Stylish Swing Chair</a></h3>
                                        <div class="product-price">
                                            <span>$30.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap" data-aos="fade-up" data-aos-delay="1000">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-2.png" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-10%</span>
                                        </div>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                        <div class="product-price">
                                            <span class="old-price">$80.50 </span>
                                            <span class="new-price">$75.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pro-3" class="tab-pane">
                    <div class="product-slider-active-2 swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-4.png" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-10%</span>
                                        </div>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                        <div class="product-price">
                                            <span class="old-price">$25.89 </span>
                                            <span class="new-price">$20.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-3.png" alt="">
                                        </a>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                        <div class="product-price">
                                            <span>$50.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-2.png" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-10%</span>
                                        </div>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">Easy Modern Chair</a></h3>
                                        <div class="product-price">
                                            <span class="old-price">$45.00 </span>
                                            <span class="new-price">$40.00 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-1.png" alt="">
                                        </a>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">Stylish Swing Chair</a></h3>
                                        <div class="product-price">
                                            <span>$30.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-2.png" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-10%</span>
                                        </div>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                        <div class="product-price">
                                            <span class="old-price">$80.50 </span>
                                            <span class="new-price">$75.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pro-4" class="tab-pane">
                    <div class="product-slider-active-2 swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-2.png" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-10%</span>
                                        </div>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                        <div class="product-price">
                                            <span class="old-price">$25.89 </span>
                                            <span class="new-price">$20.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-1.png" alt="">
                                        </a>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                        <div class="product-price">
                                            <span>$50.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-4.png" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-10%</span>
                                        </div>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">Easy Modern Chair</a></h3>
                                        <div class="product-price">
                                            <span class="old-price">$45.00 </span>
                                            <span class="new-price">$40.00 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-3.png" alt="">
                                        </a>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">Stylish Swing Chair</a></h3>
                                        <div class="product-price">
                                            <span>$30.25 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="product-details.html">
                                            <img src="assets/images/product/product-2.png" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-10%</span>
                                        </div>
                                        <div class="product-action-wrap">
                                            <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">New Modern Sofa Set</a></h3>
                                        <div class="product-price">
                                            <span class="old-price">$80.50 </span>
                                            <span class="new-price">$75.25 </span>
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
    <div class="banner-area pb-75 padding-20-row-col">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 order-lg-0 order-md-1 order-sm-1 col-12">
                    <div class="banner-wrap mb-20" data-aos="fade-up" data-aos-delay="400">
                        <a href="product-details.html"><img src="assets/images/banner/banner-13.png" alt=""></a>
                        <div class="banner-content-9">
                            <h3>Bedroom Sofa</h3>
                            <h4>Urdan Collection</h4>
                        </div>
                        <div class="btn-style-6 btn-style-6-position btn-hover">
                            <a href="product-details.html" class="btn btn-border-radius hover-border-radius theme-color padding-dec">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 order-lg-1 order-md-0 order-sm-0 col-12">
                    <div class="banner-wrap mb-20" data-aos="fade-up" data-aos-delay="200">
                        <a href="product-details.html"><img src="assets/images/banner/banner-14.png" alt=""></a>
                        <div class="banner-content-9">
                            <h3>Modern New Sofa</h3>
                            <h4>Urdan Office Collection</h4>
                        </div>
                        <div class="btn-style-6 btn-style-6-position btn-hover">
                            <a href="product-details.html" class="btn btn-border-radius hover-border-radius theme-color padding-dec">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 order-lg-2 order-md-2 order-sm-2 col-12">
                    <div class="banner-wrap mb-20" data-aos="fade-up" data-aos-delay="600">
                        <a href="product-details.html"><img src="assets/images/banner/banner-15.png" alt=""></a>
                        <div class="banner-content-9">
                            <h3>Office Chair</h3>
                            <h4>Urdan Collection</h4>
                        </div>
                        <div class="btn-style-6 btn-style-6-position btn-hover">
                            <a href="product-details.html" class="btn btn-border-radius hover-border-radius theme-color padding-dec">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pb-60">
        <div class="container">
            <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                <h2>Hot Products</h2>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="200">
                        <a href="shop.html"><img src="assets/images/banner/banner-23.png" alt=""></a>
                        <div class="banner-content-10-position top-inc">
                            <div class="banner-content-10 banner-content-10-responsive">
                                <h3>Exceptional</h3>
                                <h4>Officr Chair</h4>
                            </div>
                        </div>
                        <div class="banner-btn-1">
                            <a href="#">21 Products</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="assets/images/product/product-7.png" alt="">
                                    </a>
                                    <div class="product-action-wrap">
                                        <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                        <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="pe-7s-look"></i>
                                        </button>
                                    </div>
                                    <div class="product-action-2-wrap">
                                        <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">Round Standard Chair</a></h3>
                                    <div class="product-price">
                                        <span>$30.25 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="400">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="assets/images/product/product-5.png" alt="">
                                    </a>
                                    <div class="product-badge badge-top badge-right badge-pink">
                                        <span>-10%</span>
                                    </div>
                                    <div class="product-action-wrap">
                                        <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                        <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="pe-7s-look"></i>
                                        </button>
                                    </div>
                                    <div class="product-action-2-wrap">
                                        <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">Interior moderno render</a></h3>
                                    <div class="product-price">
                                        <span class="old-price">$25.89 </span>
                                        <span class="new-price">$20.25 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="600">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="assets/images/product/product-3.png" alt="">
                                    </a>
                                    <div class="product-badge badge-top badge-right badge-pink">
                                        <span>-10%</span>
                                    </div>
                                    <div class="product-action-wrap">
                                        <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                        <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="pe-7s-look"></i>
                                        </button>
                                    </div>
                                    <div class="product-action-2-wrap">
                                        <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">Easy Modern Chair</a></h3>
                                    <div class="product-price">
                                        <span class="old-price">$45.00 </span>
                                        <span class="new-price">$40.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="800">
                                <div class="product-img img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="assets/images/product/product-9.png" alt="">
                                    </a>
                                    <div class="product-action-wrap">
                                        <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i></button>
                                        <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="pe-7s-look"></i>
                                        </button>
                                    </div>
                                    <div class="product-action-2-wrap">
                                        <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">Modern Lounge Chairs</a></h3>
                                    <div class="product-price">
                                        <span>$30.25 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-area padding-22-row-col pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="200">
                        <a href="product-details.html"><img src="assets/images/banner/banner-24.png" alt=""></a>
                        <div class="banner-content-12">
                            <h2>Exceptional Furniture Set</h2>
                            <div class="btn-style-7">
                                <a href="product-details.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="400">
                        <a href="product-details.html"><img src="assets/images/banner/banner-25.png" alt=""></a>
                        <div class="banner-content-12 banner-content-12-width">
                            <h2>Modern Sofa</h2>
                            <div class="btn-style-7">
                                <a href="product-details.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonial-area pb-100">
        <div class="container">
            <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                <h2>Testimonial</h2>
            </div>
            <div class="testimonial-active swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="single-testimonial" data-aos="fade-up" data-aos-delay="200">
                            <div class="testimonial-img">
                                <img src="assets/images/testimonial/client-1.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectet adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore.</p>
                            <div class="testimonial-info">
                                <h4>Amrita Sha</h4>
                                <span> Our Client.</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-testimonial" data-aos="fade-up" data-aos-delay="400">
                            <div class="testimonial-img">
                                <img src="assets/images/testimonial/client-2.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectet adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore.</p>
                            <div class="testimonial-info">
                                <h4>Andi Lane</h4>
                                <span> Designer.</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-testimonial" data-aos="fade-up" data-aos-delay="600">
                            <div class="testimonial-img">
                                <img src="assets/images/testimonial/client-1.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectet adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore.</p>
                            <div class="testimonial-info">
                                <h4>Ted Ellison</h4>
                                <span> Developer.</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-testimonial" data-aos="fade-up" data-aos-delay="800">
                            <div class="testimonial-img">
                                <img src="assets/images/testimonial/client-2.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectet adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore.</p>
                            <div class="testimonial-info">
                                <h4>Aliah Pitts</h4>
                                <span> Customer.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brand-logo-area pb-95">
        <div class="container">
            <div class="brand-logo-active swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="single-brand-logo" data-aos="fade-up" data-aos-delay="200">
                            <a href="#"><img src="assets/images/brand-logo/brand-logo-1.png" alt=""></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-brand-logo" data-aos="fade-up" data-aos-delay="400">
                            <a href="#"><img src="assets/images/brand-logo/brand-logo-2.png" alt=""></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-brand-logo" data-aos="fade-up" data-aos-delay="600">
                            <a href="#"><img src="assets/images/brand-logo/brand-logo-3.png" alt=""></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-brand-logo" data-aos="fade-up" data-aos-delay="800">
                            <a href="#"><img src="assets/images/brand-logo/brand-logo-4.png" alt=""></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-brand-logo" data-aos="fade-up" data-aos-delay="1000">
                            <a href="#"><img src="assets/images/brand-logo/brand-logo-5.png" alt=""></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-brand-logo" data-aos="fade-up" data-aos-delay="1200">
                            <a href="#"><img src="assets/images/brand-logo/brand-logo-1.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-area pb-70">
        <div class="container">
            <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                <h2>Latest News</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="200">
                        <div class="blog-img-date-wrap mb-25">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="assets/images/blog/blog-1.png" alt=""></a>
                            </div>
                            <div class="blog-date">
                                <h5>05 <span>May</span></h5>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Furniture</a>,</li>
                                    <li>By:<a href="#"> Admin</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-details.html">Lorem ipsum dolor consectet.</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididunt ut labo et dolore magna aliqua.</p>
                            <div class="blog-btn-2 btn-hover">
                                <a class="btn hover-border-radius theme-color" href="blog-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="400">
                        <div class="blog-img-date-wrap mb-25">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="assets/images/blog/blog-2.png" alt=""></a>
                            </div>
                            <div class="blog-date">
                                <h5>06 <span>May</span></h5>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Furniture</a>,</li>
                                    <li>By:<a href="#"> Admin</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-details.html">Duis et volutpat pellentesque.</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididunt ut labo et dolore magna aliqua.</p>
                            <div class="blog-btn-2 btn-hover">
                                <a class="btn hover-border-radius theme-color" href="blog-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="600">
                        <div class="blog-img-date-wrap mb-25">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="assets/images/blog/blog-3.png" alt=""></a>
                            </div>
                            <div class="blog-date">
                                <h5>07 <span>May</span></h5>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Furniture</a>,</li>
                                    <li>By:<a href="#"> Admin</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-details.html">Vivamus vitae dolor convallis.</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididunt ut labo et dolore magna aliqua.</p>
                            <div class="blog-btn-2 btn-hover">
                                <a class="btn hover-border-radius theme-color" href="blog-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Modal start -->
    <div class="modal fade quickview-modal-style" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><i class=" ti-close "></i></a>
                </div>
                <div class="modal-body">
                    <div class="row gx-0">
                        <div class="col-lg-5 col-md-5 col-12">
                            <div class="modal-img-wrap">
                                <img src="assets/images/product/quickview.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-12">
                            <div class="product-details-content quickview-content">
                                <h2>New Modern Chair</h2>
                                <div class="product-details-price">
                                    <span class="old-price">$25.89 </span>
                                    <span class="new-price">$20.25</span>
                                </div>
                                <div class="product-details-review">
                                    <div class="product-rating">
                                        <i class=" ti-star"></i>
                                        <i class=" ti-star"></i>
                                        <i class=" ti-star"></i>
                                        <i class=" ti-star"></i>
                                        <i class=" ti-star"></i>
                                    </div>
                                    <span>( 1 Customer Review )</span>
                                </div>
                                <div class="product-color product-color-active product-details-color">
                                    <span>Color :</span>
                                    <ul>
                                        <li><a title="Pink" class="pink" href="#">pink</a></li>
                                        <li><a title="Yellow" class="active yellow" href="#">yellow</a></li>
                                        <li><a title="Purple" class="purple" href="#">purple</a></li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ornare tincidunt neque vel semper. Cras placerat enim sed nisl mattis eleifend.</p>
                                <div class="product-details-action-wrap">
                                    <div class="product-quality">
                                        <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                                    </div>
                                    <div class="single-product-cart btn-hover">
                                        <a href="#">Add to cart</a>
                                    </div>
                                    <div class="single-product-wishlist">
                                        <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                    </div>
                                    <div class="single-product-compare">
                                        <a title="Compare" href="#"><i class="pe-7s-shuffle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Modal end -->
    <!-- Mobile Menu start -->
    <div class="off-canvas-active">
        <a class="off-canvas-close"><i class=" ti-close "></i></a>
        <div class="off-canvas-wrap">
            <div class="welcome-text off-canvas-margin-padding">
                <p>Default Welcome Msg! </p>
            </div>
            <div class="mobile-menu-wrap off-canvas-margin-padding-2">
                <div id="mobile-menu" class="slinky-mobile-menu text-left">
                    <ul>
                        <li>
                            <a href="#">HOME</a>
                            <ul>
                                <li><a href="index.html">Home version 1 </a></li>
                                <li><a href="index-2.html">Home version 2</a></li>
                                <li><a href="index-3.html">Home version 3</a></li>
                                <li><a href="index-4.html">Home version 4</a></li>
                                <li><a href="index-5.html">Home version 5</a></li>
                                <li><a href="index-6.html">Home version 6</a></li>
                                <li><a href="index-7.html">Home version 7</a></li>
                                <li><a href="index-8.html">Home version 8</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">SHOP</a>
                            <ul>
                                <li>
                                    <a href="#">Shop Layout</a>
                                    <ul>
                                        <li><a href="shop.html">Standard Style</a></li>
                                        <li><a href="shop-sidebar.html">Shop Grid Sidebar</a></li>
                                        <li><a href="shop-list.html">Shop List Style</a></li>
                                        <li><a href="shop-list-sidebar.html">Shop List Sidebar</a></li>
                                        <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                        <li><a href="shop-location.html">Store Location</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Product Layout</a>
                                    <ul>
                                        <li><a href="product-details.html">Tab Style 1</a></li>
                                        <li><a href="product-details-2.html">Tab Style 2</a></li>
                                        <li><a href="product-details-gallery.html">Gallery style </a></li>
                                        <li><a href="product-details-affiliate.html">Affiliate style</a></li>
                                        <li><a href="product-details-group.html">Group Style</a></li>
                                        <li><a href="product-details-fixed-img.html">Fixed Image Style </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">PAGES </a>
                            <ul>
                                <li><a href="about-us.html">About Us </a></li>
                                <li><a href="cart.html">Cart Page</a></li>
                                <li><a href="checkout.html">Checkout </a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="wishlist.html">Wishlist </a></li>
                                <li><a href="compare.html">Compare </a></li>
                                <li><a href="contact-us.html">Contact us </a></li>
                                <li><a href="login-register.html">Login / Register </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">BLOG </a>
                            <ul>
                                <li><a href="blog.html">Blog Standard </a></li>
                                <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="about-us.html">ABOUT US</a>
                        </li>
                        <li>
                            <a href="contact-us.html">CONTACT US</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="language-currency-wrap language-currency-wrap-modify">
                <div class="currency-wrap border-style">
                    <a class="currency-active" href="#">$ Dollar (US) <i class=" ti-angle-down "></i></a>
                    <div class="currency-dropdown">
                        <ul>
                            <li><a href="#">Taka (BDT) </a></li>
                            <li><a href="#">Riyal (SAR) </a></li>
                            <li><a href="#">Rupee (INR) </a></li>
                        </ul>
                    </div>
                </div>
                <div class="language-wrap">
                    <a class="language-active" href="#"><img src="assets/images/icon-img/flag.png" alt=""> English <i class=" ti-angle-down "></i></a>
                    <div class="language-dropdown">
                        <ul>
                            <li><a href="#"><img src="assets/images/icon-img/flag.png" alt="">English </a></li>
                            <li><a href="#"><img src="assets/images/icon-img/spanish.png" alt="">Spanish</a></li>
                            <li><a href="#"><img src="assets/images/icon-img/arabic.png" alt="">Arabic </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
