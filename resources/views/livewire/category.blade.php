@section('title', $this->category->title)
{{--@section('description', $this->category->seo_description)--}}
@section('keyword', $this->category->seo_title)
<div>
    <div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1"
         style="background-image:url({{ asset(($background != null) ? 'storage/'.$background->image : '') }}); background-position: center; background-size: cover ;">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2 id="main-title" data-aos="fade-up" data-aos-delay="200"
                    class="aos-init aos-animate">{{ $category->title }}</h2>
                <ul data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">
                    <li><a href="{{ route('front..index') }}">Home</a></li>
                    <li><i class="ti-angle-right"></i></li>
                    <li>{{ $this->category->title }}</li>
                </ul>
                <img src="{{asset(($icon != null) ? 'storage/'.$icon->image : '')}}" alt="{{$icon->alt ?? ''}}">
            </div>
        </div>
        {{--            <div class="breadcrumb-img-1 aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">--}}
        {{--                <img src="assets/images/banner/breadcrumb-1.png" alt="">--}}
        {{--            </div>--}}
        {{--            <div class="breadcrumb-img-2 aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">--}}
        {{--                <img src="assets/images/banner/breadcrumb-2.png" alt="">--}}
        {{--            </div>--}}
    </div>

    <div class="shop-area shop-page-responsive pt-100 pb-100">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="shop-topbar-wrapper mb-40">
                        <div class="shop-topbar-left">
                            <div class="showing-item">
                                <span>Showing 1–12 of 60 results</span>
                            </div>
                        </div>
                        <div class="shop-topbar-right">
                            <div class="shop-sorting-area">
                                <select class="nice-select nice-select-style-1" style="display: none;">
                                    <option>Default Sorting</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by latest</option>
                                </select>
                                <div class="nice-select nice-select-style-1" tabindex="0"><span class="current">Default Sorting</span>
                                    <ul class="list">
                                        <li data-value="Default Sorting" class="option selected">Default Sorting</li>
                                        <li data-value="Sort by popularity" class="option">Sort by popularity</li>
                                        <li data-value="Sort by average rating" class="option">Sort by average rating
                                        </li>
                                        <li data-value="Sort by latest" class="option">Sort by latest</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="shop-view-mode nav" role="tablist">
                                <a class="active" href="#shop-1" data-bs-toggle="tab" aria-selected="true" role="tab"><i
                                        class=" ti-layout-grid3 "></i> </a>
                                <a href="#shop-2" data-bs-toggle="tab" class="" aria-selected="false" tabindex="-1"
                                   role="tab"><i class=" ti-view-list-alt "></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="shop-bottom-area">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active" role="tabpanel">

                                <div id="product-list" class="row">
                                    @foreach($products as $product)

                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="product-wrap mb-35 aos-init aos-animate" data-aos="fade-up"
                                                 data-aos-delay="200">
                                                <div class="product-img img-zoom mb-25">
                                                    <a href="product-details.html">
                                                        <img src="{{asset('no_photo.jpg')}}" alt="">
                                                    </a>
                                                    <div class="product-badge badge-top badge-right badge-pink">
                                                        <span>-10%</span>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                            <a wire:click="addProduct({{$product->id}})"
                                                                    class="product-action-btn-1 {{ $this->check($product->id) ? 'back-color-primary' : '' }}" title="Wishlist">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        <button class="product-action-btn-1" title="Quick View"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal">
                                                            <i class="pe-7s-look"></i>
                                                        </button>
                                                    </div>
                                                    <div class="product-action-2-wrap">
                                                        <button class="product-action-btn-2" title="Add To Cart"><i
                                                                class="pe-7s-cart"></i> Add to cart
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">{{$product->title}}</a></h3>
                                                    <div class="product-price">
                                                        <span
                                                            class="{{($product->discount_price != null) ? 'old-price' : ''}}">{{$product->price}}</span>
                                                        <span class="new-price">{{$product->discount_price}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{--                                    {{$products->links('pagination::default')}}--}}
                            </div>
                            <div id="shop-2" class="tab-pane" role="tabpanel">
                                {{--                                    <div class="shop-list-wrap mb-30">--}}
                                {{--                                        <div class="row">--}}
                                {{--                                            <div class="col-lg-4 col-sm-5">--}}
                                {{--                                                <div class="product-list-img">--}}
                                {{--                                                    <a href="product-details.html">--}}
                                {{--                                                        <img src="assets/images/product/product-5.png" alt="Product Style">--}}
                                {{--                                                    </a>--}}
                                {{--                                                    <div class="product-list-badge badge-right badge-pink">--}}
                                {{--                                                        <span>-20%</span>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="product-list-quickview">--}}
                                {{--                                                        <button class="product-action-btn-2" title="Quick View"--}}
                                {{--                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
                                {{--                                                            <i class="pe-7s-look"></i>--}}
                                {{--                                                        </button>--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="col-lg-8 col-sm-7">--}}
                                {{--                                                <div class="shop-list-content">--}}
                                {{--                                                    <h3><a href="product-details.html">Interior moderno render</a></h3>--}}
                                {{--                                                    <div class="product-price">--}}
                                {{--                                                        <span class="old-price">$70.89 </span>--}}
                                {{--                                                        <span class="new-price">$55.25 </span>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="product-list-rating">--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod--}}
                                {{--                                                        tempor labor incididunt ut et dolore magna aliqua.</p>--}}
                                {{--                                                    <div class="product-list-action">--}}
                                {{--                                                        <button class="product-action-btn-3" title="Add to cart"><i--}}
                                {{--                                                                class="pe-7s-cart"></i></button>--}}
                                {{--                                                        <button class="product-action-btn-3" title="Wishlist"><i--}}
                                {{--                                                                class="pe-7s-like"></i></button>--}}
                                {{--                                                        <button class="product-action-btn-3" title="Compare"><i--}}
                                {{--                                                                class="pe-7s-shuffle"></i></button>--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="shop-list-wrap mb-30">--}}
                                {{--                                        <div class="row">--}}
                                {{--                                            <div class="col-lg-4 col-sm-5">--}}
                                {{--                                                <div class="product-list-img">--}}
                                {{--                                                    <a href="product-details.html">--}}
                                {{--                                                        <img src="assets/images/product/product-7.png" alt="Product Style">--}}
                                {{--                                                    </a>--}}
                                {{--                                                    <div class="product-list-quickview">--}}
                                {{--                                                        <button class="product-action-btn-2" title="Quick View"--}}
                                {{--                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
                                {{--                                                            <i class="pe-7s-look"></i>--}}
                                {{--                                                        </button>--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="col-lg-8 col-sm-7">--}}
                                {{--                                                <div class="shop-list-content">--}}
                                {{--                                                    <h3><a href="product-details.html">Round Standard Chair</a></h3>--}}
                                {{--                                                    <div class="product-price">--}}
                                {{--                                                        <span>$50.25 </span>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="product-list-rating">--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod--}}
                                {{--                                                        tempor labor incididunt ut et dolore magna aliqua.</p>--}}
                                {{--                                                    <div class="product-list-action">--}}
                                {{--                                                        <button class="product-action-btn-3" title="Add to cart"><i--}}
                                {{--                                                                class="pe-7s-cart"></i></button>--}}
                                {{--                                                        <button class="product-action-btn-3" title="Wishlist"><i--}}
                                {{--                                                                class="pe-7s-like"></i></button>--}}
                                {{--                                                        <button class="product-action-btn-3" title="Compare"><i--}}
                                {{--                                                                class="pe-7s-shuffle"></i></button>--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="shop-list-wrap mb-30">--}}
                                {{--                                        <div class="row">--}}
                                {{--                                            <div class="col-lg-4 col-sm-5">--}}
                                {{--                                                <div class="product-list-img">--}}
                                {{--                                                    <a href="product-details.html">--}}
                                {{--                                                        <img src="assets/images/product/product-4.png" alt="Product Style">--}}
                                {{--                                                    </a>--}}
                                {{--                                                    <div class="product-list-badge badge-right badge-pink">--}}
                                {{--                                                        <span>-10%</span>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="product-list-quickview">--}}
                                {{--                                                        <button class="product-action-btn-2" title="Quick View"--}}
                                {{--                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
                                {{--                                                            <i class="pe-7s-look"></i>--}}
                                {{--                                                        </button>--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="col-lg-8 col-sm-7">--}}
                                {{--                                                <div class="shop-list-content">--}}
                                {{--                                                    <h3><a href="product-details.html">Stylish Swing Chair</a></h3>--}}
                                {{--                                                    <div class="product-price">--}}
                                {{--                                                        <span class="old-price">$80.89 </span>--}}
                                {{--                                                        <span class="new-price">$60.25 </span>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="product-list-rating">--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod--}}
                                {{--                                                        tempor labor incididunt ut et dolore magna aliqua.</p>--}}
                                {{--                                                    <div class="product-list-action">--}}
                                {{--                                                        <button class="product-action-btn-3" title="Add to cart"><i--}}
                                {{--                                                                class="pe-7s-cart"></i></button>--}}
                                {{--                                                        <button class="product-action-btn-3" title="Wishlist"><i--}}
                                {{--                                                                class="pe-7s-like"></i></button>--}}
                                {{--                                                        <button class="product-action-btn-3" title="Compare"><i--}}
                                {{--                                                                class="pe-7s-shuffle"></i></button>--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="shop-list-wrap mb-30">--}}
                                {{--                                        <div class="row">--}}
                                {{--                                            <div class="col-lg-4 col-sm-5">--}}
                                {{--                                                <div class="product-list-img">--}}
                                {{--                                                    <a href="product-details.html">--}}
                                {{--                                                        <img src="assets/images/product/product-8.png" alt="Product Style">--}}
                                {{--                                                    </a>--}}
                                {{--                                                    <div class="product-list-badge badge-right badge-pink">--}}
                                {{--                                                        <span>-10%</span>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="product-list-quickview">--}}
                                {{--                                                        <button class="product-action-btn-2" title="Quick View"--}}
                                {{--                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
                                {{--                                                            <i class="pe-7s-look"></i>--}}
                                {{--                                                        </button>--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="col-lg-8 col-sm-7">--}}
                                {{--                                                <div class="shop-list-content">--}}
                                {{--                                                    <h3><a href="product-details.html">Modern Swivel Chair</a></h3>--}}
                                {{--                                                    <div class="product-price">--}}
                                {{--                                                        <span class="old-price">$45.89 </span>--}}
                                {{--                                                        <span class="new-price">$30.25 </span>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="product-list-rating">--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                        <i class=" ti-star"></i>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod--}}
                                {{--                                                        tempor labor incididunt ut et dolore magna aliqua.</p>--}}
                                {{--                                                    <div class="product-list-action">--}}
                                {{--                                                        <button class="product-action-btn-3" title="Add to cart"><i--}}
                                {{--                                                                class="pe-7s-cart"></i></button>--}}
                                {{--                                                        <button class="product-action-btn-3" title="Wishlist"><i--}}
                                {{--                                                                class="pe-7s-like"></i></button>--}}
                                {{--                                                        <button class="product-action-btn-3" title="Compare"><i--}}
                                {{--                                                                class="pe-7s-shuffle"></i></button>--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="pagination-style-1">--}}
                                {{--                                        <ul>--}}
                                {{--                                            <li><a class="active" href="#">1</a></li>--}}
                                {{--                                            <li><a href="#">2</a></li>--}}
                                {{--                                            <li><a href="#">3</a></li>--}}
                                {{--                                            <li><a class="next" href="#"><i class=" ti-angle-double-right "></i></a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3">
                    <div class="sidebar-wrapper">
                        <div class="sidebar-widget mb-40 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="search-wrap-2">
                                <form class="search-2-form" action="#">
                                    <input placeholder="Search*" type="text">
                                    <button class="button-search"><i class=" ti-search "></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget sidebar-widget-border mb-40 pb-35 aos-init aos-animate"
                             data-aos="fade-up" data-aos-delay="200">
                            <div class="sidebar-widget-title mb-30">
                                <h3>Filter By Price</h3>
                            </div>
                            <div class="price-filter">
                                <div id="slider-range"
                                     class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"
                                         style="left: 0%; width: 77.7778%;"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                          style="left: 0%;"></span><span tabindex="0"
                                                                         class="ui-slider-handle ui-corner-all ui-state-default"
                                                                         style="left: 77.7778%;"></span></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <label>Price:</label>
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price">
                                    </div>
                                    <button type="button">Filter</button>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget sidebar-widget-border mb-40 pb-35 aos-init aos-animate"
                             data-aos="fade-up" data-aos-delay="200">

                            <!-- SIDEBAR CATEGORY LIST -->

                            <div class="sidebar-widget-title mb-25">
                                <h3>Product Categories</h3>
                            </div>

                            <div class="sidebar-list-style">
                                <ul>
                                    @foreach($categories as $category)
                                        <li wire:click="setCategory('{{$category->slug}}')"><a
                                                id="select-category-{{ $category->id }}">{{ $category->title }}
                                                <span>{{ $category->products->count() }}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget aos-init" data-aos="fade-up" data-aos-delay="200">
                            <div class="sidebar-widget-title mb-25">
                                <h3>Tags</h3>
                            </div>
                            <div class="sidebar-widget-tag">
                                <a href="#">All, </a>
                                <a href="#">Clothing, </a>
                                <a href="#"> Kids, </a>
                                <a href="#">Accessories, </a>
                                <a href="#">Stationery, </a>
                                <a href="#">Homelife, </a>
                                <a href="#">Appliances, </a>
                                <a href="#">Clothing, </a>
                                <a href="#">Baby, </a>
                                <a href="#">Beauty </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        window.addEventListener('metaChanged', event => {
            const {description, keywords} = event.detail;
            // Update meta description
            document.querySelector('meta[name="description"]').setAttribute('content', description);
            // Update meta keywords
            document.querySelector('meta[name="keywords"]').setAttribute('content', keywords);
            document.title = event.detail.title;
        });
        window.addEventListener('urlChanged', event => {
            setTimeout(() => {
                window.history.pushState(null, null, event.detail.url);
            }, 1500); // 5000 milliseconds = 5 seconds
            AOS.init();
        });
    </script>
@endpush
