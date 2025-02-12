@section('title', $product->title)
@section('description', $product->title." - ".$description."Бра, люстрыб споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет")
@section('keyword', $product->title.", ".$description." Бра, люстрыб споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет")
@section('image', isset($product->images[0]) ? asset('storage/'.$product->images[0]->image) : '')
@section('style')
    <style>
        .flash-message{
            top: 100px;
            right: 10px;
            opacity: 1;
            transition: 0.2s;
            position: fixed !important;
            z-index: 999;
        }
        .hiddenmsg{
            right: -500px;
            opacity: 0;
            transition: 1s;
            position: fixed;
        }
        @media only screen and (max-width: 767px) {
            .md-100{
                width: 100% !important;
                padding: 0 !important;
            }
            .md-100 .addCart, .payment{
                width: 100% !important;
                margin-bottom: 10px;
            }

            .btn-parent{
                flex-direction: column;
            }
            .priceBuy{
                width: 100%;
                position: fixed;
                bottom: 0;
                z-index: 9998;
                background-color: white;
                left: 0;
                right: 0;
                padding: 20px;
            }
            .icon-input {
                top: 0;
                right: 0;
                padding: 12px 15px;
            }
            footer{
                padding-bottom: 105px;
            }
            #scrollUp{
                bottom: 160px;
            }
        }
        /*@media screen and (max-width: 2000px) and (min-width: 1200px) {*/
        /*    .product-wrap .product-img {*/
        /*        height: 310px;*/
        /*    }*/
        /*}*/

        @media screen and (max-width: 1350px) and (min-width: 992px) {
            .btn-parent {
                flex-direction: column;
            }

            .btn-parent>div{
                width: 100% !important;
                padding: 0 !important;
                margin-bottom: 10px;
            }
        }

        /*@media only screen and (max-width: 991px) {*/
        /*    .product-wrap .product-img {*/
        /*        height: 235px;*/
        /*    }*/
        /*}*/
        /*@media only screen and (max-width: 767px) {*/
        /*    .product-wrap .product-img {*/
        /*        height: 265px;*/
        /*    }*/
        /*}*/
        /*@media only screen and (max-width: 576px) {*/
        /*    .product-wrap .product-img {*/
        /*        height: 510px;*/
        /*    }*/
        /*}*/
        /*@media only screen and (max-width: 500px) {*/
        /*    .product-wrap .product-img {*/
        /*        height: 430px;*/
        /*    }*/
        /*    .addCart{*/
        /*        width: 70% !important;*/
        /*    }*/
        /*    .product-details-price span{*/
        /*        font-size: 16px !important;*/
        /*    }*/
        /*}*/
        /*@media only screen and (max-width: 400px) {*/
        /*    .product-wrap .product-img {*/
        /*        height: 430px;*/
        /*    }*/
        /*    .addCart{*/
        /*        width: 85% !important;*/
        /*    }*/
        /*}*/
        .disp{
            display: flex;
        }
        .info-delivery{
            background-color: #f4f4f4;
            height: fit-content;
        }
        .hdln{
            font-weight: 600;
            color: #232323;
            font-size: 14px;
        }
        .prgrph{
            font-weight: 400;
            color: #777777;
            line-height: 16px;
            font-size: 12px;
        }
        .yel{
            color: #F8B301;
        }
        .payInfo div p{
            font-size: 14px;
            margin-bottom: 10px;
        }
        .hdln img{
            width: 45px;
        }
        .new-price-card{
            font-size: 24px;
            font-weight: 700!important;
        }
        .old-price-card{
            font-size: 16px;
        }
        .your-rating svg{
            cursor: pointer;
        }
        .review-box > .col-12 .bord{
            border: solid 0.5px #E0E0E0;
        }
        .review-box hr{
            color: rgba(180, 180, 180);
        }
        .product-details-vertical-wrap .product-details-small-img-wrap {
            position: relative;
            height: 150px;
            margin-top: 15px;
            width: 90%;
        }
        .product-details-vertical-wrap .product-details-small-img-wrap .product-details-small-img-slider-1 {
            width: 90%;
        }
        .pd-small-img-style .product-details-small-img img{
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .pd-nav-style {
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            left: -20px;
            z-index: 5;
        }
        .pd-nav-style.pd-next {
            top: 50%;
            left: auto;
            right: -20px;
            bottom: auto;
        }
        @media only screen and (max-width: 767px) {
            .product-details-vertical-wrap .product-details-small-img-wrap .product-details-small-img-slider-1 {
                height: 100px;
            }
        }
    </style>
@endsection

<div>
    <div class="hiddenmsg bg-success flash-message position-absolute text-white px-4 py-2 rounded shadow fs-4">
        Заказ получен, мы вам перезвоним в ближайшее время.
    </div>
    <div class="product-details-area pb-100 pt-100">
        <div class="container px-xl-5 px-lg-1 px-md-0" style="max-width: 100% !important;">
            <div class="row mx-0 px-xl-5 px-lg-1 px-md-0">
                <div class="col-12 d-md-block d-none mb-5"><a href="/">Главная</a> /
                    <a class="" href="{{ route('front.category.index') }}">Каталог</a> /
                    <a class="" href="{{ route('front.category.show', $product->categories[0]->slug) }}">{{$product->categories[0]->title}}</a>
                </div>
                <div class="col-12 d-md-none mb-5 d-flex">
                    <a onclick="goBack()">
                        <div class="">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20" cy="20" r="20" fill="#F4F4F4"/>
                                <path d="M25.3333 20H14.6666M14.6666 20L18.6666 16M14.6666 20L18.6666 24" stroke="#232323" stroke-width="0.895828" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </a>
                    <a href="/" class="font-kyiv p-2 ms-3 fs-5">Магазин</a>
                </div>
                <div class="col-lg-5 px-0">
                    <div class="product-details-img-wrap flex-column-reverse product-details-vertical-wrap w-100" data-aos="fade-up" data-aos-delay="0">
                        <div class="product-details-small-img-wrap my-auto mt-2 me-0">
                            <div class="swiper-container product-details-small-img-slider-1 pd-small-img-style w-100 h-100">
                                <div class="swiper-wrapper flex-row">
                                    @foreach($product->images as $image)
                                        <div class="swiper-slide">
                                            <div class="product-details-small-img w-100 h-100">
                                                <img class="mx-auto" src="{{asset('storage/'.$image->image)}}" alt="{{$image->alt}}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pd-prev pd-nav-style"> <i class="ti-angle-left"></i></div>
                            <div class="pd-next pd-nav-style"> <i class="ti-angle-right"></i></div>
                        </div>
                        <div class="swiper-container product-details-big-img-slider-1 pd-big-img-style w-100">
                            <div class="swiper-wrapper">
                                @foreach($product->images as $image)
                                    <div class="swiper-slide px-0" style="padding-left: 0 !important; padding-right: 0 !important;">
                                        <div class="">
                                            <div class="">
                                                <a class="img-popup" href="{{asset('storage/'.$image->image)}}">
                                                    <img class="w-100" src="{{asset('storage/'.$image->image)}}" alt="{{$image->alt}}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pe-1">
                    <div class="product-details-content" data-aos="fade-left" data-aos-delay="0">
                        <div class="d-flex">
                            <h1 class="font-cormorant fw-bold h1 image{{$product->id}}">{{$product->title}}</h1>
                            <div style="width: 20%" class="h4 d-flex align-items-center justify-content-around flex-column">
                                <div class="">
                                    @livewire('front.wishlist.wishlist-button', ['product' => $product], key($product->id))
                                </div>
                                <div class="single-product-compare">
{{--                                    <a title="Compare" href="#"><i class="pe-7s-shuffle"></i></a>--}}
                                </div>
                            </div>
                        </div>
                        <div class="product-details-review">
                            <div class="product-rating">
                                <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.86487 5.05628C8.81486 3.35209 9.28985 2.5 10 2.5C10.7101 2.5 11.1851 3.35209 12.1351 5.05628L12.3809 5.49717C12.6509 5.98145 12.7858 6.22359 12.9963 6.38336C13.2068 6.54312 13.4689 6.60243 13.9931 6.72104L14.4703 6.82902C16.3151 7.24642 17.2375 7.45511 17.4569 8.1608C17.6764 8.86648 17.0476 9.6018 15.7899 11.0724L15.4646 11.4529C15.1072 11.8708 14.9285 12.0798 14.8481 12.3383C14.7677 12.5968 14.7947 12.8756 14.8488 13.4332L14.898 13.9408C15.0881 15.9029 15.1832 16.884 14.6086 17.3202C14.0341 17.7563 13.1705 17.3587 11.4432 16.5634L10.9964 16.3576C10.5056 16.1316 10.2601 16.0186 10 16.0186C9.73986 16.0186 9.49444 16.1316 9.00362 16.3576L8.55676 16.5634C6.82951 17.3587 5.96588 17.7563 5.39136 17.3202C4.81684 16.884 4.91191 15.903 5.10205 13.9408L5.15124 13.4332C5.20527 12.8756 5.23229 12.5968 5.1519 12.3383C5.07151 12.0798 4.89282 11.8708 4.53544 11.4529L4.21007 11.0724C2.95244 9.6018 2.32362 8.86648 2.54307 8.1608C2.76251 7.45511 3.68489 7.24642 5.52965 6.82902L6.00692 6.72104C6.53114 6.60243 6.79325 6.54312 7.00371 6.38336C7.21417 6.22359 7.34914 5.98145 7.6191 5.49718L7.86487 5.05628Z" fill="{{$rate >= 1 ? '#F8B301' : '#E0E0E0'}}"/></svg>
                                <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.86487 5.05628C8.81486 3.35209 9.28985 2.5 10 2.5C10.7101 2.5 11.1851 3.35209 12.1351 5.05628L12.3809 5.49717C12.6509 5.98145 12.7858 6.22359 12.9963 6.38336C13.2068 6.54312 13.4689 6.60243 13.9931 6.72104L14.4703 6.82902C16.3151 7.24642 17.2375 7.45511 17.4569 8.1608C17.6764 8.86648 17.0476 9.6018 15.7899 11.0724L15.4646 11.4529C15.1072 11.8708 14.9285 12.0798 14.8481 12.3383C14.7677 12.5968 14.7947 12.8756 14.8488 13.4332L14.898 13.9408C15.0881 15.9029 15.1832 16.884 14.6086 17.3202C14.0341 17.7563 13.1705 17.3587 11.4432 16.5634L10.9964 16.3576C10.5056 16.1316 10.2601 16.0186 10 16.0186C9.73986 16.0186 9.49444 16.1316 9.00362 16.3576L8.55676 16.5634C6.82951 17.3587 5.96588 17.7563 5.39136 17.3202C4.81684 16.884 4.91191 15.903 5.10205 13.9408L5.15124 13.4332C5.20527 12.8756 5.23229 12.5968 5.1519 12.3383C5.07151 12.0798 4.89282 11.8708 4.53544 11.4529L4.21007 11.0724C2.95244 9.6018 2.32362 8.86648 2.54307 8.1608C2.76251 7.45511 3.68489 7.24642 5.52965 6.82902L6.00692 6.72104C6.53114 6.60243 6.79325 6.54312 7.00371 6.38336C7.21417 6.22359 7.34914 5.98145 7.6191 5.49718L7.86487 5.05628Z" fill="{{$rate >= 2 ? '#F8B301' : '#E0E0E0'}}"/></svg>
                                <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.86487 5.05628C8.81486 3.35209 9.28985 2.5 10 2.5C10.7101 2.5 11.1851 3.35209 12.1351 5.05628L12.3809 5.49717C12.6509 5.98145 12.7858 6.22359 12.9963 6.38336C13.2068 6.54312 13.4689 6.60243 13.9931 6.72104L14.4703 6.82902C16.3151 7.24642 17.2375 7.45511 17.4569 8.1608C17.6764 8.86648 17.0476 9.6018 15.7899 11.0724L15.4646 11.4529C15.1072 11.8708 14.9285 12.0798 14.8481 12.3383C14.7677 12.5968 14.7947 12.8756 14.8488 13.4332L14.898 13.9408C15.0881 15.9029 15.1832 16.884 14.6086 17.3202C14.0341 17.7563 13.1705 17.3587 11.4432 16.5634L10.9964 16.3576C10.5056 16.1316 10.2601 16.0186 10 16.0186C9.73986 16.0186 9.49444 16.1316 9.00362 16.3576L8.55676 16.5634C6.82951 17.3587 5.96588 17.7563 5.39136 17.3202C4.81684 16.884 4.91191 15.903 5.10205 13.9408L5.15124 13.4332C5.20527 12.8756 5.23229 12.5968 5.1519 12.3383C5.07151 12.0798 4.89282 11.8708 4.53544 11.4529L4.21007 11.0724C2.95244 9.6018 2.32362 8.86648 2.54307 8.1608C2.76251 7.45511 3.68489 7.24642 5.52965 6.82902L6.00692 6.72104C6.53114 6.60243 6.79325 6.54312 7.00371 6.38336C7.21417 6.22359 7.34914 5.98145 7.6191 5.49718L7.86487 5.05628Z" fill="{{$rate >= 3 ? '#F8B301' : '#E0E0E0'}}"/></svg>
                                <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.86487 5.05628C8.81486 3.35209 9.28985 2.5 10 2.5C10.7101 2.5 11.1851 3.35209 12.1351 5.05628L12.3809 5.49717C12.6509 5.98145 12.7858 6.22359 12.9963 6.38336C13.2068 6.54312 13.4689 6.60243 13.9931 6.72104L14.4703 6.82902C16.3151 7.24642 17.2375 7.45511 17.4569 8.1608C17.6764 8.86648 17.0476 9.6018 15.7899 11.0724L15.4646 11.4529C15.1072 11.8708 14.9285 12.0798 14.8481 12.3383C14.7677 12.5968 14.7947 12.8756 14.8488 13.4332L14.898 13.9408C15.0881 15.9029 15.1832 16.884 14.6086 17.3202C14.0341 17.7563 13.1705 17.3587 11.4432 16.5634L10.9964 16.3576C10.5056 16.1316 10.2601 16.0186 10 16.0186C9.73986 16.0186 9.49444 16.1316 9.00362 16.3576L8.55676 16.5634C6.82951 17.3587 5.96588 17.7563 5.39136 17.3202C4.81684 16.884 4.91191 15.903 5.10205 13.9408L5.15124 13.4332C5.20527 12.8756 5.23229 12.5968 5.1519 12.3383C5.07151 12.0798 4.89282 11.8708 4.53544 11.4529L4.21007 11.0724C2.95244 9.6018 2.32362 8.86648 2.54307 8.1608C2.76251 7.45511 3.68489 7.24642 5.52965 6.82902L6.00692 6.72104C6.53114 6.60243 6.79325 6.54312 7.00371 6.38336C7.21417 6.22359 7.34914 5.98145 7.6191 5.49718L7.86487 5.05628Z" fill="{{$rate >= 4 ? '#F8B301' : '#E0E0E0'}}"/></svg>
                                <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.86487 5.05628C8.81486 3.35209 9.28985 2.5 10 2.5C10.7101 2.5 11.1851 3.35209 12.1351 5.05628L12.3809 5.49717C12.6509 5.98145 12.7858 6.22359 12.9963 6.38336C13.2068 6.54312 13.4689 6.60243 13.9931 6.72104L14.4703 6.82902C16.3151 7.24642 17.2375 7.45511 17.4569 8.1608C17.6764 8.86648 17.0476 9.6018 15.7899 11.0724L15.4646 11.4529C15.1072 11.8708 14.9285 12.0798 14.8481 12.3383C14.7677 12.5968 14.7947 12.8756 14.8488 13.4332L14.898 13.9408C15.0881 15.9029 15.1832 16.884 14.6086 17.3202C14.0341 17.7563 13.1705 17.3587 11.4432 16.5634L10.9964 16.3576C10.5056 16.1316 10.2601 16.0186 10 16.0186C9.73986 16.0186 9.49444 16.1316 9.00362 16.3576L8.55676 16.5634C6.82951 17.3587 5.96588 17.7563 5.39136 17.3202C4.81684 16.884 4.91191 15.903 5.10205 13.9408L5.15124 13.4332C5.20527 12.8756 5.23229 12.5968 5.1519 12.3383C5.07151 12.0798 4.89282 11.8708 4.53544 11.4529L4.21007 11.0724C2.95244 9.6018 2.32362 8.86648 2.54307 8.1608C2.76251 7.45511 3.68489 7.24642 5.52965 6.82902L6.00692 6.72104C6.53114 6.60243 6.79325 6.54312 7.00371 6.38336C7.21417 6.22359 7.34914 5.98145 7.6191 5.49718L7.86487 5.05628Z" fill="{{$rate >= 5 ? '#F8B301' : '#E0E0E0'}}"/></svg>
                            </div>
                            <h5 class="fs-6 mb-0 ms-2 fw-bold">{{number_format($rate, 1, '.', '')}}</h5>
                            <span class="ms-3 me-2">{{$rates}} отзывов</span>
                            <svg width="25" height="25" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.72916 12.7461C2.02088 11.8259 1.66675 11.3658 1.66675 9.99967C1.66675 8.63353 2.02088 8.17345 2.72916 7.25328C4.14339 5.41597 6.51518 3.33301 10.0001 3.33301C13.485 3.33301 15.8568 5.41597 17.271 7.25328C17.9793 8.17345 18.3334 8.63353 18.3334 9.99967C18.3334 11.3658 17.9793 11.8259 17.271 12.7461C15.8568 14.5834 13.485 16.6663 10.0001 16.6663C6.51518 16.6663 4.14339 14.5834 2.72916 12.7461Z" stroke="#8C8C8C" stroke-width="1.5"/>
                                <path d="M12.5 10C12.5 11.3807 11.3807 12.5 10 12.5C8.61929 12.5 7.5 11.3807 7.5 10C7.5 8.61929 8.61929 7.5 10 7.5C11.3807 7.5 12.5 8.61929 12.5 10Z" stroke="#8C8C8C" stroke-width="1.5"/>
                            </svg>
                            <span class="m-0 ms-2">{{$viewed}}</span>
                        </div>
                        <div class="product-details-meta">
                            <ul>
                                <li>{{$product->short_description}}</li>
                                <li><span class="title">Теги:</span>
                                    <ul >
                                        @foreach($product->tags as $tag)
                                            <li ><a class="" href="{{ route('front.category.index', ['tagId' => $tag->id]) }}">{{$tag->title}}</a>,</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li style="align-items: baseline"><span class="title">Категории:</span>
                                    <ul class="tag">
                                        <li>
                                            @foreach($product->categories as $category)
                                                <a class="" href="{{ route('front.category.show', $category->slug) }}">{{$category->title}}</a>
                                            @endforeach
                                        </li>
                                    </ul>
                                </li>
                                <li><span class="title">Доступность:</span>
                                    <ul class="tag">
                                        {!! ($product->amount) ? '<li class=""><h2 class="fs-6 text-success w-100">Есть в наличии '.$product->amount.' шт.</h2></li>' : '<li class="text-danger">Нет в наличии</li>' !!}
                                    </ul>
                                </li>
                            </ul>
                        </div>
{{--                        <div class="product-color product-color-active product-details-color">--}}
{{--                            <span>Color :</span>--}}
{{--                            <ul>--}}
{{--                                <li><a title="Pink" class="pink rounded-circle" href="#">pink</a></li>--}}
{{--                                <li><a title="Yellow" class="active yellow rounded-circle" href="#">yellow</a></li>--}}
{{--                                <li><a title="Purple" class="purple rounded-circle" href="#">purple</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        @if($product->amount > 0)
                            <div class="">
                                <div class="w-50 addCart pe-1">
                                    @livewire('front.cart.cart-count-btn', ['product' => $product, 'type' => 'cart_count'], key($product->id))
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="priceBuy">
                        <div class="product-details-action-wrap font-kyiv">
                            <div class="product-details-price py-md-3">
                                @if($product->discount_price == "")
                                    <span class="p-1 new-price-card">{{number_format($product->price, 0, '.', ' ')}} {{$product->price > 999 ? 'сум' : '$'}}</span>
                                @else
                                    <span class="p-1 old-price-card">Скидка:<span style="color: #ED4A67;">-{{number_format($profPercent, 0, '.', ' ')}}%</span> Выгода:<span style="color: #32C77F">{{number_format($profit, 0, '.', ' ')}}{{$product->price > 999 ? 'сум' : '$'}}</span></span><br>
                                    <span class="p-1 new-price-card">{{number_format($product->discount_price, 0, '.', ' ')}}  {{$product->discount_price > 999 ? 'сум' : '$'}}</span><span class="p-1 old-price-card text-decoration-line-through">{{number_format($product->price, 0, '.', ' ')}} {{$product->discount_price > 999 ? 'сум' : '$'}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex btn-parent">
                            @if($product->amount > 0)
                                <div class="w-50 pe-1 md-100">
                                    @livewire('front.cart.cart-count-btn', ['product' => $product, 'type' => 'cart'], key($product->id))
                                </div>
                            @endif
                            <div class="single-product-cart btn-hover md-100 w-50 ps-1 text-center">
                                <button title="Купить в один клик" data-bs-toggle="modal" data-bs-target="#exampleModal" class="w-100 p-2 text-dark bg-light border border-1">{{($product->amount > 0) ? 'Купить в один клик' : 'Оставить заявку' }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 p-0 mt-3 mt-lg-0 mt-xl-0 ps-lg-2">
                    <div class="p-3 info-delivery mb-4">
                        <div class="d-flex flex-wrap">
                            <div class="col-6 col-lg-12">
                                <svg class="mb-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="17" cy="18" r="2" stroke="#F8B301" stroke-width="1.5"/>
                                    <circle cx="7" cy="18" r="2" stroke="#F8B301" stroke-width="1.5"/>
                                    <path d="M5 17.9724C3.90328 17.9178 3.2191 17.7546 2.73223 17.2678C2.24536 16.7809 2.08222 16.0967 2.02755 15M9 18H15M19 17.9724C20.0967 17.9178 20.7809 17.7546 21.2678 17.2678C22 16.5355 22 15.357 22 13V11H17.3C16.5555 11 16.1832 11 15.882 10.9021C15.2731 10.7043 14.7957 10.2269 14.5979 9.61803C14.5 9.31677 14.5 8.94451 14.5 8.2C14.5 7.08323 14.5 6.52485 14.3532 6.07295C14.0564 5.15964 13.3404 4.44358 12.4271 4.14683C11.9752 4 11.4168 4 10.3 4H2" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 8H8" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 11H6" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.5 6H16.3212C17.7766 6 18.5042 6 19.0964 6.35371C19.6886 6.70742 20.0336 7.34811 20.7236 8.6295L22 11" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="hdln mb-0 font-kyiv">Доставка</p>
                                <h2 class="prgrph font-kyiv">Доставка во все регионы Узбекистана </h2>

                            </div>
                            <div class="col-6 col-lg-12">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.1459 7.02251C11.5259 6.34084 11.7159 6 12 6C12.2841 6 12.4741 6.34084 12.8541 7.02251L12.9524 7.19887C13.0603 7.39258 13.1143 7.48944 13.1985 7.55334C13.2827 7.61725 13.3875 7.64097 13.5972 7.68841L13.7881 7.73161C14.526 7.89857 14.895 7.98205 14.9828 8.26432C15.0706 8.54659 14.819 8.84072 14.316 9.42898L14.1858 9.58117C14.0429 9.74833 13.9714 9.83191 13.9392 9.93531C13.9071 10.0387 13.9179 10.1502 13.9395 10.3733L13.9592 10.5763C14.0352 11.3612 14.0733 11.7536 13.8435 11.9281C13.6136 12.1025 13.2682 11.9435 12.5773 11.6254L12.3986 11.5431C12.2022 11.4527 12.1041 11.4075 12 11.4075C11.8959 11.4075 11.7978 11.4527 11.6014 11.5431L11.4227 11.6254C10.7318 11.9435 10.3864 12.1025 10.1565 11.9281C9.92674 11.7536 9.96476 11.3612 10.0408 10.5763L10.0605 10.3733C10.0821 10.1502 10.0929 10.0387 10.0608 9.93531C10.0286 9.83191 9.95713 9.74833 9.81418 9.58117L9.68403 9.42898C9.18097 8.84072 8.92945 8.54659 9.01723 8.26432C9.10501 7.98205 9.47396 7.89857 10.2119 7.73161L10.4028 7.68841C10.6125 7.64097 10.7173 7.61725 10.8015 7.55334C10.8857 7.48944 10.9397 7.39258 11.0476 7.19887L11.1459 7.02251Z" stroke="#F8B301" stroke-width="1.5"/>
                                    <path d="M19 9C19 12.866 15.866 16 12 16C8.13401 16 5 12.866 5 9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9Z" stroke="#F8B301" stroke-width="1.5"/>
                                    <path d="M12 16.0678L8.22855 19.9728C7.68843 20.5321 7.41837 20.8117 7.18967 20.9084C6.66852 21.1289 6.09042 20.9402 5.81628 20.4602C5.69597 20.2495 5.65848 19.8695 5.5835 19.1095C5.54117 18.6804 5.52 18.4658 5.45575 18.2861C5.31191 17.8838 5.00966 17.5708 4.6211 17.4219C4.44754 17.3554 4.24033 17.3335 3.82589 17.2896C3.09187 17.212 2.72486 17.1732 2.52138 17.0486C2.05772 16.7648 1.87548 16.1662 2.08843 15.6266C2.18188 15.3898 2.45194 15.1102 2.99206 14.5509L5.45575 12" stroke="#F8B301" stroke-width="1.5"/>
                                    <path d="M12 16.0678L15.7715 19.9728C16.3116 20.5321 16.5816 20.8117 16.8103 20.9084C17.3315 21.1289 17.9096 20.9402 18.1837 20.4602C18.304 20.2495 18.3415 19.8695 18.4165 19.1095C18.4588 18.6804 18.48 18.4658 18.5442 18.2861C18.6881 17.8838 18.9903 17.5708 19.3789 17.4219C19.5525 17.3554 19.7597 17.3335 20.1741 17.2896C20.9081 17.212 21.2751 17.1732 21.4786 17.0486C21.9423 16.7648 22.1245 16.1662 21.9116 15.6266C21.8181 15.3898 21.5481 15.1102 21.0079 14.5509L18.5442 12" stroke="#F8B301" stroke-width="1.5"/>
                                </svg>

                                <p class="hdln mb-0 font-kyiv">Гарантия</p>
                                <h2 class="prgrph font-kyiv">На все товары распространяется гарантия качества</h2>
                            </div>
                            <div class="col-6 col-lg-12">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 8L10 8" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M20.8333 9L18.2308 9C16.4465 9 15 10.3431 15 12C15 13.6569 16.4465 15 18.2308 15L20.8333 15C20.9167 15 20.9583 15 20.9935 14.9979C21.5328 14.965 21.9623 14.5662 21.9977 14.0654C22 14.0327 22 13.994 22 13.9167V10.0833C22 10.006 22 9.96726 21.9977 9.9346C21.9623 9.43384 21.5328 9.03496 20.9935 9.00214C20.9583 9 20.9167 9 20.8333 9Z" stroke="#F8B301" stroke-width="1.5"/>
                                    <circle cx="18" cy="12" r="1" fill="#F8B301"/>
                                    <path d="M20.965 9C20.8873 7.1277 20.6366 5.97975 19.8284 5.17157C18.6569 4 16.7712 4 13 4L10 4C6.22876 4 4.34315 4 3.17157 5.17157C2 6.34315 2 8.22876 2 12C2 15.7712 2 17.6569 3.17157 18.8284C4.34315 20 6.22876 20 10 20L13 20C16.7712 20 18.6569 20 19.8284 18.8284C20.6366 18.0203 20.8873 16.8723 20.965 15" stroke="#F8B301" stroke-width="1.5"/>
                                </svg>
                                <p class="hdln mb-0 font-kyiv">Удобный расчет</p>
                                <h2 class="prgrph font-kyiv">Все виды оплаты для физических и юридических лиц</h2>
                            </div>
                            <div class="col-6 col-lg-12 d-flex flex-wrap">
                                <div class="col-sm-4 col-6 p-0 d-flex align-items-center justify-content-center">
                                    <img class="w-100" src="{{asset('storage/payment/payme.png')}}" alt="Payme LumenLux">
                                </div>
                                <div class="col-sm-4 col-6 p-0 d-flex align-items-center justify-content-center">
                                    <img class="w-100" src="{{asset('storage/payment/click.png')}}" alt="Click LumenLux">
                                </div>
                                <div class="col-sm-4 col-6 p-0 d-flex align-items-center justify-content-center">
                                    <img class="w-100 " src="{{asset('storage/payment/uzum.png')}}" alt="Uzum LumenLux">
                                </div>
                                <div class="col-sm-4 col-6 p-0 d-flex align-items-center justify-content-center">
                                    <img class="w-100" src="{{asset('storage/payment/uzum_n.png')}}" alt="Uzum Nasiya LumenLux">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-md-3 px-lg-0">
                        <div class="p-3 info-delivery">
                            <p class="hdln mb-0 font-kyiv text-lg-start text-center">Товар не представлен в нужном размере или цвете?</p>
                            <p class="mb-0 text-center text-decoration-underline mt-2 fw-bold yel"><a class="p-4 px-1 yel" data-bs-toggle="modal" data-bs-target="#exampleModal">Оставить заявку</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade quickview-modal-style" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <livewire:front.component.onclick :product="$product" :key="$product->id" />
            </div>
        </div>
    </div>
    <div class="description-review-area pb-85">
        <div class="container px-xl-5 px-lg-1 px-md-0">
            <div class="description-review-topbar nav disp" data-aos="fade-down" data-aos-delay="50">
                <div><a class="active" data-bs-toggle="tab" href="#des-details2" class=""> Характеристики </a></div>
                <div><a data-bs-toggle="tab" href="#des-details1"> Описание </a></div>
                <div><a data-bs-toggle="tab" href="#des-details4"> Оплата и доставка </a></div>
                <div><a data-bs-toggle="tab" href="#des-details3" class=""> Отзывы </a></div>
            </div>
            <div class="tab-content">
                <div id="des-details2" class="tab-pane active">
                    <div class="specification-wrap table-responsive d-flex justify-content-center">
                        {!! $product->additional !!}
                    </div>
                </div>
                <div id="des-details1" class="tab-pane">
                    {!! $product->long_description !!}
                </div>
                <div id="des-details4" class="tab-pane">
                    <div class="w-100 d-flex flex-wrap payInfo">
                        <div class="col-12 col-lg-6">
                            <p class="hdln font-kyiv">Способы доставки</p>
                            <p class="prgrph font-kyiv">Самовызов возможен ПН - СБ 9:00 - 18:00</p>
                        </div>
                        <div class="col-12 col-lg-6">
                            <p class="hdln font-kyiv">Способы оплаты</p>
                            <p class="prgrph font-kyiv">Безналичный расчет</p>
                        </div>
                        <div class="col-12 col-lg-6">
                            <p class="hdln font-kyiv">Способы доставки</p>
                            <p class="prgrph font-kyiv">Товар доставляется Клиенту в срок, указанный в описании товара, или оговеренный с Клиентом индивидуально по согласованной заранее цена.</p>
                        </div>
                        <div class="col-12 col-lg-6">
                            <p class="hdln mb-0 font-kyiv">Онлайн оплата
                                <img class="" src="{{asset('storage/payment/payme.png')}}" alt="Payme LumenLux">
                                <img class="" src="{{asset('storage/payment/click.png')}}" alt="Click LumenLux">
                                <img class="" src="{{asset('storage/payment/uzum.png')}}" alt="Uzum LumenLux">
                                <img class="" src="{{asset('storage/payment/uzum_n.png')}}" alt="Uzum nasiya LumenLux">
                            </p>
                            <p class="prgrph font-kyiv">Предостовляемая вами персональная информация является конфиденциальной и не подлежит разглашению.</p>
                        </div>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <livewire:front.component.reviews :product="$product"/>
                </div>
            </div>
        </div>
    </div>
    @if(count($relatedProducts) > 0)
        <div class="related-product-area pb-95">
            <div class="container">
                <div class="pt-3 mb-75 font-cormorant position-relative" data-aos="fade-up" data-aos-delay="50">
                    <h2 class="shadow-text-1 font-cormorant fw-bold">В одном <br>стиле</h2>
                    <h2 class="shadow-text-2 font-cormorant fw-bold">В одном <br>стиле</h2>
                </div>
                <div class="row">
                    @foreach($relatedProducts as $product)
                        <div class="col-6 col-md-4 col-lg-3 align-self-stretch p-2">
                            <livewire:front.component.product-card :product="$product" :key="$product->id" />
                        </div>
                    @endforeach
                </div>
{{--                <div class="product-slider-active-1 pt-0 swiper-container">--}}
{{--                    <div class="swiper-wrapper">--}}
{{--                        @foreach($relatedProducts as $product)--}}
{{--                            <div class="swiper-slide align-self-stretch">--}}
{{--                                <livewire:front.component.product-card :product="$product" :key="$product->id" />--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    @endif
    @if(count($additionalProducts) > 0)
        <div class="related-product-area pb-95">
            <div class="container">
                <div class="pt-3 mb-75 font-cormorant position-relative" data-aos="fade-up" data-aos-delay="50">
                    <h2 class="shadow-text-1 font-cormorant fw-bold">Покупают с<br>этим</h2>
                    <h2 class="shadow-text-2 font-cormorant fw-bold">Покупают с<br>этим</h2>
                </div>
                <div class="row">
                    @foreach($additionalProducts as $product)
                        <div class="col-6 col-md-4 col-lg-3 align-self-stretch p-1">
                            <livewire:front.component.product-card :product="$product" :key="$product->id" />
                        </div>
                    @endforeach
                </div>
{{--                <div class="product-slider-active-1 pt-0 swiper-container">--}}
{{--                    <div class="swiper-wrapper">--}}
{{--                        @foreach($additionalProducts as $product)--}}
{{--                            <div class="swiper-slide align-self-stretch">--}}
{{--                                <livewire:front.component.product-card :product="$product" :key="$product->id" />--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    @endif
</div>


@section('scripts')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
