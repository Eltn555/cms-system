@section('title', $news->title)

@section('style')
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
    </style>
@endsection

<div>
    <div class="blog-details-area w-100 p-0">
        <div class="container px-0">
            <div class="row mt-5 pt-5 px-0 m-0">
                <div class="col-12 d-md-flex d-none mb-3"><a class="text-dark fw-semibold fs-5 me-1" href="/">Главная /</a>
                    <a class="text-dark fw-semibold fs-5 me-1" href="{{ route('blog.index') }}"> Блог /</a>
                    <a class="" href="{{ route('blog.details', ['id' => $news->id]) }}"><h1 class="text-muted fs-5">{{$news->title}}</h1></a>
                </div>
                <div class="col-12">
                    <div class="blog-details-wrapper overflow-hidden pb-5">
                        <div class="blog-details-img-date-wrap mb-35 aos-init aos-animate" data-aos="fade-up"
                             data-aos-delay="200">
                            <div class="blog-details-img">
                                <img src="{{ asset('storage/' . $news->image) }}" alt="">
                            </div>
                            <div class="border-bottom py-5 w-100 d-flex justify-content-center">
                                <div style="width:64px; height: 64px;" class="border-1 me-4 border overflow-hidden rounded-circle">
                                    <img src="{{asset('no_photo.jpg')}}" alt="{{$news->title}}" class="w-100 h-100">
                                </div>
                                <div>
                                    <h4 class="fw-semibold font-kyiv">{{$news->author->name}}</h4>
                                    <p class="card-brand">Профессиональный дизайнер люстр</p>
                                </div>
                            </div>
                            <div class="blog-details-date">
                                <h5>{{ $news->created_at->format('d') }} <span>{{ $news->created_at->format('M') }}</span>
                                </h5>
                            </div>
                        </div>

                        <h2 data-aos="fade-up" data-aos-delay="200" class="fs-4 aos-init aos-animate">{{ $news->description }}</h2>

                        {!! html_entity_decode($news->content) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-area pb-70">
        <div class="container">
            <div class="pt-3 mb-20 font-cormorant position-relative row" data-aos="fade-up" data-aos-delay="50">
                <div class="col-6">
                    <h5 class="shadow-text-1 font-cormorant fw-bold">Похожие <br>
                        блоги</h5>
                    <h5 class="shadow-text-2 font-cormorant fw-bold">Похожие <br>
                        блоги</h5>
                </div>
                <div class="col-6 justify-content-end align-items-end d-flex">
                    <div class="single-product-cart btn-hover ps-1 text-end">
                        <a href="https://lumenlux.uz/blog" class="p-2 ps-4 pe-4 text-dark bg-light border border-1 font-kyiv">Посмотреть все</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($latest as $last)
                    <div class="col-lg-3 col-md-6 px-2">
                        <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="50">
                            <div class="blog-img-date-wrap mb-25">
                                <div class="blog-img">
                                    <a class="w-100 h-100 overflow-hidden" href="{{ route('blog.details', ['id' => $last->id]) }}"><img class="h-100" src="{{ asset('storage/' . $last->image) }}" alt="$last->title"></a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul class="card-brand fw-bold font-kyiv">
                                        {{$last->created_at->format('d.m.Y')}}
                                    </ul>
                                </div>
                                <h3 class="font-kyiv fs-5 fw-bold"><a href="{{ route('blog.details', ['id' => $last->id]) }}">{{$last->title}}</a></h3>
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
</div>


@section('scripts')
    <script>
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
@endsection
