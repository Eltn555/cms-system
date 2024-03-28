@extends('front.master')

@section('style')
    <style>
        .mainPage-navbar{
            background-color: rgba(0, 0, 0, 0.2) !important;
            color: #FFFFFF !important;
            transition: 1s;
        }
        .mainPage-navbar a {
            color: #FFFFFF !important;
        }
        .mega-menu-style li>a{
            color: #0b0b0b !important;
        }
        .infoNumber{
            border: 1px solid #E0E0E0;
            border-left: none;
            border-right: none;
        }
        .infoNumber > div{
            border-right: 1px solid #E0E0E0;
        }
        .infoNumber h5, span{
            color: #F8B301;
        }
        @media (max-width: 991px) {
            .infoNumber>div{
                border-right:none;
                border-bottom: 1px solid #E0E0E0;
            }
        }
    </style>
@endsection

@section('content')
    <script>
        var header = $('.blurry-backgorund');
        var $window = $(window);
        header.addClass('mainPage-navbar');
        $window.on('scroll', function() {
            var scroll = $window.scrollTop();
            if (scroll < 400) {
                header.addClass('mainPage-navbar');
            } else {
                header.removeClass('mainPage-navbar');
            }
        });
        let nextButton = document.getElementById('next');
        let prevButton = document.getElementById('prev');
        let carousel = document.querySelector('.carousel');
        let listHTML = document.querySelector('.carousel .list');
        let seeMoreButtons = document.querySelectorAll('.seeMore');
        let backButton = document.getElementById('back');

        nextButton.onclick = function(){
            showSlider('next');
        }
        prevButton.onclick = function(){
            showSlider('prev');
        }
        let unAcceppClick;
        const showSlider = (type) => {
            nextButton.style.pointerEvents = 'none';
            prevButton.style.pointerEvents = 'none';

            carousel.classList.remove('next', 'prev');
            let items = document.querySelectorAll('.carousel .list .item');
            if(type === 'next'){
                listHTML.appendChild(items[0]);
                carousel.classList.add('next');
            }else{
                listHTML.prepend(items[items.length - 1]);
                carousel.classList.add('prev');
            }
            clearTimeout(unAcceppClick);
            unAcceppClick = setTimeout(()=>{
                nextButton.style.pointerEvents = 'auto';
                prevButton.style.pointerEvents = 'auto';
            }, 500)
        }
        seeMoreButtons.forEach((button) => {
            button.onclick = function(){
                carousel.classList.remove('next', 'prev');
                carousel.classList.add('showDetail');
            }
        });
    </script>
    <div class="bg-carousel mt-5" style="background-image: url('{{asset('preview.png')}}')">
        <div class="carousel">
            <div class="list">
                @foreach($slider as $slide)
                    <div class="item">
                        <img src="{{asset('storage/'.$slide->image)}}" alt="{{$slide->title}}">
                        <div class="introduce">
                            <div class="topic d-flex pt-2">
                                <h5 style="font-size: 120px;" class="lh-1 fl text-white shadow-text-1 font-cormorant fw-bold me-4">{{$slide->title}}</h5>
                                <h5 class="lh-1 shadow-text-2 font-cormorant fw-bold">{{$slide->title}}</h5>
                            </div>
                            <div class="des font-kyiv fs-5" style="color: rgba(182, 182, 182, 1);">{{$slide->text}}</div>
                            <a href="{{$slide->btn_link}}" class="seeMore py-3 px-4 text-dark font-kyiv">{{$slide->btn_text}}</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="arrows">
                <button id="prev"><</button>
                <button id="next">></button>
            </div>
        </div>
    </div>
    <div class="slider-category-area">

