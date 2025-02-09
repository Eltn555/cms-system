@section('title', 'Портфолио')
@section('description', 'Lumen Lux, Бра, споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет'.$this->description)
@section('keyword', 'LumenLux, lumen, lux, '.$this->description)

@push('styles')
    <style>
        .blog-category{
            height: 35px;
            overflow-x: scroll;
        }
        .blog-category::-webkit-scrollbar{
            display: none;
        }
        .blog-category a {
            margin-right: 15px;
        }
        .activeBlog{
            background-color: #F8B301 !important;
            border: none !important;
            pointer-events: none;
            cursor: default;
        }
        .notActive{
            background-color: #f4f4f4;
            border: solid 1px #777777;

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
    </style>
@endpush

<div>
    <div class="container mt-5 py-5">
        <div class="pt-3 row" data-aos-delay="50">
            <div class="col-12 font-cormorant position-relative">
                <h1 class="shadow-text-1 font-cormorant fw-bold">Наше портфолио</h1>
                <h5 class="shadow-text-2 font-cormorant fw-bold">Наше портфолио</h5>
            </div>
            <div class="col-12">
                <div class="blog-category w-100 d-flex mt-4 font-kyiv">
                    <a id="blogCategory" wire:click="setBlog('')" class="d-flex h-100 fw-bolder justify-content-center align-items-center px-3 notActive activeBlog">
                        Все
                    </a>
                    @foreach($categories as $category)
                        <a style="text-wrap: nowrap;" id="blogCategory{{$category->id}}" wire:click="setBlog('{{$category->id}}')" class="d-flex h-100 fw-bolder justify-content-center align-items-center px-3 notActive lh-1">
                            <h3 class="m-0 lh-1 fs-6 fw-semibold">{{$category->title}}</h3>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-12">
                <div class="row pt-5">
                    @foreach($news as $blog)
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
    </div>

    {{--    Form container--}}
    <div class="form-area pb-70">
        <livewire:front.form.send-form/>
    </div>
</div>

@push('scripts')
    <script>
        const scrollContainer = document.querySelector(".blog-category");

        let isDown = false;
        let startX;
        let scrollLeft;

        scrollContainer.addEventListener("mousedown", (e) => {
            isDown = true;
            scrollContainer.classList.add("active");
            startX = e.pageX - scrollContainer.offsetLeft;
            scrollLeft = scrollContainer.scrollLeft;
        });

        scrollContainer.addEventListener("mouseleave", () => {
            isDown = false;
            scrollContainer.classList.remove("active");
        });

        scrollContainer.addEventListener("mouseup", () => {
            isDown = false;
            scrollContainer.classList.remove("active");
        });

        scrollContainer.addEventListener("mousemove", (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - scrollContainer.offsetLeft;
            const walk = (x - startX) * 1; // Adjust speed
            scrollContainer.scrollLeft = scrollLeft - walk;
        });

        window.addEventListener('metaChanged', event => {
            const {description, keywords} = event.detail;
            // Update meta description
            document.querySelector('meta[name="description"]').setAttribute('content', description);
            // Update meta keywords
            document.querySelector('meta[name="keywords"]').setAttribute('content', keywords);
            document.title = event.detail.title;
        });
        window.addEventListener('refresh', event => {
            AOS.init();
            $('.notActive').removeClass('activeBlog');
            $('#blogCategory'+event.detail.id).addClass('activeBlog');
        });
    </script>
@endpush
