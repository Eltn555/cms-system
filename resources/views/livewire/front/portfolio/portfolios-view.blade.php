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
        /* Extra small devices (portrait phones, less than 576px) */
        @media (max-width: 575.98px) {
            .blog-details-img{
                height: 30vh;
            }
        }

        /* Small devices (landscape phones, 576px and up) */
        @media (min-width: 576px) {
            .blog-details-img{
                height: 35vh;
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
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) {
            /* Your styles here */
        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {
            .modal-xl{
                width: 95%;
                max-width: 95%;
            }
        }

        /* XXL devices (larger desktops, 1400px and up) */
        @media (min-width: 1400px) {
            /* Your styles here */
        }
        .gallery {
            column-count: 3; /* Two columns */
            column-gap: 10px; /* Space between columns */
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
        .button-arrows button{
background-color: unset;
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
                                <img class="showGallery" data-count="{{$loop->count}}" data-selectable="{{$loop->iteration}}" data-last="{{$loop->last}}" data-first="{{$loop->first}}" src="{{ asset('storage/' . $image->image) }}" alt="LumenLux | {{$portfolio->description}}">
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
                @foreach($latest as $last)
                    <div class="col-lg-3 col-md-6 px-2">
                        <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="50">
                            <div class="blog-img-date-wrap mb-25">
                                <div class="blog-img">
                                    <a class="w-100 h-100 overflow-hidden" href="{{ route('portfolio.details', ['slug' => $last->info]) }}"><img class="h-100" src="{{ asset('storage/' . $last->image) }}" alt="$last->title"></a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul class="card-brand fw-bold font-kyiv">
                                        {{$last->created_at->format('d.m.Y')}}
                                    </ul>
                                </div>
                                <h3 class="font-kyiv fs-5 fw-bold"><a href="{{ route('portfolio.details', ['slug' => $last->info]) }}">{{$last->title}}</a></h3>
                                <p class="blog-text">{{ mb_strimwidth($last->description, 0, 77, '...') }}</p>
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
            <img src="http://127.0.0.1:8000/storage/uploads/RfdzzxWzUxVtQTrVWqxiEExqlAzNu1Lyeivn36gG.webp">
        </div>
        <div class="button-arrows position-absolute w-100 top-50 d-flex justify-content-between">
            <button onclick="prevGlry()" class="text-light p-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
            </button>
            <button onclick="nextGlry()" class="text-light p-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
            </button>
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
        });
        new bootstrap.Modal(document.getElementById('showGallery')).show();
        function setGallery(img){
            next = img.data('last') ? 1 : img.data('selectable') + 1;
            prev = img.data('first') ? img.data('count') : img.data('selectable') - 1;
            src = img.attr('src');

            alert('prev:'+prev+' next:'+next+' src:'+src);
        }
    </script>

@endpush
