@section('title')
    {{ $news->title }}
@endsection
<div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">Blog Details</h2>
            <ul data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">
                <li><a href="index.html">Home</a></li>
                <li><i class="ti-angle-right"></i></li>
                <li>Blog</li>
                <li><i class="ti-angle-right"></i></li>
                <li>{{ $news->title }}</li>
            </ul>
        </div>
    </div>
    <div class="breadcrumb-img-1 aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">
        <img src="assets/images/banner/breadcrumb-1.png" alt="">
    </div>
    <div class="breadcrumb-img-2 aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">
        <img src="assets/images/banner/breadcrumb-2.png" alt="">
    </div>
</div>

<div class="blog-details-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-wrapper">
                    <div class="blog-details-img-date-wrap mb-35 aos-init aos-animate" data-aos="fade-up"
                         data-aos-delay="200">
                        <div class="blog-details-img">
                            <img src="{{ asset('storage/' . $news->image) }}" alt="">
                        </div>
                        <div class="blog-details-date">
                            <h5>{{ $news->created_at->format('d') }} <span>{{ $news->created_at->format('M') }}</span>
                            </h5>
                        </div>
                    </div>
                    <div class="blog-meta-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <ul>
                            <li><a href="#">{{ $news->category->title }}</a>,</li>
                            <li>By:<a href="#"> Admin</a></li>
                        </ul>
                    </div>
                    <h1 data-aos="fade-up" data-aos-delay="200"
                        class="aos-init aos-animate">{{ $news->category->title }}</h1>
                    <p data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">{{ $news->description }}</p>

                    {!! html_entity_decode($news->content) !!}

                    {{--<blockquote class="blockquote-wrap aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="quote-img">
                            <img src="assets/images/icon-img/quote.png" alt="">
                        </div>
                        <h2>{{ $news->description }}</h2>
                        <h4>Jont utdo</h4>
                    </blockquote>
                    <p data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitatio ullamco laboris nisi ut aliquip ex ea commodo conse Duis aute irure dolor.</p>
                    <div class="blog-details-middle-img-wrap">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="blog-details-middle-img mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                    <img src="assets/images/blog/blog-details-2.png" alt="New newnew">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="blog-details-middle-img mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                                    <img src="assets/images/blog/blog-details-3.png" alt="asdfasdfsafsdf">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitatio ullamco laboris nisi ut aliquip ex ea commodo conse Duis aute irure dolor in reprehenderit in voluptate velit esse cillumlt dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa quiq officia deserunt mollit anim id est laborum. </p>
                    --}}
                    <div class="tag-social-wrap">
                        <div class="tag-wrap aos-init" data-aos="fade-up" data-aos-delay="200">
                            <span>Tags:</span>
                            <ul>
                                <li><a href="#">Furniture</a>,</li>
                                <li><a href="#">Electronic</a>,</li>
                                <li><a href="#">Fashion</a></li>
                            </ul>
                        </div>
                        <div class="social-comment-digit-wrap aos-init" data-aos="fade-up" data-aos-delay="400">
                            <div class="social-icon-style-2">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="comment-digit">
                                <a href="#">2 <i class="fa fa-comments"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="blog-author-wrap-2 aos-init" data-aos="fade-up" data-aos-delay="200">
                        <div class="blog-author-img-2">
                            <img src="assets/images/blog/blog-author-2.png" alt="">
                        </div>
                        <div class="blog-author-content-2">
                            <h2>Admin Name</h2>
                            <p>Lorem ipsum dolor sit amet, consecteg adipisicing elit sed do eius tempor incididunt ut
                                lab et dolore magna aliqua. Ut enim ad minikl veniam, quis nostrud exercitatio.</p>
                            <div class="social-icon-style-3">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-glide-g"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="blog-next-previous-post aos-init" data-aos="fade-up" data-aos-delay="200">
                        <div class="blog-prev-post-wrap">
                            <div class="blog-prev-post-icon">
                                <a href="#"><i class="fa fa-angle-left"></i></a>
                            </div>
                            <div class="blog-prev-post-content">
                                <h3><a href="#">Lorem ipsum dolor sit amet cons ectetur</a></h3>
                                <span>June 25, 2022</span>
                            </div>
                        </div>
                        <div class="blog-next-post-wrap">
                            <div class="blog-next-post-icon">
                                <a href="#"> <i class="fa fa-angle-right"></i> </a>
                            </div>
                            <div class="blog-next-post-content">
                                <h3><a href="#">Lorem ipsum dolor sit amet cons ectetur</a></h3>
                                <span>June 25, 2022</span>
                            </div>
                        </div>
                    </div>
                    <div class="blog-comment-wrapper">
                        <h4 class="blog-dec-title aos-init" data-aos="fade-up" data-aos-delay="200">Comments (02)</h4>
                        <div class="single-comment-wrapper single-comment-border aos-init" data-aos="fade-up"
                             data-aos-delay="400">
                            <div class="blog-comment-img">
                                <img src="assets/images/blog/blog-comment-1.png" alt="">
                            </div>
                            <div class="blog-comment-content">
                                <div class="comment-info-reply-wrap">
                                    <div class="comment-info">
                                        <span>October 14, 2022 </span>
                                        <h4>Anthony Stephens</h4>
                                    </div>
                                    <div class="comment-reply">
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consecteg adipisicing elit sed do eius tempor incididunt
                                    ut lab et dolore magna aliqua. Ut enim ad minikl veniam, quis nostrud
                                    exercitatio. </p>
                            </div>
                        </div>
                        <div class="single-comment-wrapper single-comment-ml aos-init" data-aos="fade-up"
                             data-aos-delay="600">
                            <div class="blog-comment-img">
                                <img src="assets/images/blog/blog-comment-2.png" alt="">
                            </div>
                            <div class="blog-comment-content">
                                <div class="comment-info-reply-wrap">
                                    <div class="comment-info">
                                        <span>October 14, 2022 </span>
                                        <h4>DX Joxova</h4>
                                    </div>
                                    <div class="comment-reply">
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodl tempor
                                    incididunt ut labore et dolore </p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-comment-form-wrap">
                        <div class="blog-comment-form-title">
                            <h2 data-aos="fade-up" data-aos-delay="200" class="aos-init">Leave a Reply</h2>
                            <p data-aos="fade-up" data-aos-delay="400" class="aos-init">Your email address will not be
                                published. please fill out this form.</p>
                        </div>
                        <div class="blog-comment-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-blog-comment-form aos-init" data-aos="fade-up"
                                             data-aos-delay="200">
                                            <input type="text" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-blog-comment-form aos-init" data-aos="fade-up"
                                             data-aos-delay="300">
                                            <input type="email" placeholder="Your Mail">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single-blog-comment-form aos-init" data-aos="fade-up"
                                             data-aos-delay="400">
                                            <input type="text" placeholder="Your Website">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single-blog-comment-form aos-init" data-aos="fade-up"
                                             data-aos-delay="500">
                                            <textarea placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single-blog-comment-checkbox aos-init" data-aos="fade-up"
                                             data-aos-delay="600">
                                            <input type="checkbox">
                                            <label>Save my name, email, and website in this browser for the next time I
                                                comment.</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="comment-submit-btn btn-hover aos-init" data-aos="fade-up"
                                             data-aos-delay="700">
                                            <button class="submit" type="submit">Post Comment <i
                                                    class=" ti-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-wrapper blog-sidebar-mt">
                    <div class="sidebar-widget mb-50 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="search-wrap-3">
                            <form class="search-3-form" action="#">
                                <input placeholder="Search*" type="text">
                                <button class="button-search"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-50 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="blog-author-content text-center">
                            <a href="blog-details.html"><img src="assets/images/blog/blog-author.png" alt=""></a>
                            <h2>Writer Name</h2>
                            <h4>Blog Writer</h4>
                            <div class="social-icon-style-1">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-glide-g"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-widget-title-2 mb-25">
                            <h3>Categories</h3>
                        </div>
                        <div class="sidebar-list-style-2">
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="">{{ $category->title }} ({{ $category->news->count() }})</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-widget-title-2 mb-30">
                            <h3>Latest Post</h3>
                        </div>
                        <div class="latest-post-wrap">

                            @foreach($blog as $item)
                            <div class="single-latest-post">
                                <div class="latest-post-img">
                                    <a href=""><img style="max-height: 82px" src="{{ asset('storage/' . $item->image) }}" alt=""></a>
                                </div>
                                <div class="latest-post-content">
                                    <span>{{ $item->created_at->format('d M Y') }}</span>
                                    <h4><a href="blog-details.html">{{ $item->title }}</a>
                                    </h4>
                                    <div class="latest-post-btn">
                                        <a href="blog-details.html">Continue Reading...</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar-widget mb-35 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-widget-title-2 mb-30">
                            <h3>Tags</h3>
                        </div>
                        <div class="sidebar-widget-tag-2">
                            <a href="#">Furniture</a>
                            <a href="#">Electronic</a>
                            <a href="#">Home Decore</a>
                            <a href="#">Design Home</a>
                            <a href="#">Furniture</a>
                        </div>
                    </div>
                    <div class="sidebar-widget aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-banner">
                            <a href="product-details.html"><img src="assets/images/banner/banner-29.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
