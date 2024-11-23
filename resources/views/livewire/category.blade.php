@section('title', $this->category->title ?? 'Магазин')
@section('description', $this->category->seo_description ?? 'Бра, споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет')
@section('keyword', $this->category ? ($this->category->seo_title.' '.$this->category->seo_description) : '')

@section('style')
    <style>
        .filter-mobile{
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            background-color: white;
            padding: 30px;
            z-index: 9999;
            transition: 400ms ease-out;
            overflow:hidden;
            min-width: 320px;
        }

        .filter-closed{
            min-width: 0;
            width: 0 !important;
            padding-right: 0;
            padding-left: 0;
        }
    </style>
@endsection
<div class="">
    <div class="modal fade show" id="notificationModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="false" style="z-index: 1050;">
        <div class="product-notify modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content rounded-0 shadow-lg">
                <div class="modal-body d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img id="modalImage" src="" alt="Notification" class="rounded rounded-1 me-2" style="width: 80px; height: 80px;">
                        <div style="height: 80px" class="ms-2 d-flex flex-column">
                            <p class="fs-5 fw-semibold mb-2">Товар добавлен в корзину</p>
                            <span id="modalTitle" style="font-size: 16px; color: #333;" class="fw-semibold"></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-end pe-2">
                        <a class="text-primary fs-6 fw-semibold" href="{{route('front.cartItems.index')}}">Прейти в корзину</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5 mt-5">
        <div class="mt-4 mb-20 font-cormorant position-relative">
            <h1 class="shadow-text-1 font-cormorant fw-bold">{{$this->category->title ?? 'Магазин'}}</h1>
            <h2 class="shadow-text-2 font-cormorant fw-bold">{{$this->category->title ?? 'Магазин'}}</h2>
        </div>
        <div class="py-2 row">
            <div class="pe-0 single-product-cart btn-hover text-center d-lg-none col-2">
                <a style="height: 45px" class="filter button w-100 py-2 text-dark d-flex justify-content-center align-items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.297 3H3.70316C3.31478 3 3 3.31476 3 3.70313C3 5.66117 3.8394 7.5305 5.30299 8.83142L8.38249 11.5684C8.91645 12.043 9.22271 12.725 9.22271 13.4395V20.2961C9.22271 20.8564 9.84897 21.1923 10.3158 20.881L14.4643 18.1156C14.6599 17.9851 14.7774 17.7657 14.7774 17.5306V13.4395C14.7774 12.725 15.0837 12.043 15.6176 11.5684L18.697 8.83142C20.1606 7.5305 21 5.66117 21 3.70313C21 3.31476 20.6852 3 20.297 3ZM17.7627 7.7803L14.6833 10.5174C13.8494 11.2587 13.3711 12.3237 13.3711 13.4394V17.1543L10.6289 18.9823V13.4395C10.6289 12.3237 10.1506 11.2587 9.31665 10.5174L6.23729 7.78044C5.25039 6.90304 4.62043 5.70086 4.45178 4.40612H19.5482C19.3796 5.70086 18.7497 6.90304 17.7627 7.7803Z" fill="#141B34"/>
                    </svg>
                </a>
            </div>
            <div class="search-wrap-2 col-8 col-lg-10">
                <div class="sidebar-widget mb-10 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <div class="search-wrap-2">
                        <form class="search-2-form" action="#">
                            <input placeholder="Поиск товаров, брендов" type="text" wire:model="search">
                            <button class="button-search"><i class=" ti-search "></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ps-0 single-product-cart btn-hover text-center col-lg-2 col-2">
                <a class="button search w-100 py-2 text-dark d-flex justify-content-center align-items-center" style="height: 45px">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11.5" cy="11.5" r="9.5" stroke="#232323" stroke-width="1.5"/>
                        <path d="M18.5 18.5L22 22" stroke="#232323" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="shop-area shop-page-responsive py-10">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="shop-topbar-wrapper">
{{--                        <div class="shop-topbar-left">--}}
{{--                            <div class="showing-item">--}}
{{--                                <span>Showing 1–12 of 60 results</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="shop-topbar-right">--}}
{{--                            <div class="shop-sorting-area">--}}
{{--                                <select class="nice-select nice-select-style-1" style="display: none;">--}}
{{--                                    <option>Default Sorting</option>--}}
{{--                                    <option>Sort by popularity</option>--}}
{{--                                    <option>Sort by average rating</option>--}}
{{--                                    <option>Sort by latest</option>--}}
{{--                                </select>--}}
{{--                                <div class="nice-select nice-select-style-1" tabindex="0"><span class="current">Default Sorting</span>--}}
{{--                                    <ul class="list">--}}
{{--                                        <li data-value="Default Sorting" class="option selected">Default Sorting</li>--}}
{{--                                        <li data-value="Sort by popularity" class="option">Sort by popularity</li>--}}
{{--                                        <li data-value="Sort by average rating" class="option">Sort by average rating--}}
{{--                                        </li>--}}
{{--                                        <li data-value="Sort by latest" class="option">Sort by latest</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="shop-view-mode nav" role="tablist">--}}
{{--                                <a class="active" href="#shop-1" data-bs-toggle="tab" aria-selected="true" role="tab"><i--}}
{{--                                        class=" ti-layout-grid3 "></i> </a>--}}
{{--                                <a href="#shop-2" data-bs-toggle="tab" class="" aria-selected="false" tabindex="-1"--}}
{{--                                   role="tab"><i class=" ti-view-list-alt "></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="shop-bottom-area">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active" role="tabpanel">
                                <div id="product-list" class="row">
                                    @foreach($products as $product)
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 align-self-stretch p-2">
                                            <livewire:front.component.product-card :product="$product" :key="$product->id" />
                                        </div>
                                    @endforeach
                                </div>
                                {{$products->links('pagination::default') }}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="d-none d-lg-block col-lg-3 mt-3">
                    <div class="sidebar-wrapper">
{{--                        <div class="sidebar-widget sidebar-widget-border mb-20 pb-35 aos-init aos-animate"--}}
{{--                             data-aos="fade-up" data-aos-delay="200">--}}
{{--                            <div class="sidebar-widget-title mb-20">--}}
{{--                                <h3>Filter By Price</h3>--}}
{{--                            </div>--}}
{{--                            <div class="price-filter">--}}
{{--                                <div id="slider-range"--}}
{{--                                     class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">--}}
{{--                                    <div class="ui-slider-range ui-corner-all ui-widget-header"--}}
{{--                                         style="left: 0%; width: 77.7778%;"></div>--}}
{{--                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"--}}
{{--                                          style="left: 0%;"></span><span tabindex="0"--}}
{{--                                                                         class="ui-slider-handle ui-corner-all ui-state-default"--}}
{{--                                                                         style="left: 77.7778%;"></span></div>--}}
{{--                                <div class="price-slider-amount">--}}
{{--                                    <div class="label-input">--}}
{{--                                        <label>Price:</label>--}}
{{--                                        <input wire:model="price" wire:change="setPrice($(this).val())" type="text" id="amount" name="price" placeholder="Add Your Price">--}}
{{--                                    </div>--}}
{{--                                    <button type="button">Filter</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="sidebar-widget sidebar-widget-border mb-40 pb-35 aos-init aos-animate"
                             data-aos="fade-up" data-aos-delay="200">

                            <!-- SIDEBAR CATEGORY LIST -->

                            @if($mainCategories)
                                <div class="sidebar-widget-title mb-25">
                                    <h2 class="fs-5">Категории</h2>
                                </div>
                                <div class="sidebar-list-style">
                                    <ul>
                                        @foreach($mainCategories as $categorMenu)
                                            <li wire:click="setCategory('{{$categorMenu->slug}}')" class="categoryList"><a
                                                    id="select-category-{{ $categorMenu->id }}" class="{{(isset($category) && $categorMenu->id == $category->id) ? 'text-warning fw-bolder' : ''}}">{{ $categorMenu->title }}
                                                    <span>{{ $categorMenu->products->count() }}</span></a>
                                            </li>
                                            <ul >
                                                @foreach($categorMenu->children as $categoryMini)
                                                    <li wire:click="setCategory('{{$categoryMini->slug}}')" class="bg-light categoryList"><a
                                                            id="select-category-{{ $categoryMini->id }}" class="{{(isset($category) && $categoryMini->id == $category->id) ? 'text-warning fw-bolder' : ''}}"> • {{ $categoryMini->title }}
                                                            <span>{{ $categoryMini->products->count() }}</span></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="sidebar-widget aos-init">
                            <div class="sidebar-widget-title mb-25">
                                <h3>Теги</h3>
                            </div>
                            <div class="sidebar-widget-tag">
                                @foreach($tags as $tag)
                                <a wire:click="setTag('{{$tag->id}}')">{{ $tag->title }}, </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="filter-mobile overflow-scroll filter-closed d-md-block d-lg-none">
        <a class="filClose off-canvas-close"><i class=" ti-close "></i></a>
        <div class="sidebar-wrapper">
            {{--                        <div class="sidebar-widget sidebar-widget-border mb-20 pb-35 aos-init aos-animate"--}}
            {{--                             data-aos="fade-up" data-aos-delay="200">--}}
            {{--                            <div class="sidebar-widget-title mb-20">--}}
            {{--                                <h3>Filter By Price</h3>--}}
            {{--                            </div>--}}
            {{--                            <div class="price-filter">--}}
            {{--                                <div id="slider-range"--}}
            {{--                                     class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">--}}
            {{--                                    <div class="ui-slider-range ui-corner-all ui-widget-header"--}}
            {{--                                         style="left: 0%; width: 77.7778%;"></div>--}}
            {{--                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"--}}
            {{--                                          style="left: 0%;"></span><span tabindex="0"--}}
            {{--                                                                         class="ui-slider-handle ui-corner-all ui-state-default"--}}
            {{--                                                                         style="left: 77.7778%;"></span></div>--}}
            {{--                                <div class="price-slider-amount">--}}
            {{--                                    <div class="label-input">--}}
            {{--                                        <label>Price:</label>--}}
            {{--                                        <input wire:model="price" wire:change="setPrice($(this).val())" type="text" id="amount" name="price" placeholder="Add Your Price">--}}
            {{--                                    </div>--}}
            {{--                                    <button type="button">Filter</button>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            <div class="sidebar-widget sidebar-widget-border mb-40 pb-35 aos-init aos-animate"
                 data-aos="fade-up" data-aos-delay="200">

                <!-- SIDEBAR CATEGORY LIST -->
                <div class="sidebar-widget-title mb-25">
                    <h3>Основные категории</h3>
                </div>

                <div class="sidebar-list-style mb-25">
                    <ul>
                        @foreach($mainCategories as $category)
                            <li wire:click="setCategory('{{$category->slug}}')" class="categoryList"><a
                                    id="select-category-{{ $category->id }}">{{ $category->title }}
                                    <span>{{ $category->products->count() }}</span></a></li>
                        @endforeach
                    </ul>
                </div>

                @if($categories !== null)
                    <div class="sidebar-widget-title mb-25">
                        <h3>Категории</h3>
                    </div>

                    <div class="sidebar-list-style">
                        <ul>
                            @foreach($mainCategories as $categorMenu)
                                <li wire:click="setCategory('{{$categorMenu->slug}}')" class="categoryList"><a
                                        id="select-category-{{ $categorMenu->id }}" class="{{(isset($category) && $categorMenu->id == $category->id) ? 'text-warning fw-bolder' : ''}}">{{ $categorMenu->title }}
                                        <span>{{ $categorMenu->products->count() }}</span></a>
                                </li>
                                <ul >
                                    @foreach($categorMenu->children as $categoryMini)
                                        <li wire:click="setCategory('{{$categoryMini->slug}}')" class="bg-light categoryList"><a
                                                id="select-category-{{ $categoryMini->id }}" class="{{(isset($category) && $categoryMini->id == $category->id) ? 'text-warning fw-bolder' : ''}}"> • {{ $categoryMini->title }}
                                                <span>{{ $categoryMini->products->count() }}</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="sidebar-widget aos-init">
                <div class="sidebar-widget-title mb-25">
                    <h3>Теги</h3>
                </div>
                <div class="sidebar-widget-tag">
                    @foreach($tags as $tag)
                        <a wire:click="setTag('{{$tag->id}}')">{{ $tag->title }}, </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.filClose').click(function() {
                $('.filter-mobile').addClass('filter-closed');
                $('.main-wrapper').removeClass('overlay-active-2');
            });
            $('.categoryList').click(function() {
                $('.filter-mobile').addClass('filter-closed');
                $('.main-wrapper').removeClass('overlay-active-2');
            });
            $('.filter').click(function() {
                $('.filter-mobile').removeClass('filter-closed');
                $('.main-wrapper').addClass('overlay-active-2');
            });
            $('.body-overlay-2').click(function() {
                $('.filter-mobile').addClass('filter-closed');
                $('.main-wrapper').removeClass('overlay-active-2');
            });
        });
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
                AOS.init();
                window.history.replaceState(null, null, event.detail.url);
            }, 100);
        });

        function toTop() {
            // Trigger a click event on the element with id #scrollUp
            document.getElementById('scrollUp').click();
        }

    </script>

@endpush
