<div>
    <div class="product-details-area pb-100 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">Главная / Магазин / {{$product->category->title}}</div>
                <div class="col-lg-6">
                    <div class="product-details-img-wrap product-details-vertical-wrap" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-details-small-img-wrap">
                            <div class="swiper-container product-details-small-img-slider-1 pd-small-img-style">
                                <div class="swiper-wrapper">
                                    @foreach($product->images as $image)
                                        <div class="swiper-slide">
                                            <div class="product-details-small-img">
                                                <img src="{{asset('storage/'.$image->image)}}" alt="{{$image->alt}}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pd-prev pd-nav-style"> <i class="ti-angle-up"></i></div>
                            <div class="pd-next pd-nav-style"> <i class="ti-angle-down"></i></div>
                        </div>
                        <div class="swiper-container product-details-big-img-slider-1 pd-big-img-style">
                            <div class="swiper-wrapper">
                                @foreach($product->images as $image)
                                    <div class="swiper-slide">
                                        <div class="easyzoom-style">
                                            <div class="easyzoom easyzoom--overlay">
                                                <a href="{{asset('storage/'.$image->image)}}">
                                                    <img src="{{asset('storage/'.$image->image)}}" alt="{{$image->alt}}">
                                                </a>
                                            </div>
                                            <a class="easyzoom-pop-up img-popup" href="{{asset('storage/'.$image->image)}}">
                                                <i class="pe-7s-search"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
                        <div class="d-flex">
                            <h2 class="font-cormorant fw-bold h1">{{$product->title}}</h2>
                            <div style="width: 20%" class="h4 d-flex align-items-center justify-content-around flex-column">
                                <div class="">
                                    <a title="Wishlist" href="wishlist.html"><i class="pe-7s-like"></i></a>
                                </div>
                                <div class="single-product-compare">
                                    <a title="Compare" href="#"><i class="pe-7s-shuffle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-details-review pt-4">
                            <div class="product-rating">
                                <i class=" ti-star"></i>
                                <i class=" ti-star"></i>
                                <i class=" ti-star"></i>
                                <i class=" ti-star"></i>
                                <i class=" ti-star"></i>
                            </div>
                            <span>8 отзывов</span>
                        </div>
                        <div class="product-details-meta">
                            <ul>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet animi consectetur esse est maxime modi placeat, quis reprehenderit velit!</li>
                                <li><span class="title">Tags:</span>
                                    <ul >
                                        @foreach($product->tags as $tag)
                                            <li ><a class="" href="#">{{$tag->title}}</a>,</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><span class="title">Categories</span>
                                    <ul class="tag ">
                                        <li><a class="" href="#">{{$product->category->title}}</a></li>
                                    </ul>
                                </li>
                                <li><span class="title">Доступность:</span>
                                    <ul class="tag">
                                        <li class="text-success">Есть в наличии</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="product-color product-color-active product-details-color">
                            <span>Color :</span>
                            <ul>
                                <li><a title="Pink" class="pink rounded-circle" href="#">pink</a></li>
                                <li><a title="Yellow" class="active yellow rounded-circle" href="#">yellow</a></li>
                                <li><a title="Purple" class="purple rounded-circle" href="#">purple</a></li>
                            </ul>
                        </div>
                        <div class="product-details-action-wrap font-kyiv">
                            <div class="product-count h4">
                                <button class="border-0 bg-transparent">-</button>
                                <span>1</span>
                                <button class="border-0 bg-transparent">+</button>
                            </div>
                            <div class="product-details-price p-3">
                                <span class="p-2 {{($product->discount_price == "") ? 'hidden' : 'new-price'}}">{{$product->discount_price}}  сум</span>
                                <span class="p-2 {{($product->discount_price == "") ? 'new-price' : 'old-price'}}">{{$product->price}} сум</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="single-product-cart btn-hover w-50 pe-1 text-center">
                                <a href="#" class="w-100 p-3 text-dark">Добавить в корзину</a>
                            </div>
                            <div class="single-product-cart btn-hover w-50 ps-1 text-center">
                                <a href="#" class="w-100 p-3 text-dark bg-light border border-1">Купить в один клик</a>
                            </div>
                        </div>
{{--                        <div class="social-icon-style-4">--}}
{{--                            <a href="#"><i class="fa fa-facebook"></i></a>--}}
{{--                            <a href="#"><i class="fa fa-dribbble"></i></a>--}}
{{--                            <a href="#"><i class="fa fa-pinterest-p"></i></a>--}}
{{--                            <a href="#"><i class="fa fa-twitter"></i></a>--}}
{{--                            <a href="#"><i class="fa fa-linkedin"></i></a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="description-review-area pb-85">--}}
{{--        <div class="container">--}}
{{--            <div class="description-review-topbar nav" data-aos="fade-up" data-aos-delay="200">--}}
{{--                <a class="active" data-bs-toggle="tab" href="#des-details1"> Description </a>--}}
{{--                <a data-bs-toggle="tab" href="#des-details2" class=""> Information </a>--}}
{{--                <a data-bs-toggle="tab" href="#des-details3" class=""> Reviews </a>--}}
{{--            </div>--}}
{{--            <div class="tab-content">--}}
{{--                <div id="des-details1" class="tab-pane active">--}}
{{--                    <div class="product-description-content text-center">--}}
{{--                        <p data-aos="fade-up" data-aos-delay="200">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>--}}
{{--                        <p data-aos="fade-up" data-aos-delay="400">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut per unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div id="des-details2" class="tab-pane">--}}
{{--                    <div class="specification-wrap table-responsive">--}}
{{--                        <table>--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td class="width1">Brands</td>--}}
{{--                                <td>Airi, Brand, Draven, Skudmart, Yena</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td class="width1">Color</td>--}}
{{--                                <td>Blue, Gray, Pink</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td class="width1">Size</td>--}}
{{--                                <td>L, M, S, XL, XXL</td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div id="des-details3" class="tab-pane">--}}
{{--                    <div class="review-wrapper">--}}
{{--                        <h3>1 review for Sleeve Button Cowl Neck</h3>--}}
{{--                        <div class="single-review">--}}
{{--                            <div class="review-img">--}}
{{--                                <img src="assets/images/product-details/review-1.png" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="review-content">--}}
{{--                                <div class="review-rating">--}}
{{--                                    <a href="#"><i class="ti-star"></i></a>--}}
{{--                                    <a href="#"><i class="ti-star"></i></a>--}}
{{--                                    <a href="#"><i class="ti-star"></i></a>--}}
{{--                                    <a href="#"><i class="ti-star"></i></a>--}}
{{--                                    <a href="#"><i class="ti-star"></i></a>--}}
{{--                                </div>--}}
{{--                                <h5><span>HasTech</span> - April 29, 2022</h5>--}}
{{--                                <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula lacus scelerisque</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="ratting-form-wrapper">--}}
{{--                        <h3>Add a Review</h3>--}}
{{--                        <p>Your email address will not be published. Required fields are marked <span>*</span></p>--}}
{{--                        <div class="your-rating-wrap">--}}
{{--                            <span>Your rating</span>--}}
{{--                            <div class="your-rating">--}}
{{--                                <a href="#"><i class="ti-star"></i></a>--}}
{{--                                <a href="#"><i class="ti-star"></i></a>--}}
{{--                                <a href="#"><i class="ti-star"></i></a>--}}
{{--                                <a href="#"><i class="ti-star"></i></a>--}}
{{--                                <a href="#"><i class="ti-star"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="ratting-form">--}}
{{--                            <form action="#">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6 col-md-6">--}}
{{--                                        <div class="rating-form-style mb-15">--}}
{{--                                            <label>Name <span>*</span></label>--}}
{{--                                            <input type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 col-md-6">--}}
{{--                                        <div class="rating-form-style mb-15">--}}
{{--                                            <label>Email <span>*</span></label>--}}
{{--                                            <input type="email">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="rating-form-style mb-15">--}}
{{--                                            <label>Your review <span>*</span></label>--}}
{{--                                            <textarea name="Your Review"></textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12">--}}
{{--                                        <div class="save-email-option">--}}
{{--                                            <p><input type="checkbox"> <label>Save my name, email, and website in this browser for the next time I comment.</label></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <div class="form-submit">--}}
{{--                                            <input type="submit" value="Submit">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="related-product-area pb-95">
        <div class="container">
            <div class="pt-3 mb-75 font-cormorant position-relative" data-aos="fade-up" data-aos-delay="200">
                <h2 class="shadow-text-1 font-cormorant fw-bold">В одном <br>стиле</h2>
                <h2 class="shadow-text-2 font-cormorant fw-bold">В одном <br>стиле</h2>
            </div>
            <div class="related-product-active swiper-container">
                <div class="swiper-wrapper">
                    @foreach($relatedProducts as $product)
                        <livewire:front.component.product-card :product="$product" :key="$product->id" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="related-product-area pb-95">
        <div class="container">
            <div class="pt-3 mb-75 font-cormorant position-relative" data-aos="fade-up" data-aos-delay="200">
                <h2 class="shadow-text-1 font-cormorant fw-bold">Покупают с<br>этим</h2>
                <h2 class="shadow-text-2 font-cormorant fw-bold">Покупают с<br>этим</h2>
            </div>
            <div class="related-product-active swiper-container">
                <div class="swiper-wrapper">
                    @foreach($additionalProducts as $product)
                        <livewire:front.component.product-card :product="$product" :key="$product->id" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
