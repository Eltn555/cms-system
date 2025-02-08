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
        .blog-categoryText h5{
            width: 40%;
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
    </style>
@endpush

<div>
    <div class="container mt-5 py-5">
        <div class="pt-3 row" data-aos-delay="50">
            <div class="col-12 font-cormorant position-relative">
                <h1 class="shadow-text-1 font-cormorant fw-bold">Наш портфолио</h1>
                <h5 class="shadow-text-2 font-cormorant fw-bold">Наш портфолио</h5>
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
                        <div class="col-lg-4 col-xl-3 col-md-6 px-2">
                            <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="50">
                                <div class="blog-img-date-wrap mb-25">
                                    <div class="blog-img">
                                        <a href="{{ route('blog.details', ['id' => $blog->id]) }}"><img src="{{asset('/storage/'.$blog->image)}}" alt=""></a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <ul class="card-brand fw-bolder font-kyiv">
                                            {{(new DateTime($blog->created_at))->format('d.m.Y')}}
                                        </ul>
                                    </div>
                                    <h2 class="font-kyiv fs-5 fw-bold"><a href="{{ route('blog.details', ['id' => $blog->id]) }}">{{$blog->title}}</a></h2>
                                    <h3 class="blog-text">{{$blog->description}}</h3>
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
