@extends('front.master')
@section('content')

    <div class="slider-category-area">
        @if($slider)
            <div class="slider-fixed-image slider-height-4 bg-img slider-bg-color-4"
                 style="background-image:url({{$slider->image == null  ? asset('no_photo.jpg') : asset('storage/'.$slider->image)}})">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content-4 pt-145 text-center">
                                <h5 data-aos="fade-up" data-aos-delay="50">{{ $slider->subtitle ?? '' }}</h5>
                                <h1 data-aos="fade-up" data-aos-delay="100">{{ $slider->title ?? '' }}</h1>
                                <div class="slider-btn btn-hover" data-aos="fade-up" data-aos-delay="0">
                                    <a href="{{ $slider->href ?? '' }}"
                                       class="btn btn-bg-white btn-text-black btn-border-radius btn-padding-inc hover-border-radius">
                                        Sotib olish <i class=" ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="slider-fixed-image slider-height-4 bg-img slider-bg-color-4"
                 style="background-image:url('{{asset('slider.jpg')}}')">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content-4 pt-145 text-center">
                                <h5 data-aos="fade-up" data-aos-delay="50">Slider subtitle</h5>
                                <h1 data-aos="fade-up" data-aos-delay="100">Slider title</h1>
                                <div class="slider-btn btn-hover" data-aos="fade-up" data-aos-delay="0">
                                    <a class="btn btn-bg-white btn-text-black btn-border-radius btn-padding-inc hover-border-radius">
                                        Sotib olish <i class=" ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

        <div class="category-area py-5">
            <div class="container">
                <div class="category-slider-active-2 swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($categories as $category)
                            <div class="swiper-slide border p-1 me-0 d-flex justify-content-center align-items-end">
                                <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="50">
                                    <div class="category-img-2 overflow-hidden">
                                        <a href="{{ route('front.category.show', $category->slug) }}">
                                            @foreach($category->images as $image)
                                                {!!strpos($image->alt, 'icon') !== false ? '<img class="category-normal-img" src="'.asset('storage/'.$image->image).'" alt="'.$image->alt.'" style="width: 80%;"><img class="category-hover-img" src="'.asset('storage/'.$image->image).'" alt="'.$image->alt.'" style="width: 100%;>' : ''!!}
                                            @endforeach
                                        </a>
                                    </div>
                                    <div class="category-content-2">
                                        <h4 class="w-100 mb-3"><a class="fs-6 text-dark" href="{{ route('front.category.show', $category->slug) }}">{{ $category->title }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    <div class="new-categories pb-95 mt-4">
        <div class="container">
            <div class="pt-3 mb-20 font-cormorant position-relative row" data-aos="fade-up" data-aos-delay="50">
                <div class="col-6">
                    <h5 class="shadow-text-1 font-cormorant fw-bold">Новое<br>поступление</h5>
                    <h5 class="shadow-text-2 font-cormorant fw-bold">Новое<br>поступление</h5>
                </div>
                <div class="col-6 justify-content-end align-items-end d-flex">
                    <div class="single-product-cart btn-hover ps-1 text-end">
                        <a href="#" class="p-2 ps-4 pe-4 text-dark bg-light border border-1 font-kyiv">Посетить в магазин</a>
                    </div>
                </div>
            </div>

            <div class="row justify-content-around">
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 order-lg-0 order-md-1 order-sm-1 col-12 big-banner">
                    <div class="overflow-hidden h-100 img-banner" data-aos="fade-up" data-aos-delay="50">
                        <a href="product-details.html" class="h-100 position-relative">
                            <img src="{{ asset('storage/' . $banners[0]->image) }}" alt="{{ $banners[0]->title }}" class="h-100"></a>
                        <div class="btn-style-6 btn-style-6-position btn-hover d-block">
                            <p class="card-brand mb-1 fw-semibold">{{$banners[0]->tag->products->count()}} вида товаров</p>
                            <h5 class="fw-bolder font-kyiv">{{ $banners[0]->title }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 row p-0">
                    @foreach($banners as $banner)
                        @if($loop->index > 0)
                        <div class="overflow-hidden col-xl-4 col-lg-6 col-md-6 col-sm-12 order-lg-1 order-md-0 order-sm-0 col-12 small-banner">
                            <div class="overflow-hidden w-100 img-banner" data-aos="fade-up" data-aos-delay="50">
                                <a href="product-details.html" class="w-100 position-relative">
                                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{$banner->title}}" class="w-100"></a>
                                <div class="btn-style-6 btn-style-6-position btn-hover d-block">
                                    <p class="card-brand mb-1 fw-semibold">{{$banner->tag->products->count()}} вида товаров</p>
                                    <h5 class="fw-bolder font-kyiv">{{$banner->title}}</h5>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>
{{--    <div class="product-area pb-60">--}}
{{--        <div class="container">--}}
{{--            <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">--}}
{{--                <h2>Hot Products</h2>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-6 col-lg-6">--}}
{{--                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="200">--}}
{{--                        <a href="shop.html"><img src="assets/images/banner/banner-23.png" alt=""></a>--}}
{{--                        <div class="banner-content-10-position top-inc">--}}
{{--                            <div class="banner-content-10 banner-content-10-responsive">--}}
{{--                                <h3>Exceptional</h3>--}}
{{--                                <h4>Officr Chair</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="banner-btn-1">--}}
{{--                            <a href="#">21 Products</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-6 col-lg-6">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">--}}
{{--                                <div class="product-img img-zoom mb-25">--}}
{{--                                    <a href="product-details.html">--}}
{{--                                        <img src="assets/images/product/product-7.png" alt="">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-wrap">--}}
{{--                                        <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i>--}}
{{--                                        </button>--}}
{{--                                        <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal"--}}
{{--                                                data-bs-target="#exampleModal">--}}
{{--                                            <i class="pe-7s-look"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-action-2-wrap">--}}
{{--                                        <button class="product-action-btn-2" title="Add To Cart"><i--}}
{{--                                                class="pe-7s-cart"></i> Add to cart--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <h3><a href="product-details.html">Round Standard Chair</a></h3>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <span>$30.25 </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="400">--}}
{{--                                <div class="product-img img-zoom mb-25">--}}
{{--                                    <a href="product-details.html">--}}
{{--                                        <img src="assets/images/product/product-5.png" alt="">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-badge badge-top badge-right badge-pink">--}}
{{--                                        <span>-10%</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-action-wrap">--}}
{{--                                        <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i>--}}
{{--                                        </button>--}}
{{--                                        <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal"--}}
{{--                                                data-bs-target="#exampleModal">--}}
{{--                                            <i class="pe-7s-look"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-action-2-wrap">--}}
{{--                                        <button class="product-action-btn-2" title="Add To Cart"><i--}}
{{--                                                class="pe-7s-cart"></i> Add to cart--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <h3><a href="product-details.html">Interior moderno render</a></h3>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <span class="old-price">$25.89 </span>--}}
{{--                                        <span class="new-price">$20.25 </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="600">--}}
{{--                                <div class="product-img img-zoom mb-25">--}}
{{--                                    <a href="product-details.html">--}}
{{--                                        <img src="assets/images/product/product-3.png" alt="">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-badge badge-top badge-right badge-pink">--}}
{{--                                        <span>-10%</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-action-wrap">--}}
{{--                                        <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i>--}}
{{--                                        </button>--}}
{{--                                        <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal"--}}
{{--                                                data-bs-target="#exampleModal">--}}
{{--                                            <i class="pe-7s-look"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-action-2-wrap">--}}
{{--                                        <button class="product-action-btn-2" title="Add To Cart"><i--}}
{{--                                                class="pe-7s-cart"></i> Add to cart--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <h3><a href="product-details.html">Easy Modern Chair</a></h3>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <span class="old-price">$45.00 </span>--}}
{{--                                        <span class="new-price">$40.00 </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="800">--}}
{{--                                <div class="product-img img-zoom mb-25">--}}
{{--                                    <a href="product-details.html">--}}
{{--                                        <img src="assets/images/product/product-9.png" alt="">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-wrap">--}}
{{--                                        <button class="product-action-btn-1" title="Wishlist"><i class="pe-7s-like"></i>--}}
{{--                                        </button>--}}
{{--                                        <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal"--}}
{{--                                                data-bs-target="#exampleModal">--}}
{{--                                            <i class="pe-7s-look"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-action-2-wrap">--}}
{{--                                        <button class="product-action-btn-2" title="Add To Cart"><i--}}
{{--                                                class="pe-7s-cart"></i> Add to cart--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <h3><a href="product-details.html">Modern Lounge Chairs</a></h3>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <span>$30.25 </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="calculator-area pb-70">
        <div class="container bg-dark">
            <div class="row">
                <div class="col-lg-5 col-md-12">

                </div>
                <div class="col-lg-7 col-md-12 p-5 pe-1">
                    <div class="mt-4 pt-1 position-relative">
                        <div class="ms-5 d-flex">
                            <h5  class="text-white shadow-text-1 font-cormorant fw-bold">Онлайн<br>калькулятор</h5>
                            <h5  class=" shadow-text-2 font-cormorant fw-bold">Онлайн<br>калькулятор</h5>
                        </div>
                    </div>
                    <div class="p-5 pt-2 pb-0">
                        <p class="font-kyiv fs-5 text-white">
                            Мы рассчитаем, сколько и каких светильников вам нужно, чтобы сделать ваш дом светлым.
                        </p>
                    </div>
                    <div class="p-5 pt-2">
                            <div class="single-product-cart btn-hover text-start">
                                <a href="#" class="p-2 ps-4 pe-4 text-dark border border-1 font-kyiv">Посмотреть все блоги</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-area pb-95 mt-4">
        <div class="container">
            <div class="pt-3 mb-20 font-cormorant position-relative row" data-aos="fade-up" data-aos-delay="50">
                <div class="col-6">
                    <h5 class="shadow-text-1 font-cormorant fw-bold">Трендовые<br>товары</h5>
                    <h5 class="shadow-text-2 font-cormorant fw-bold">Трендовые<br>товары</h5>
                </div>
                <div class="col-6 justify-content-end align-items-end d-flex">
                    <div class="single-product-cart btn-hover ps-1 text-end">
                        <a href="#" class="p-2 ps-4 pe-4 text-dark bg-light border border-1 font-kyiv">Посетить в магазин</a>
                    </div>
                </div>
            </div>

            {{--            <div class="tab-style-1 tab-style-1-modify tab-center nav" data-aos="fade-up" data-aos-delay="200">--}}
            {{--                <a id="tag-1" href="#pro-1" data-bs-toggle="tab">Hot Products </a>--}}
            {{--                <a id="tag-2" class="active" href="#pro-2" data-bs-toggle="tab">New Arrivals </a>--}}
            {{--                <a id="tag-3" href="#pro-3" data-bs-toggle="tab" class=""> Best Sellers </a>--}}
            {{--                <a id="tag-4" href="#pro-4" data-bs-toggle="tab" class=""> Sale Items </a>--}}
            {{--            </div>--}}
            <div class="tab-content jump">
                @foreach($tagsIndex as $index => $tag)
                    <div id="pro-{{ $index + 1 }}" class="tab-pane {{ $index == 0 ? 'active' : '' }}">
                        <div class="product-slider-active-2 swiper-container">
                            <div class="swiper-wrapper">
                                @if(!$tag->products == null)
                                    @foreach($tag->products as $product)
                                        <div class="swiper-slide sw-sl align-self-stretch">
                                            <livewire:front.component.product-card :product="$product" :key="$product->id" />
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

{{--    <div class="banner-area padding-22-row-col pb-70">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-8">--}}
{{--                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="50">--}}
{{--                        <a href="product-details.html"><img src="assets/images/banner/banner-24.png" alt=""></a>--}}
{{--                        <div class="banner-content-12">--}}
{{--                            <h2>Exceptional Furniture Set</h2>--}}
{{--                            <div class="btn-style-7">--}}
{{--                                <a href="product-details.html">Shop Now</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="100">--}}
{{--                        <a href="product-details.html"><img src="assets/images/banner/banner-25.png" alt=""></a>--}}
{{--                        <div class="banner-content-12 banner-content-12-width">--}}
{{--                            <h2>Modern Sofa</h2>--}}
{{--                            <div class="btn-style-7">--}}
{{--                                <a href="product-details.html">Shop Now</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="brand-logo-area pb-95">
        <div class="container">
            <div class="brand-logo-active swiper-container">
                <div class="swiper-wrapper">

                    @foreach($partners as $key =>$partner)
                        <div class="swiper-slide">
                            <div class="single-brand-logo" data-aos="fade-up" data-aos-delay="50">
                                <a href="#"><img src="{{ asset('storage/' . $partner->image) }}" alt=""></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="form-area pb-70">
        <div class="container bg-light">
            <div class="row">
                <div class="col-lg-7 col-md-12 p-5 pe-1">
                    <div class="pt-5 ps-5">
                        <div class="d-flex position-relative">
                            <h5  class="shadow-text-1 font-cormorant fw-bold">Не можете найти нужную люстру?</h5>
                            <h5  class="shadow-text-2 font-cormorant fw-bold">Не можете найти нужную люстру?</h5>
                        </div>
                    </div>
                    <div class="p-5 pt-2">
                        <p class="font-kyiv fs-5">
                            Загрузите изображение понравившейся люстры и введите свои данные и мы обязательно с вами свяжемся.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">

                </div>
            </div>
        </div>
    </div>
    <div class="blog-area pb-70">
        <div class="container">
            <div class="pt-3 mb-20 font-cormorant position-relative row" data-aos="fade-up" data-aos-delay="50">
                <div class="col-6">
                    <h5 class="shadow-text-1 font-cormorant fw-bold">Наш блог</h5>
                    <h5 class="shadow-text-2 font-cormorant fw-bold">Наш блог</h5>
                </div>
                <div class="col-6 justify-content-end align-items-end d-flex">
                    <div class="single-product-cart btn-hover ps-1 text-end">
                        <a href="#" class="p-2 ps-4 pe-4 text-dark bg-light border border-1 font-kyiv">Посмотреть все блоги</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 px-2">
                    <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="50">
                        <div class="blog-img-date-wrap mb-25">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="{{asset('/storage/blog/1.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul class="card-brand fw-bold font-kyiv">
                                    15.01.2024
                                </ul>
                            </div>
                            <h3 class="font-kyiv fs-5 fw-bold"><a href="blog-details.html">Люстра Rivoli Adora 5041-306</a></h3>
                            <p class="blog-text">Название этой серии переводится с итальянского как "обожаемая". В ней собрано все, что так любимо в светильниках - благородный оттенок золота, традиционны...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 px-2">
                    <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="50">
                        <div class="blog-img-date-wrap mb-25">
                            <div class="blog-img">
                                <a href="blog-details.html" class="h-100"><img src="{{asset('/storage/blog/2.png')}}" alt="" class="h-100"></a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul class="card-brand fw-bold font-kyiv">
                                    12.01.2024
                                </ul>
                            </div>
                            <h3 class="font-kyiv fs-5 fw-bold"><a href="blog-details.html">Люстры в Ташкенте. Цена, где купить?</a></h3>
                            <p class="blog-text">Фабричное и собственное производство по эскизам гарантия все товары сертифицированы и имеют гарантию качес...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 px-2">
                    <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="50">
                        <div class="blog-img-date-wrap mb-25">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="{{asset('/storage/blog/3.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul class="card-brand fw-bold font-kyiv">
                                    04.01.2024
                                </ul>
                            </div>
                            <h3 class="font-kyiv fs-5 fw-bold"><a href="blog-details.html">Отличная гармония для праздничных огней</a></h3>
                            <p class="blog-text">Короткая, недостойная близость не принесла в ее жизнь ни света, ни облегчения. Это запятнало и унизило ее, разрушило ее целос...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 px-2">
                    <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="50">
                        <div class="blog-img-date-wrap mb-25">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="{{asset('/storage/blog/4.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul class="card-brand fw-bold font-kyiv">
                                    01.01.2024
                                </ul>
                            </div>
                            <h3 class="font-kyiv fs-5 fw-bold"><a href="blog-details.html">Отличная гармония для праздничных огней</a></h3>
                            <p class="blog-text">Короткая, недостойная близость не принесла в ее жизнь ни света, ни облегчения. Это запятнало и унизило ее, разрушило ее целос...</p>
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ornare tincidunt
                                    neque vel semper. Cras placerat enim sed nisl mattis eleifend.</p>
                                <div class="product-details-action-wrap">
                                    <div class="product-quality">
                                        <input class="cart-plus-minus-box input-text qty text" name="qtybutton"
                                               value="1">
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
                    <a class="language-active" href="#"><img src="assets/images/icon-img/flag.png" alt=""> English <i
                            class=" ti-angle-down "></i></a>
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
