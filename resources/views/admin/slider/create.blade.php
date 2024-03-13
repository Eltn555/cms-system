@extends('admin')

@section('styles')
    <link rel="stylesheet" href="{{asset('dist/css/upload.css')}}"/>
@endsection
@section('content')

    <h2 class="intro-y text-lg font-medium my-10">Create New Slider Item</h2>


    {{--<div class="intro-y">
        <div class="slider-category-area">
            <div class="slider-fixed-image slider-height-4 bg-img slider-bg-color-4" style="background-image:url(assets/images/slider/slider-fix-img.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content-4 pt-145 text-center">
                                <h5 data-aos="fade-up" data-aos-delay="200">new arrival</h5>
                                <h1 data-aos="fade-up" data-aos-delay="400">Summer New <br>Collection</h1>
                                <div class="slider-btn btn-hover" data-aos="fade-up" data-aos-delay="600">
                                    <a href="product-details.html" class="btn btn-bg-white btn-text-black btn-border-radius btn-padding-inc hover-border-radius">
                                        Shop Now <i class=" ti-arrow-right "></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-area category-area-position">
                <div class="container">
                    <div class="category-slider-active-2 swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                    <div class="category-img-2">
                                        <a href="shop.html">
                                            <img class="category-normal-img" src="assets/images/category/category-6.png" alt="">
                                            <img class="category-hover-img" src="assets/images/category/category-hover-6.png" alt="icon">
                                        </a>
                                    </div>
                                    <div class="category-content-2">
                                        <h4><a href="shop.html">Wooden Sat</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="400">
                                    <div class="category-img-2">
                                        <a href="shop.html">
                                            <img class="category-normal-img" src="assets/images/category/category-7.png" alt="">
                                            <img class="category-hover-img" src="assets/images/category/category-hover-7.png" alt="icon">
                                        </a>
                                    </div>
                                    <div class="category-content-2">
                                        <h4><a href="shop.html">Office Cabin</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="600">
                                    <div class="category-img-2">
                                        <a href="shop.html">
                                            <img class="category-normal-img" src="assets/images/category/category-8.png" alt="">
                                            <img class="category-hover-img" src="assets/images/category/category-hover-8.png" alt="icon">
                                        </a>
                                    </div>
                                    <div class="category-content-2">
                                        <h4><a href="shop.html">Bedroom Light</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="800">
                                    <div class="category-img-2">
                                        <a href="shop.html">
                                            <img class="category-normal-img" src="assets/images/category/category-9.png" alt="">
                                            <img class="category-hover-img" src="assets/images/category/category-hover-9.png" alt="icon">
                                        </a>
                                    </div>
                                    <div class="category-content-2">
                                        <h4><a href="shop.html">Bathroom Kit</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="1000">
                                    <div class="category-img-2">
                                        <a href="shop.html">
                                            <img class="category-normal-img" src="assets/images/category/category-10.png" alt="">
                                            <img class="category-hover-img" src="assets/images/category/category-hover-10.png" alt="icon">
                                        </a>
                                    </div>
                                    <div class="category-content-2">
                                        <h4><a href="shop.html">Kitchen Kit</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-category-wrap-2 text-center">
                                    <div class="category-img-2">
                                        <a href="#">
                                            <img class="category-normal-img" src="assets/images/category/category-11.png" alt="">
                                            <img class="category-hover-img" src="assets/images/category/category-hover-11.png" alt="icon">
                                        </a>
                                    </div>
                                    <div class="category-content-2">
                                        <h4><a href="#">Computer Table</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-category-wrap-2 text-center">
                                    <div class="category-img-2">
                                        <a href="#">
                                            <img class="category-normal-img" src="assets/images/category/category-7.png" alt="">
                                            <img class="category-hover-img" src="assets/images/category/category-hover-7.png" alt="icon">
                                        </a>
                                    </div>
                                    <div class="category-content-2">
                                        <h4><a href="#">Office Cabin</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}

    <div class="intro-y box p-5 w-2/3">
        <form method="POST" action="{{ route('admin.sliders.store') }}" id="file-upload-form" class="uploader"
              enctype="multipart/form-data">
            @csrf
            <input id="file-upload" type="file" name="image" accept="image/*"/>
            <label for="file-upload" id="file-drag" class="uploadlabel my-5">
                <img id="file-image" src="#" alt="Preview" class="hidden">
                <div id="start">
                    <i class="fa fa-download" aria-hidden="true"></i>
                    <div>Select a file or drag here</div>
                    <div id="notimage" class="hidden">Please select an image</div>
                    <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                </div>
                <div id="response" class="hidden">
                    <div id="messages"></div>
                    <progress class="progress" id="file-progress" value="0">
                        <span>0</span>%
                    </progress>
                </div>
            </label>

            <div>
                <label for="crud-form-1" class="form-label">Title</label>
                <input id="crud-form-1" name="title" type="text" class="form-control w-full"
                       placeholder="New Title">
            </div>
            <div class="mt-3">
                <label for="crud-form-1" class="form-label">Text</label>
                <input id="crud-form-1" name="text" type="text" class="form-control w-full"
                       placeholder="Text description">
            </div>
            <div class="mt-3">
                <label for="crud-form-1" class="form-label">Button Text</label>
                <input id="crud-form-1" name="btn_text" type="text" class="form-control w-full"
                       placeholder="Click Me!">
            </div>
            <div class="mt-3">
                <label for="crud-form-1" class="form-label">Button Link</label>
                <input id="crud-form-1" name="btn_link" type="text" class="form-control w-full"
                       placeholder="https://www.google.com/">
            </div>

            <div class="text-right mt-5">
                <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                <button type="submit" class="btn btn-primary w-24">Save</button>
            </div>
        </form>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('dist/js/upload.js') }}"></script>
    <script type="text/javascript">
        let profile = document.getElementById("file-image");
        let inputFile = document.getElementById("file-upload");

        inputFile.onchange = function () {
            profile.src = URL.createObjectURL(inputFile.files[0]);
        }
    </script>
@endsection
