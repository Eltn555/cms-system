@section('title', $portfolio->title)
@section('description', 'Lumen Lux, Люстры, Бра, споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет'.$portfolio->description)
@section('keyword', 'LumenLux, lumen, lux, Люстры, Бра, споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка,'.$portfolio->description)

@push('styles')
    <style>
        .object path:hover{
            fill:red;
        }
        .arrowRotate{
            transition: 1s;
        }
        .r360{
            transform: rotate(180deg);
            transition: 1s;
        }
        .blog-img a{
            width: 100% !important;
            height: 100% !important;
        }
        .blog-img img{
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
        }
        .blog-details-img img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .img-darker{
            background-color: rgba(0,0,0,0.4);
            z-index: 2;
        }
        .more{
            background-color: #f4f4f4;
            border: solid 2px #F8B301;
        }
        .more:hover{
            background-color: #F8B301;
            border: solid 2px #ffffff;
            color: #f4f4f4;
        }
        .blog-categoryText h5{
            width: 40%;
        }
        .blog-img{
            height: 300px !important;
        }
        .blog-img a{
            width: 100% !important;
            height: 100% !important;
        }
        .blog-img img{
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
        }
        .blog-img-date-wrap{
            width: 60%;
        }
        .blog-content{
            width: 40%;
        }
        @media (min-width: 992px) and (max-width: 1200px){
            .blog-img-date-wrap{
                width: 50%;
            }
            .blog-content{
                width: 50%;
            }
            .blog-img{
                height: 200px !important;
            }
            .blog-meta{
                padding-bottom: 10px !important;
            }
        }
        @media (min-width: 100px) and (max-width: 500px){
            .blog-content{
                width: 100%;
                height: 100%;
                position: absolute;
                z-index: 2;
                left: 0;
                top: 0;
                padding: 0.5em !important;
            }
            .blog-content>.d-flex{
                height: 100%;
                background-color: rgba(0,0,0,0.4);
            }
            .blog-content>.d-flex>div{
                padding-bottom: 15px !important;
                justify-content: right;
                display: flex;
            }
            .blog-content h2>a{
                padding-top: 35px;
                padding-left: 20px;
                font-size: 30px;
                color: #f4f4f4;
            }
            .blog-content h3{
                padding-left: 20px;
                font-size: 20px !important;
                color: wheat !important;
                padding-bottom: 70px;
            }
            .blog-img-date-wrap{
                width: 100%;
            }
        }
        .blog-category {
            cursor: grab;
            user-select: none; /* Prevent text selection */
            overflow-x: auto;
            white-space: nowrap;
        }

        .blog-category.active {
            cursor: grabbing;
        }
        /* Extra small devices (portrait phones, less than 576px) */
        @media (max-width: 575.98px) {
            .blog-details-img{
                height: 30vh;
            }
            .gallery {
                column-count: 1; /* Two columns */
            }
        }

        /* Small devices (landscape phones, 576px and up) */
        @media (min-width: 576px) {
            .blog-details-img{
                height: 35vh;
            }
            .modal-xl{
                width: 100%;
                max-width: 100%;
            }
            .gallery {
                column-count: 1; /* Two columns */
            }
        }

        /* Medium devices (tablets, 768px and up) */
        @media (min-width: 768px) {
            .blog-details-img{
                height: 50vh;
            }
            .modal-xl{
                width: 90%;
                max-width: 90%;
            }
            .gallery {
                column-count: 2; /* Two columns */
                column-gap: 10px; /* Space between columns */
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) {
            .gallery {
                column-count: 3; /* Two columns */
                column-gap: 10px; /* Space between columns */
            }
        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {

        }

        /* XXL devices (larger desktops, 1400px and up) */
        @media (min-width: 1400px) {
            /* Your styles here */
        }

        .gallery img {
            width: 100%; /* Fit within its column */
            height: auto; /* Maintain original height */
            display: block; /* Prevents extra space */
            margin-bottom: 10px; /* Space between images */
            cursor: pointer;
        }
        .modal{
            background-color: rgba(0, 0, 0, 0.8);
        }
        .modal img{
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .modal-xl{
            height: 100vh;
        }
        .button-arrows a{
            height: 200px;
            transform: translateY(-50%);
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/plyr@3.7.8/dist/plyr.css">
@endpush

<div>
    <div class="w-100">
        <div class="blog-details-wrapper overflow-hidden pb-5">
            <div class="blog-details-img-date-wrap mb-35 aos-init aos-animate" data-aos="fade-up"
                 data-aos-delay="200">
                <div class="blog-details-img relative">
                    <div class="position-absolute w-100 h-100 img-darker d-flex align-items-end">
                        <h1 class="font-kyiv m-0 ps-4 pb-3 text-white fs-1">{{ $portfolio->title }}</h1>
                    </div>
                    <img src="{{ asset('storage/' . $portfolio->image) }}" alt="">
                </div>
                <div class="blog-details-date">
                    <h5>{{ $portfolio->created_at->format('d') }} <span>{{ $portfolio->created_at->format('M') }}</span>
                    </h5>
                </div>
            </div>
            <div class="container">
                <div class="row">

                    <div>
                        <h2 class="text-center font-kyiv">{{$portfolio->description}}</h2>
                    </div>

                    <div class="w-100 video-container">
                        <video class="w-100" autoplay loop controls muted playsinline>
                            <source src="{{$portfolio->video}}" type="video/mp4">

                            <!-- Caption files -->
                            <!-- Fallback for browsers that don't support the <video> element -->
                            <a>Video is not supported</a>
                        </video>
                    </div>

                    <div class="col-12 mt-3">
                        {!! html_entity_decode($portfolio->text) !!}
                    </div>

                    <div class="gallery mt-3">
                        @foreach($portfolio->gallery as $index => $image)
                            <div>
                                <img id="glry{{$loop->iteration}}" class="showGallery" data-count="{{$loop->count}}" data-selectable="{{$loop->iteration}}" data-last="{{$loop->last}}" data-first="{{$loop->first}}" src="{{ asset('storage/' . $image->image) }}" alt="LumenLux | {{$portfolio->description}}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-area pb-70">
        <div class="container">
            <div class="pt-3 mb-20 font-cormorant position-relative row" data-aos="fade-up" data-aos-delay="50">
                <div class="col-6">
                    <h5 class="shadow-text-1 font-cormorant fw-bold">Последние<br>проекты
                        </h5>
                    <h5 class="shadow-text-2 font-cormorant fw-bold">Последние<br>проекты
                        </h5>
                </div>
                <div class="col-6 justify-content-end align-items-end d-flex">
                    <div class="single-product-cart btn-hover ps-1 text-end">
                        <a href="{{ route('portfolio.index') }}" class="p-2 ps-4 pe-4 text-dark bg-light border border-1 font-kyiv">Посмотреть все</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($latest as $blog)
                    <div class="col-lg-6 col-xl-6 p-2 col-md-12" data-aos="fade-up" data-aos-delay="50">
                        <div class="blog-wrap d-flex shadow bg-light relative">
                            <div class="blog-img-date-wrap">
                                <div class="blog-img">
                                    <a href="{{ route('portfolio.details', ['slug' => $blog->info]) }}"><img src="{{asset('/storage/'.$blog->image)}}" alt=""></a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="h-100 d-flex justify-content-between flex-column p-3">
                                    <h2 class="font-kyiv fs-4 fw-bold pt-2"><a href="{{ route('portfolio.details', ['slug' => $blog->info]) }}">{{$blog->title}}</a></h2>
                                    <h3 class="blog-text fs-6">{{$blog->description}}</h3>
                                    <div class="blog-meta pb-5 w-100 d-flex justify-content-end">
                                        <a href="{{ route('portfolio.details', ['slug' => $blog->info]) }}" style="text-wrap: nowrap;" class="m-0 lh-1 fs-6 fw-semibold h-100 px-3 py-2 lh-1 more">
                                            Подробнее   〉〉
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="form-area pb-70">
        <livewire:front.form.send-form/>
    </div>

    <div id="showGallery" class="modal relative" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog modal-xl my-0">
            <img id="targetImg" src="http://127.0.0.1:8000/storage/uploads/RfdzzxWzUxVtQTrVWqxiEExqlAzNu1Lyeivn36gG.webp">
        </div>
        <div class="button-arrows position-absolute w-100 top-50 d-flex justify-content-between">
            <a onclick="prevGlry()" class="text-light p-2 p-md-5 w-50 text-start d-flex align-items-center justify-content-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
            </a>
            <a onclick="nextGlry()" class="text-light p-2 p-md-5 w-50 text-end d-flex align-items-center justify-content-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
            </a>
        </div>
    </div>
</div>

@push('scripts')
    <!-- Include Plyr from CDN -->
{{--    <script src="https://cdn.jsdelivr.net/npm/plyr@3.7.8/dist/plyr.min.js"></script>--}}
    <script>
        {{--<img class="showGallery" data-count="{{$loop->count}}" data-selectable="{{$loop->iteration}}" data-last="{{$loop->last}}" data-first="{{$loop->first}}" src="{{ asset('storage/' . $image->image) }}" alt="LumenLux | {{$portfolio->description}}">--}}
        let next;
        let prev;
        let src;
        $('.showGallery').on('click', function () {
            img = $(this);
            setGallery(img);
            new bootstrap.Modal(document.getElementById('showGallery')).show();
        });

        $(document).keydown(function(event) {
            switch (event.key) {
                case "ArrowRight":
                    if (next){
                        nextGlry()
                    }
                    break;
                case "ArrowLeft":
                    if (prev){
                        prevGlry();
                    }
                    break;
                case "ArrowDown":
                    if (next){
                        nextGlry()
                    }
                    break;
                case "ArrowUp":
                    if (prev){
                        prevGlry();
                    }
                    break;
                case "Escape":
                    new bootstrap.Modal(document.getElementById('showGallery')).hide();
            }
        });

        function setGallery(img){
            next = img.data('last') ? 1 : img.data('selectable') + 1;
            prev = img.data('first') ? img.data('count') : img.data('selectable') - 1;
            src = img.attr('src');
            $('#targetImg').attr('src', src);
        }

        function nextGlry(){
            img = $('#glry'+next);
            setGallery(img);
        }

        function prevGlry(){
            img = $('#glry'+prev);
            setGallery(img);
        }

    </script>

@endpush
