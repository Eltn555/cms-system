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
    </style>
@endsection

@section('content')
    <div class="container my-5 py-5">
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
                    <div class="col-4 text-center px-3 py-0">
                        <div class="w-100 d-flex justify-content-center fw-bold font-kyiv">
                            <h5 class="counter-count fw-bold">100</h5><span>+</span>
                        </div>
                        <p class="mb-0 fw-bolder">Количество проектов!</p>
                        <p class="px-5">Высокое разрешение и красивый дизайн только для вас!</p>
                    </div>
                    <div class="col-4 text-center px-3 py-0">
                        <div class="w-100 d-flex justify-content-center fw-bold font-kyiv">
                            <h5 class="counter-count fw-bold">2500</h5><span>+</span>
                        </div>
                        <p class="mb-0 fw-bolder">Довольные покупатели!</p>
                        <p class="px-5">Покупатели очень благодарны за нашу работу!</p>
                    </div>
                    <div class="col-4 text-center px-3 py-0 border-end-0">
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
@endsection

@section('scripts')
    <script>
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
    </script>
@endsection
