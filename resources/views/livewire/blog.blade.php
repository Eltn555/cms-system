@section('title', 'Блог')
@section('description', $this->description)
@section('keyword', 'LumenLux, lumen, lux, '.$this->description)

<div class="my-5 pt-1">
    <style>
        .flash-message{
            top: 100px;
            right: 10px;
            opacity: 1;
            transition: 0.2s;
            position: fixed !important;
        }
        .hiddenmsg{
            right: -500px;
            opacity: 0;
            transition: 1s;
            position: fixed;
        }
        .file-input{
            display: inline-block;
            padding-top: 50px !important;
            padding-bottom: 0 !important;
            -webkit-box-sizing: border-box !important;
            -moz-box-sizing: border-box !important;
            box-sizing: border-box !important;
            overflow: hidden !important;
            height: 50px !important;
        }
        .file-text{
            left: 20px;
            top: 12px;
            font-size: 15px;
            font-weight: 600;
            color: #757575;
        }
        .icon-input {
            top: 0;
            right: 0;
            padding: 12px 15px;
        }
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
    </style>
    <div class="container mt-3 py-5">
        <div class="pt-3 row" data-aos-delay="50">
            <div class="col-12 font-cormorant position-relative">
                <h5 class="shadow-text-1 font-cormorant fw-bold">Наш блог</h5>
                <h5 class="shadow-text-2 font-cormorant fw-bold">Наш блог</h5>
            </div>
            <div class="col-12">
                <div class="blog-category w-100 d-flex mt-4 font-kyiv">
                    <a id="blogCategory" wire:click="setBlog('')" class="d-flex h-100 fw-bolder justify-content-center align-items-center px-3 notActive activeBlog">
                        Все
                    </a>
                    @foreach($categories as $category)
                        <a style="text-wrap: nowrap;" id="blogCategory{{$category->id}}" wire:click="setBlog('{{$category->id}}')" class="d-flex h-100 fw-bolder justify-content-center align-items-center px-3 notActive lh-1">
                            <h1 class="m-0 lh-1 fs-6 fw-semibold">{{$category->title}}</h1>
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
                                    <h1 class="font-kyiv fs-5 fw-bold"><a href="{{ route('blog.details', ['id' => $blog->id]) }}">{{$blog->title}}</a></h1>
                                    <h2 class="blog-text">{{$blog->description}}</h2>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 mt-3 font-cormorant position-relative blog-categoryText">
                <h5 class="shadow-text-1 font-cormorant fw-bold">{{$category1->title}}</h5>
                <h5 class="shadow-text-2 font-cormorant fw-bold">{{$category1->title}}</h5>
            </div>
            <div class="col-12">
                    <div class="row pt-5 d-xl">
                        <div class="col-12 col-xl-6 row">
                            @foreach($category1->news as $key => $blog)
                                <div class="col-xl-6 col-lg-4 col-md-6 px-2{{ ($key + 1) > 4 ? ' d-xl-none' : '' }}">
                                    <div class="blog-wrap mb-2" data-aos="fade-up" data-aos-delay="50">
                                        <div class="blog-img-date-wrap mb-2">
                                            <div class="blog-img">
                                                <a href="{{ route('blog.details', ['id' => $blog->id]) }}"><img src="{{asset('/storage/'.$blog->image)}}" alt="{{$blog->title}}"></a>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <ul class="card-brand fw-bolder font-kyiv">
                                                    {{(new DateTime($blog->created_at))->format('d.m.Y')}}
                                                </ul>
                                            </div>
                                            <h1 class="font-kyiv fs-5 fw-bold mb-1 mt-0"><a href="{{ route('blog.details', ['id' => $blog->id]) }}">{{$blog->title}}</a></h1>
                                            <h2 class="blog-text mb-0">{{$blog->description}}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-xl-6 d-lg-none d-xl-block d-md-none d-sm-none d-none px-0">
                            @foreach($category1->news as $key => $blog)
                                <div class="h-100 w-100 px-2 {{ ($key + 1) != 5 ? 'd-xl-none' : '' }}">
                                    <div class="blog-wrap mb-2" data-aos="fade-up" data-aos-delay="50">
                                        <div class="blog-img-date-wrap mb-2">
                                            <div class="blog-img" style="height: 630px">
                                                <a href="{{ route('blog.details', ['id' => $blog->id]) }}"><img src="{{asset('/storage/'.$blog->image)}}" alt="{{$blog->title}}" style="height: 100%; width: unset;"></a>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <ul class="card-brand fw-bolder font-kyiv">
                                                    {{(new DateTime($blog->created_at))->format('d.m.Y')}}
                                                </ul>
                                            </div>
                                            <h1 class="font-kyiv fs-5 fw-bold mb-1 mt-0"><a href="{{ route('blog.details', ['id' => $blog->id]) }}">{{$blog->title}}</a></h1>
                                            <h2 class="blog-text mb-0">{{$blog->description}}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
            </div>
            <div class="col-12 mt-3 font-cormorant position-relative blog-categoryText">
                <h5 class="shadow-text-1 font-cormorant fw-bold">{{$category2->title}}</h5>
                <h5 class="shadow-text-2 font-cormorant fw-bold">{{$category2->title}}</h5>
            </div>
            <div class="col-12">
                <div class="row pt-5 d-xl">
                    <div class="col-xl-6 d-lg-none d-xl-block d-md-none d-sm-none d-none p-0">
                        @foreach($category2->news as $key => $blog)
                            <div class="h-100 w-100 px-2 {{ ($key + 1) != 1 ? 'd-xl-none' : '' }}">
                                <div class="blog-wrap mb-2" data-aos="fade-up" data-aos-delay="50">
                                    <div class="blog-img-date-wrap mb-2">
                                        <div class="blog-img" style="height: 630px">
                                            <a href="{{ route('blog.details', ['id' => $blog->id]) }}"><img src="{{asset('/storage/'.$blog->image)}}" alt="{{$blog->title}}" style="height: 100%; width: unset;"></a>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-meta">
                                            <ul class="card-brand fw-bolder font-kyiv">
                                                {{(new DateTime($blog->created_at))->format('d.m.Y')}}
                                            </ul>
                                        </div>
                                        <h1 class="font-kyiv fs-5 fw-bold mb-1 mt-0"><a href="{{ route('blog.details', ['id' => $blog->id]) }}">{{$blog->title}}</a></h1>
                                        <h2 class="blog-text mb-0">{{$blog->description}}</h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-12 col-xl-6 row">
                        @foreach($category2->news as $key => $blog)
                            <div class="col-xl-6 col-lg-4 col-md-6 px-2 {{ ($key + 1) < 2 ? ' d-xl-none' : '' }} {{ ($key + 1) == 6 ? ' d-xl-none' : '' }}">
                                <div class="blog-wrap mb-2" data-aos="fade-up" data-aos-delay="50">
                                    <div class="blog-img-date-wrap mb-2">
                                        <div class="blog-img">
                                            <a href="{{ route('blog.details', ['id' => $blog->id]) }}"><img src="{{asset('/storage/'.$blog->image)}}" alt="{{$blog->title}}"></a>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-meta">
                                            <ul class="card-brand fw-bolder font-kyiv">
                                                {{(new DateTime($blog->created_at))->format('d.m.Y')}}
                                            </ul>
                                        </div>
                                        <h1 class="font-kyiv fs-5 fw-bold mb-1 mt-0"><a href="{{ route('blog.details', ['id' => $blog->id]) }}">{{$blog->title}}</a></h1>
                                        <h2 class="blog-text mb-0">{{$blog->description}}</h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        document.addEventListener('livewire:load', function () {
            window.livewire.on('FormInfo', (event) => {
                console.log(event.text);
            });
        });
        function updateFileText(input) {
            var fileText = input.nextElementSibling;
            var files = input.files;
            var fileNames = [];
            for (var i = 0; i < files.length; i++) {
                fileNames.push(files[i].name);
            }
            fileText.textContent = fileNames.join(', ');
        }
        window.addEventListener('flashMessage', event => {
            const flashMessage = document.querySelector('.flash-message');
            flashMessage.text = event.detail.message;
            flashMessage.classList.remove('hiddenmsg');
            flashMessage.classList.add(event.detail.style);
            setTimeout(() => flashMessage.classList.add('hiddenmsg'), 7000);
        });
    </script>
@endpush
