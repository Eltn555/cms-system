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
{{--                            <div class="border-bottom py-5 w-100 d-flex justify-content-center">--}}
{{--                                <div style="width:64px; height: 64px;" class="border-1 me-4 border overflow-hidden rounded-circle">--}}
{{--                                    <img src="{{asset('no_photo.jpg')}}" alt="{{$news->title}}" class="w-100 h-100">--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <h4 class="fw-semibold font-kyiv">{{$news->author->name}}</h4>--}}
{{--                                    <p class="card-brand">Профессиональный дизайнер люстр</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
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
            const fileInput = input;
            const fileTextSpan = document.querySelector('.file-text');
            const files = fileInput.files;
            const resizedFiles = [];

            if (files && files.length > 0) {
                Array.from(files).forEach((file) => {
                    if (file.type.startsWith('image/')) {
                        // Declare reader within the loop to ensure it's scoped properly
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const img = new Image();
                            img.onload = function () {
                                const canvas = document.createElement('canvas');
                                const ctx = canvas.getContext('2d');

                                const maxSize = 1000;
                                let width = img.width;
                                let height = img.height;

                                if (width > height) {
                                    if (width > maxSize) {
                                        height *= maxSize / width;
                                        width = maxSize;
                                    }
                                } else {
                                    if (height > maxSize) {
                                        width *= maxSize / height;
                                        height = maxSize;
                                    }
                                }

                                canvas.width = width;
                                canvas.height = height;
                                ctx.drawImage(img, 0, 0, width, height);

                                // Convert canvas to WebP
                                canvas.toBlob((blob) => {
                                    const resizedFile = new File([blob], file.name.replace(/\.[^/.]+$/, ".webp"), { type: 'image/webp' });
                                    resizedFiles.push(resizedFile);

                                    // Once all files are resized, you can send them to the backend
                                    if (resizedFiles.length === files.length) {
                                        uploadFiles(resizedFiles); // Your custom upload function
                                    }
                                    fileTextSpan.textContent = `${files.length} file(s) ready (compressed)`;
                                }, 'image/webp', 0.5); // Adjust quality as needed
                            };
                            img.src = e.target.result;
                        };
                        reader.readAsDataURL(file); // Start reading the file
                    }
                });
            }
        }

        function uploadFiles(files) {
            const formData = new FormData();
            files.forEach(file => formData.append('images[]', file));

            fetch('/upload-images', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Uploaded image IDs:', data.image_ids);
                    // Save IDs to a hidden input field or Livewire component
                    const hiddenInput = document.querySelector('#image-ids');
                    const imageIds = data.image_ids.join(',');
                    hiddenInput.value = imageIds;
                    Livewire.emit('updateImageIds', imageIds);
                })
                .catch(error => console.error('Error:', error));
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
