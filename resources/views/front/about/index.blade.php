@extends('front.master')

@section('style')
    <style>
        .greeting-txt h1{
            font-size: 72px;
            font-weight: 700;
            color:rgba(35, 35, 35, 1);
            line-height: 56px;
        }
        .greeting-txt p{
            font-size: 20px;
            font-weight: 400;
            color: rgba(57, 57, 57, 1);
        }
        .greeting-img img{
            width: 100%;
            position: absolute;
            top: -120px;
        }
        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            height: 0;
            margin-top: 75px;
        }
        .video-container iframe {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
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
        .slider-colleague{
            width: 280px !important;
            margin-right: 20px !important;
        }
        .brand-container > div{
            border-right: 1px solid #E0E0E0;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-6 greeting-txt">
                <h5 class="counter"></h5>
                <h1 class="font-cormorant mt-5">Lumenlux - где элегантность сочетается с освещением.</h1>
                <p class="font-kyiv mt-5">Что отличает нас от других, это непоколебимое стремление к совершенству. Каждая люстра в нашем ассортименте отбирается вручную, чтобы обеспечить качество и мастерство.</p>
            </div>
            <div class="col-6 greeting-img position-relative">
                <img src="{{asset('abouthdr.png')}}" alt="lumen lux about">
            </div>
            <div class="col-12 video-container">
                <iframe src="https://www.youtube-nocookie.com/embed/y7_Spedf2BI?si=WEWJHwT3kSZR1UcW&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <div class="col-12">
                <div class="row my-5 py-4 infoNumber">
                    <div class="col-4 text-center px-3 py-0" data-aos="fade-up" data-aos-delay="50">
                        <div class="w-100 d-flex justify-content-center fw-bold font-kyiv">
                            <h5 class="counter-count fw-bold">100</h5><span>+</span>
                        </div>
                        <p class="mb-0 fw-bolder">Количество проектов!</p>
                        <p class="px-5">Высокое разрешение и красивый дизайн только для вас!</p>
                    </div>
                    <div class="col-4 text-center px-3 py-0" data-aos="fade-up" data-aos-delay="150">
                        <div class="w-100 d-flex justify-content-center fw-bold font-kyiv">
                            <h5 class="counter-count fw-bold">2500</h5><span>+</span>
                        </div>
                        <p class="mb-0 fw-bolder">Довольные покупатели!</p>
                        <p class="px-5">Покупатели очень благодарны за нашу работу!</p>
                    </div>
                    <div class="col-4 text-center px-3 py-0 border-end-0" data-aos="fade-up" data-aos-delay="250">
                        <div class="w-100 d-flex justify-content-center fw-bold font-kyiv">
                            <h5 class="counter-count fw-bold">10</h5><span>+</span>
                        </div>
                        <p class="mb-0 fw-bolder">Количество наших филиалов!</p>
                        <p class="px-5">Возможность посетить любой из наших ближайших офисов!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pb-95">
        <div class="container pb-5">
            <div class="pt-3 font-cormorant position-relative row" data-aos="fade-up" data-aos-delay="50">
                <div class="col-8">
                    <h5 class="shadow-text-1 font-cormorant fw-bold">Наша<br>команда</h5>
                    <h5 class="shadow-text-2 font-cormorant fw-bold">Наша<br>команда</h5>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-end">
                    <div class="product-prev-1 border border-1 p-2 px-3 me-2" data-aos="fade-up" data-aos-delay="50"><i class="fa fa-angle-left fs-4"></i></div>
                    <div class="product-next-1 border border-1 p-2 px-3" data-aos="fade-up" data-aos-delay="100"><i class="fa fa-angle-right fs-4"></i></div>
                </div>
            </div>
            <div class="pt-3 product-slider-active-1 swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slider-colleague">
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-img img-zoom mb-25">
                                <a>
                                    <img src="{{asset('about/1.jpg')}}" alt="LumenLux team">
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
                            <div class="product-content font-kyiv">
                                <h4 class="mb-2 card-brand"><a class="card-brand" style="cursor: pointer;">Менеджер</a></h4>
                                <h3 class="fw-bolder">Ашмуродов Сардорбек Комильжонович</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider-colleague">
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-img img-zoom mb-25">
                                <a>
                                    <img src="{{asset('about/2.jpg')}}" alt="LumenLux team">
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
                            <div class="product-content font-kyiv">
                                <h4 class="mb-2 card-brand"><a class="card-brand" style="cursor: pointer;">Менеджер</a></h4>
                                <h3 class="fw-bolder">Ашмуродов Сардорбек Комильжонович</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider-colleague">
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-img img-zoom mb-25">
                                <a>
                                    <img src="{{asset('about/3.jpg')}}" alt="LumenLux team">
                                </a>
                            </div>
                            <div class="product-content font-kyiv">
                                <h4 class="mb-2 card-brand"><a class="card-brand" style="cursor: pointer;">Менеджер</a></h4>
                                <h3 class="fw-bolder">Ашмуродов Сардорбек Комильжонович</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider-colleague">
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-img img-zoom mb-25">
                                <a>
                                    <img src="{{asset('about/1.jpg')}}" alt="LumenLux team">
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
                            <div class="product-content font-kyiv">
                                <h4 class="mb-2 card-brand"><a class="card-brand" style="cursor: pointer;">Менеджер</a></h4>
                                <h3 class="fw-bolder">Ашмуродов Сардорбек Комильжонович</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider-colleague">
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-img img-zoom mb-25">
                                <a>
                                    <img src="{{asset('about/1.jpg')}}" alt="LumenLux team">
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
                            <div class="product-content font-kyiv">
                                <h4 class="mb-2 card-brand"><a class="card-brand" style="cursor: pointer;">Менеджер</a></h4>
                                <h3 class="fw-bolder">Ашмуродов Сардорбек Комильжонович</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brand-logo-area pb-95" data-aos="fade-up" data-aos-delay="100">
        <div class="container pb-5">
            <div class="pt-3 font-cormorant position-relative row" data-aos="fade-up" data-aos-delay="50">
                <div class="col-8">
                    <h5 class="shadow-text-1 font-cormorant fw-bold">Наши<br>партнеры</h5>
                    <h5 class="shadow-text-2 font-cormorant fw-bold">Наши<br>партнеры</h5>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="brand-logo-active border-0 swiper-container">
                <div class="swiper-wrapper brand-container">
                    @for($i = 0; $i < 8; $i++)
                        <div class="swiper-slide border-">
                            <div class="single-brand-logo" data-aos="fade-up" data-aos-delay="200">
                                <a href="#"><img src="{{asset('no_photo.jpg')}}" alt=""></a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        setTimeout(function() {
            $('.counter-count').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        }, 1000); // 1000 milliseconds = 1 second
    </script>
@endsection
