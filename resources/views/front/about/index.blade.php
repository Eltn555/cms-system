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
            width: 195px !important;
            border-right: 1px solid #E0E0E0;
            padding: 0 10px!important;
            margin-right: 0!important;
        }
        .map-container{
            position: relative;
            padding-bottom: 80%; /* 16:9 */
            height: 0;
        }
        .map-radio input{
            width: 20px;
            height: 20px;
            margin-right: 15px;
        }
        .map-radio{
            cursor: pointer;
            margin-bottom: 20px;
        }
        .selected_map{
            color: #F8B301 !important;
            border-color: #F8B301 !important;
        }
        .infoLink a{
            display: block;
            height: 30px;
        }
        .infoLink svg{
            margin-right: 5px;
        }
        @media (max-width: 991px) {
            .map-container{
                padding-bottom: 55%; /* 16:9 */
            }
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
    <div class="product-area">
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
                                    <img src="{{asset('aboutss/1.jpg')}}" alt="LumenLux team">
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
                                    <img src="{{asset('aboutss/2.jpg')}}" alt="LumenLux team">
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
                                    <img src="{{asset('aboutss/3.jpg')}}" alt="LumenLux team">
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
                                    <img src="{{asset('aboutss/1.jpg')}}" alt="LumenLux team">
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
                                    <img src="{{asset('aboutss/1.jpg')}}" alt="LumenLux team">
                                </a>
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
    <div class="brand-logo-area" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
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
    <div class="container " data-aos="fade-up" data-aos-delay="100">
        <div class="row pb-5">
            <div class="col-12 position-relative pt-3">
                <h5 class="shadow-text-1 font-cormorant fw-bold">Контакты</h5>
                <h5 class="shadow-text-2 font-cormorant fw-bold">Контакты</h5>
            </div>
            <div class="col-lg-6 col-md-12 h-100 order-md-1 order-lg-0 font-kyiv px-md-0 px-lg-3 mt-lg-0 mt-md-3">
                <div class="w-100 p-3 bg-light border d-flex align-items-center map-radio">
                    <input class="radio" type="radio" name="location" value="41.328629, 69.273486">
                    <p class="mb-0 fw-semibold">г. Ташкент, Ц5  (Напротив Респуликанской пожарки)</p>
                </div>
                <div class="w-100 p-3 bg-light border d-flex align-items-center map-radio">
                    <input class="radio" type="radio" name="location" value="41.309927, 69.335936">
                    <p class="mb-0 fw-semibold">Ул. Паркентская, дом 241</p>
                </div>
                <div class="w-100 p-3 bg-light border d-flex align-items-center map-radio">
                    <input class="radio" type="radio" name="location" value="39.647911, 66.925854">
                    <p class="mb-0 fw-semibold">г. Самарканд, Микрорайон (Напротив поликлиники)</p>
                </div>

                <div class="row mt-5 p-0 m-0 infoLink">
                    <div class="col-4 p-0">
                        <a href="https://www.instagram.com/lumenlux.uz/" class="p-1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.666 2.66675H7.33268C4.76625 2.66675 2.66602 4.76605 2.66602 7.33342V16.6667C2.66602 19.2332 4.76625 21.3334 7.33268 21.3334H16.666C19.2325 21.3334 21.3327 19.2332 21.3327 16.6667V7.33342C21.3327 4.76605 19.2325 2.66675 16.666 2.66675ZM11.9994 15.8889C9.85136 15.8889 8.11046 14.1473 8.11046 12.0002C8.11046 9.85209 9.85136 8.11119 11.9994 8.11119C14.1466 8.11119 15.8884 9.85209 15.8884 12.0002C15.8884 14.1473 14.1466 15.8889 11.9994 15.8889ZM15.8882 6.94453C15.8882 7.58876 16.41 8.11119 17.0549 8.11119C17.6998 8.11119 18.2216 7.58876 18.2216 6.94453C18.2216 6.30029 17.6998 5.77786 17.0549 5.77786C16.41 5.77786 15.8882 6.30029 15.8882 6.94453Z" fill="#F8B301"/>
                            </svg>
                            lumenlux.uz
                        </a>
                    </div>
                    <div class="col-4 p-0">
                        <a href="https://www.facebook.com/lumenluxuz/" class="p-1"><svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.48173 7.41675V4.94453C7.48173 4.45179 7.90922 4.02786 8.46244 4.02786H10.9238C11.2756 4.02786 11.5841 3.75413 11.5841 3.38897V1.05564C11.5841 0.690479 11.2756 0.416748 10.9238 0.416748H8.46244C5.84949 0.416748 3.69985 2.43501 3.69985 4.94453V7.41675H1.0782C0.726439 7.41675 0.417969 7.69048 0.417969 8.05564V10.389C0.417969 10.7541 0.726439 11.0279 1.0782 11.0279H3.69985V18.9445C3.69985 19.3097 4.00832 19.5834 4.36009 19.5834H6.8215C7.17326 19.5834 7.48173 19.3097 7.48173 18.9445V11.0279H10.1034C10.3794 11.0279 10.6344 10.8596 10.7286 10.5959L10.7289 10.5948L11.5492 8.26194C11.5493 8.26186 11.5493 8.26177 11.5493 8.26169L11.5494 8.26146L11.3136 8.17853C11.3554 8.0603 11.3341 7.92964 11.257 7.82775L7.48173 7.41675Z" fill="#F8B301" stroke="#F8B301" stroke-width="0.5"/>
                            </svg>
                            lumenluxuz
                        </a>
                    </div>
                    <div class="col-4 p-0">
                        <a href="tel:+998555005444" class="p-1"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.666 3C13.666 3 15.866 3.2 18.666 6C21.466 8.8 21.666 11 21.666 11" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M13.873 6.53564C13.873 6.53564 14.863 6.81849 16.3479 8.30341C17.8328 9.78834 18.1157 10.7783 18.1157 10.7783" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M9.70361 6.31617L10.3526 7.4791C10.9383 8.52858 10.7032 9.90532 9.78073 10.8278C9.78072 10.8278 9.78073 10.8278 9.78072 10.8278C9.78061 10.8279 8.6619 11.9468 10.6905 13.9755C12.7185 16.0035 13.8374 14.8861 13.8382 14.8853C13.8382 14.8853 13.8382 14.8853 13.8383 14.8853C14.7607 13.9628 16.1374 13.7277 17.1869 14.3134L18.3498 14.9624C19.9346 15.8468 20.1217 18.0692 18.7288 19.4622C17.8918 20.2992 16.8664 20.9505 15.7329 20.9934C13.8248 21.0658 10.5843 20.5829 7.33372 17.3323C4.08314 14.0817 3.60023 10.8412 3.67257 8.93309C3.71554 7.7996 4.36682 6.77423 5.20382 5.93723C6.59677 4.54428 8.81919 4.73144 9.70361 6.31617Z" fill="#F8B301"/>
                            </svg>
                            555005444
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 order-md-0 order-lg-1 p-0">
                <div class="map-container">
                    <div id="map" class="h-100 w-100 position-absolute"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=da1d75ee-0a8e-4889-afe1-4f70ff26ee4d" type="text/javascript"></script>
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



        //map
        var myMap;

        // Дождёмся загрузки API и готовности DOM.
        ymaps.ready(init);

        function init () {
            // Создание экземпляра карты и его привязка к контейнеру с
            // заданным id ("map").
            myMap = new ymaps.Map('map', {
                // При инициализации карты обязательно нужно указать
                // её центр и коэффициент масштабирования.
                center: [41.31, 69.25],
                zoom: 11,
                controls: []
            }, {
                searchControlProvider: 'yandex#search'
            });
            var placemarks = [
                {
                    coordinates: [41.328629, 69.273486],
                    hintContent: 'г. Ташкент, Ц5  (Напротив Респуликанской пожарки)',
                    balloonContent: 'г. Ташкент, Ц5  (Напротив Респуликанской пожарки)'
                },
                {
                    coordinates: [41.309927, 69.335936],
                    hintContent: 'Ул. Паркентская, дом 241',
                    balloonContent: 'Ул. Паркентская, дом 241'
                },
                {
                    coordinates: [39.647911, 66.925854],
                    hintContent: 'г. Самарканд, Микрорайон (Напротив поликлиники)',
                    balloonContent: 'г. Самарканд, Микрорайон (Напротив поликлиники)'
                }
            ];



            $('.map-radio').click(function() {
                // Trigger click event on the radio button when the div is clicked
                $('.radio').removeClass('selected_map');
                let coordinates = $(this).find('.radio').prop('checked', true).addClass('selected_map').val().split(',').map(parseFloat);
                myMap.setCenter(coordinates, 15);
            });


            placemarks.forEach(function(placemark) {
                var newPlacemark = new ymaps.Placemark(placemark.coordinates, {
                    hintContent: placemark.hintContent,
                    balloonContent: placemark.balloonContent
                });

                myMap.geoObjects.add(newPlacemark);
            });
        }
    </script>
@endsection