{{--        @if($slider)--}}
{{--            <div class="slider-fixed-image slider-height-4 bg-img slider-bg-color-4"--}}
{{--                 style="background-image:url({{$slider->image == null  ? asset('no_photo.jpg') : asset('storage/'.$slider->image)}})">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="slider-content-4 pt-145 text-center">--}}
{{--                                <h5 data-aos="fade-up" data-aos-delay="50">{{ $slider->subtitle ?? '' }}</h5>--}}
{{--                                <h1 data-aos="fade-up" data-aos-delay="100">{{ $slider->title ?? '' }}</h1>--}}
{{--                                <div class="slider-btn btn-hover" data-aos="fade-up" data-aos-delay="0">--}}
{{--                                    <a href="{{ $slider->href ?? '' }}"--}}
{{--                                       class="btn btn-bg-white btn-text-black btn-border-radius btn-padding-inc hover-border-radius">--}}
{{--                                        Sotib olish <i class=" ti-arrow-right"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <div class="slider-fixed-image slider-height-4 bg-img slider-bg-color-4"--}}
{{--                 style="background-image:url('{{asset('slider.jpg')}}')">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="slider-content-4 pt-145 text-center">--}}
{{--                                <h5 data-aos="fade-up" data-aos-delay="50">Slider subtitle</h5>--}}
{{--                                <h1 data-aos="fade-up" data-aos-delay="100">Slider title</h1>--}}
{{--                                <div class="slider-btn btn-hover" data-aos="fade-up" data-aos-delay="0">--}}
{{--                                    <a class="btn btn-bg-white btn-text-black btn-border-radius btn-padding-inc hover-border-radius">--}}
{{--                                        Sotib olish <i class=" ti-arrow-right"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
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
                        <p class="font-kyiv fs-5" style="color: rgba(182, 182, 182, 1)">
                            Мы рассчитаем, сколько и каких светильников вам нужно, чтобы сделать ваш дом светлым.
                        </p>
                    </div>
                    <div class="p-5 pt-2">
                            <div class="single-product-cart btn-hover text-start">
                                <a href="#" class="p-2 ps-4 pe-4 text-dark font-kyiv">Рассчитать галогены</a>
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
            <div class="tab-content jump" data-aos="fade-up" data-aos-delay="100">
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row my-5 py-4 infoNumber">
                    <div class="col-lg-4 col-md-12 text-center px-3 py-0" data-aos="fade-up" data-aos-delay="50">
                        <div class="w-100 d-flex justify-content-center fw-bold font-kyiv mb-3">
                            <svg width="30" height="29" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.7 11.1L19.7 10.2C19.7 6.80589 19.7 5.10883 18.5836 4.05442C17.4671 3 15.6702 3 12.0765 3L11.1235 3C7.52976 3 5.73288 3 4.61644 4.05442C3.5 5.10883 3.5 6.80589 3.5 10.2L3.5 13.8C3.5 17.1941 3.5 18.8912 4.61644 19.9456C5.73288 21 7.52976 21 11.1235 21H11.6" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M8 7.5L15.2 7.5" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M8 12L15.2 12" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M15.5128 20.8702L15.3559 20.1368H15.3559L15.5128 20.8702ZM14.4297 19.7871L15.1631 19.9439L14.4297 19.7871ZM15.2184 17.5006L14.6881 16.9703L15.2184 17.5006ZM17.7993 20.0814L17.2689 19.5511L17.7993 20.0814ZM21.3164 15.1296L21.966 14.7546L21.3164 15.1296ZM20.7763 17.1044L21.3066 17.6347L20.7763 17.1044ZM21.3164 16.4983L21.966 16.8733L21.3164 16.4983ZM20.1702 13.9834L20.5452 13.3339V13.3339L20.1702 13.9834ZM18.1955 14.5235L18.7258 15.0539L18.1955 14.5235ZM18.8015 13.9834L18.4265 13.3339L18.4265 13.3339L18.8015 13.9834ZM20.246 16.5741L17.2689 19.5511L18.3296 20.6118L21.3066 17.6347L20.246 16.5741ZM15.7487 18.0309L18.7258 15.0539L17.6651 13.9932L14.6881 16.9703L15.7487 18.0309ZM15.3559 20.1368C15.1977 20.1706 15.0726 20.1973 14.9654 20.2172C14.8571 20.2374 14.7888 20.2463 14.7447 20.2492C14.699 20.2521 14.7112 20.2459 14.7528 20.2567C14.8069 20.2706 14.8768 20.3042 14.9362 20.3636L13.8756 21.4243C14.1896 21.7383 14.5806 21.7626 14.8399 21.7461C15.0857 21.7305 15.3834 21.6648 15.6696 21.6036L15.3559 20.1368ZM13.6962 19.6303C13.6351 19.9164 13.5694 20.2142 13.5537 20.46C13.5372 20.7193 13.5615 21.1102 13.8756 21.4243L14.9362 20.3636C14.9957 20.4231 15.0292 20.4929 15.0432 20.547C15.0539 20.5887 15.0478 20.6008 15.0507 20.5552C15.0535 20.511 15.0625 20.4427 15.0826 20.3344C15.1026 20.2272 15.1293 20.1021 15.1631 19.9439L13.6962 19.6303ZM20.246 15.0539C20.5801 15.388 20.6386 15.4556 20.6669 15.5046L21.966 14.7546C21.814 14.4915 21.5725 14.2591 21.3066 13.9932L20.246 15.0539ZM21.3066 17.6347C21.5725 17.3688 21.814 17.1364 21.966 16.8733L20.6669 16.1233C20.6386 16.1723 20.5801 16.2399 20.246 16.5741L21.3066 17.6347ZM20.6669 15.5046C20.7774 15.696 20.7774 15.9319 20.6669 16.1233L21.966 16.8733C22.3444 16.2178 22.3444 15.4101 21.966 14.7546L20.6669 15.5046ZM21.3066 13.9932C21.0408 13.7273 20.8084 13.4858 20.5452 13.3339L19.7952 14.6329C19.8442 14.6612 19.9118 14.7197 20.246 15.0539L21.3066 13.9932ZM18.7258 15.0539C19.06 14.7197 19.1276 14.6612 19.1765 14.6329L18.4265 13.3339C18.1634 13.4858 17.931 13.7273 17.6651 13.9932L18.7258 15.0539ZM20.5452 13.3339C19.8897 12.9554 19.0821 12.9554 18.4265 13.3339L19.1765 14.6329C19.368 14.5224 19.6038 14.5224 19.7952 14.6329L20.5452 13.3339ZM17.2689 19.5511C17.1064 19.7136 16.8807 19.8228 16.5452 19.9085C16.3771 19.9514 16.197 19.9848 15.9937 20.0199C15.7992 20.0535 15.5732 20.0903 15.3559 20.1368L15.6696 21.6036C15.8493 21.5652 16.0333 21.5353 16.2491 21.498C16.456 21.4623 16.6864 21.4206 16.9163 21.3619C17.3768 21.2443 17.8973 21.044 18.3296 20.6118L17.2689 19.5511ZM15.1631 19.9439C15.2095 19.7266 15.2463 19.5006 15.2799 19.3061C15.3151 19.1028 15.3484 18.9227 15.3914 18.7546C15.477 18.4191 15.5862 18.1934 15.7487 18.0309L14.6881 16.9703C14.2558 17.4025 14.0556 17.923 13.938 18.3836C13.8793 18.6135 13.8376 18.8439 13.8018 19.0508C13.7646 19.2665 13.7347 19.4505 13.6962 19.6303L15.1631 19.9439Z" fill="#F8B301"/>
                            </svg>
                        </div>
                        <p class="mb-0 fw-bolder">Быстрое проектирование</p>
                        <p class="px-5 text-muted">Высокое разрешение и красивый дизайн только для вас!</p>
                    </div>
                    <div class="col-lg-4 col-md-12 text-center pt-md-4 pt-lg-0 px-3 py-0" data-aos="fade-up" data-aos-delay="150">
                        <div class="w-100 d-flex justify-content-center fw-bold font-kyiv mb-3">
                            <svg width="30" height="29" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="17.5" cy="18" r="2" stroke="#F8B301" stroke-width="1.5"/>
                                <circle cx="7.5" cy="18" r="2" stroke="#F8B301" stroke-width="1.5"/>
                                <path d="M5.5 17.9724C4.40328 17.9178 3.7191 17.7546 3.23223 17.2678C2.74536 16.7809 2.58222 16.0967 2.52755 15M9.5 18H15.5M19.5 17.9724C20.5967 17.9178 21.2809 17.7546 21.7678 17.2678C22.5 16.5355 22.5 15.357 22.5 13V11H17.8C17.0555 11 16.6832 11 16.382 10.9021C15.7731 10.7043 15.2957 10.2269 15.0979 9.61803C15 9.31677 15 8.94451 15 8.2C15 7.08323 15 6.52485 14.8532 6.07295C14.5564 5.15964 13.8404 4.44358 12.9271 4.14683C12.4752 4 11.9168 4 10.8 4H2.5" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.5 8H8.5" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.5 11H6.5" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 6H16.8212C18.2766 6 19.0042 6 19.5964 6.35371C20.1886 6.70742 20.5336 7.34811 21.2236 8.6295L22.5 11" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>
                        <p class="mb-0 fw-bolder">Бесплатная доставка</p>
                        <p class="px-5 text-muted">Мы несем ответственность за бесплатную и надежную доставку.</p>
                    </div>
                    <div class="col-lg-4 col-md-12 text-center pt-md-4 pt-lg-0 px-3 py-0 border-0" data-aos="fade-up" data-aos-delay="250">
                        <div class="w-100 d-flex justify-content-center fw-bold font-kyiv mb-3">
                            <svg width="30" height="29" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.75874 15.3167C6.39456 14.6299 6.0845 14 5 14C3.9155 14 3.60544 14.6299 3.24126 15.3167C2.90259 15.9554 2.1151 16.9661 2.72461 17.6457C3.04234 18 3.69489 18 5 18C6.30511 18 6.95766 18 7.27539 17.6457C7.8849 16.9661 7.09741 15.9554 6.75874 15.3167Z" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.2587 18.3167C13.8946 17.6299 13.5845 17 12.5 17C11.4155 17 11.1054 17.6299 10.7413 18.3167C10.4026 18.9554 9.6151 19.9661 10.2246 20.6457C10.5423 21 11.1949 21 12.5 21C13.8051 21 14.4577 21 14.7754 20.6457C15.3849 19.9661 14.5974 18.9554 14.2587 18.3167Z" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21.7587 15.3167C21.3945 14.6299 21.0845 14 20 14C18.9155 14 18.6054 14.6299 18.2413 15.3167C17.9026 15.9554 17.1151 16.9661 17.7246 17.6457C18.0423 18 18.6949 18 20 18C21.3051 18 21.9577 18 22.2754 17.6457C22.8849 16.9661 22.0974 15.9554 21.7587 15.3167Z" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.5 3H15.5" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 3L12.5 17" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5 14V11.75C5 9.67893 6.67893 8 8.75 8C10.8211 8 12.5 9.67893 12.5 11.75C12.5 9.67893 14.1789 8 16.25 8C18.3211 8 20 9.67893 20 11.75V14" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <p class="mb-0 fw-bolder">Бесплатная установка</p>
                        <p class="px-5 text-muted">Гарантированная установка и многолетняя гарантия производительности!</p>
                    </div>
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

@section('scripts')

@endsection
