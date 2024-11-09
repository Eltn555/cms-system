<header class="header-area header-responsive-padding">
    <div class="header-bottom sticky-bar stick">
        <div class="categoryBack w-100 position-absolute">
            </div>
        <div class="blurry-backgorund">
            <div class="blurry-content">
                    <div class="row align-items-center mx-1 mx-md-5">
                        <div class="col-lg-3 col-md-6 col-6 p-2 " style="z-index: 1">
                            <div class="logo">
                                <a href="/">
                                    <img class="logo-black" height="55px" src="{{ asset('logo-black.png') }}" alt="LumenLux">
                                    <img class="logo-white d-none" height="55px" src="{{ asset('logo-white.png') }}" alt="LumenLux">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block d-flex justify-content-center">
                            <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li>
                                            <h3 class="fs-6"><a style="line-height: 80px !important;" href="/">Магазин</a></h3>
                                        </li>
                                        <li class="">
                                            <h3 class="fs-6"><a class="onCategory" href="{{ route('front.category.index') }}">Каталог</a></h3>

                                                <ul class="megaCat mega-menu-style mega-menu-mrg-1 pt-0 px-0 rounded-1 category-hover row d-flex">
                                                    {{--Category lists--}}

                                                    @foreach ($categories as $category)
                                                        <li class="parent m-0 col-3 border-bottom pt-3 pb-2 ps-3 pe-0"><h3 class="fs-6"><a class="py-3 w-100 border-end d-flex align-items-center justify-content-between fw-semibold font-kyiv" href="{{ route('front.category.show', $category->slug) }}">{{ $category->title }} <svg class="{{$category->children->isEmpty() ? 'd-none' : ''}} category-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9 5L15 12L9 19" stroke="#232323" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                                </a></h3>
                                                            @if ($category->children->isNotEmpty())
                                                                <ul class="children h-0 overflow-hidden ">
                                                                    @foreach ($category->children as $child)
                                                                        <li class="mb-0 w-100"><h3 class="fs-6"><a class="py-2 w-100 d-flex align-items-center justify-content-between font-kyiv" href="{{ route('front.category.show', $child->slug) }}">• {{ $child->title }} <svg class="{{$child->children->isEmpty() ? 'd-none' : ''}} child-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M9 5L15 12L9 19" stroke="#232323" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                </svg>
                                                                                </a></h3>
                                                                            @if ($child->children->isNotEmpty())
                                                                                <ul class="grandChild h-0 overflow-hidden">
                                                                                    @foreach ($child->children as $grandchild)
                                                                                        <li class="mb-0 w-100"><h3 class="fs-6"><a class="py-2 w-100 d-flex align-items-center justify-content-between ps-4" href="{{ route('front.category.show', $grandchild->slug) }}">{{ $grandchild->title }}</a></h3>
                                                                                        </li>
                                                                                        <!-- Add more nested loops for additional generations if needed -->
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                        </li>
                                        <li><h3 class="fs-6"><a style="line-height: 80px !important;" href="{{route('about.index')}}">О нас</a></h3></li>
                                        <li><h3 class="fs-6"><a style="line-height: 80px !important;" href="{{route('blog.index')}}">Блог</a></h3></li>
                                        <li><h3 class="fs-6"><a style="line-height: 80px !important;" href="{{route('contact.index')}}">Контакты</a></h3></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="basketShop position-absolute p-0" style="top: 0; right: 0; height: 1px; width: 1px;"></div>
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="header-action-wrap">
                                <div class="d-flex d-md-flex d-lg-none d-xl-none d-sm-flex">
                                    @livewire('search-bar')
                                    <livewire:front.cart.cart-count/>
                                </div>
                                <div class="justify-content-end d-none d-md-none d-lg-flex d-xl-flex d-sm-none position-relative ">
                                    @livewire('search-bar')
                                    <livewire:front.cart.cart-count/>
                                    <livewire:front.wishlist.wishlist-count/>
                                    <div class="header-action-style" style="z-index: 1">
                                        @if(auth()->user())
                                            <a href="{{ route('front.profile.index') }}" title="Login Register">
                                                <svg class="white-icon d-none" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="9" r="3" stroke="white" stroke-width="1.5"/>
                                                    <circle cx="12" cy="12" r="10" stroke="white" stroke-width="1.5"/>
                                                    <path d="M17.9691 20C17.81 17.1085 16.9247 15 11.9999 15C7.07521 15 6.18991 17.1085 6.03076 20" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                                </svg>
                                                <svg class="dark-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="9" r="3" stroke="#232323" stroke-width="1.5"/>
                                                    <circle cx="12" cy="12" r="10" stroke="#232323" stroke-width="1.5"/>
                                                    <path d="M17.9692 20C17.8101 17.1085 16.9248 15 12 15C7.07527 15 6.18997 17.1085 6.03082 20" stroke="#232323" stroke-width="1.5" stroke-linecap="round"/>
                                                </svg>
                                            </a>
                                        @else
                                            <a onclick="showReg()" title="Login Register">
                                                <svg class="white-icon d-none" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="9" r="3" stroke="white" stroke-width="1.5"/>
                                                    <circle cx="12" cy="12" r="10" stroke="white" stroke-width="1.5"/>
                                                    <path d="M17.9691 20C17.81 17.1085 16.9247 15 11.9999 15C7.07521 15 6.18991 17.1085 6.03076 20" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                                </svg>
                                                <svg class="dark-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="9" r="3" stroke="#232323" stroke-width="1.5"/>
                                                    <circle cx="12" cy="12" r="10" stroke="#232323" stroke-width="1.5"/>
                                                    <path d="M17.9692 20C17.8101 17.1085 16.9248 15 12 15C7.07527 15 6.18997 17.1085 6.03082 20" stroke="#232323" stroke-width="1.5" stroke-linecap="round"/>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="header-action-style d-block d-lg-none">
                                    <a class="mobile-menu-active-button" href="#">
                                        <svg class="white-icon d-none" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.75 6C21.75 5.58578 21.4142 5.25 21 5.25H3C2.58576 5.25 2.25 5.58578 2.25 6C2.25 6.41424 2.58576 6.75 3 6.75H21C21.4142 6.75 21.75 6.41424 21.75 6Z" fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.75 18C21.75 17.5858 21.4142 17.25 21 17.25H3C2.58576 17.25 2.25 17.5858 2.25 18C2.25 18.4142 2.58576 18.75 3 18.75H21C21.4142 18.75 21.75 18.4142 21.75 18Z" fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.75 12C17.75 11.5858 17.4142 11.25 17 11.25H3.00002C2.58578 11.25 2.25002 11.5858 2.25002 12C2.25002 12.4142 2.58578 12.75 3.00002 12.75H17C17.4142 12.75 17.75 12.4142 17.75 12Z" fill="white"/>
                                        </svg>
                                        <svg class="dark-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.75 6C21.75 5.58578 21.4142 5.25 21 5.25H3C2.58576 5.25 2.25 5.58578 2.25 6C2.25 6.41424 2.58576 6.75 3 6.75H21C21.4142 6.75 21.75 6.41424 21.75 6Z" fill="#232323"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.75 18C21.75 17.5858 21.4142 17.25 21 17.25H3C2.58576 17.25 2.25 17.5858 2.25 18C2.25 18.4142 2.58576 18.75 3 18.75H21C21.4142 18.75 21.75 18.4142 21.75 18Z" fill="#232323"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.75 12C17.75 11.5858 17.4142 11.25 17 11.25H3.00002C2.58578 11.25 2.25002 11.5858 2.25002 12C2.25002 12.4142 2.58578 12.75 3.00002 12.75H17C17.4142 12.75 17.75 12.4142 17.75 12Z" fill="#232323"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</header>
<div class="off-canvas-active">
    <div class="pb-5 off-canvas-wrap position-relative">
        <div class="mb-20 font-cormorant position-relative row">
            <a class="off-canvas-close"><i class=" ti-close "></i></a>
            <div class="col-12">
                <h5 class="shadow-text-1 font-cormorant fw-bold" style="font-size: 40px !important;">Меню</h5>
            </div>
        </div>
        <div class="mobile-menu-wrap off-canvas-margin-padding-2 font-kyiv">
            <div id="mobile-menu" class="slinky-mobile-menu text-left">
                <ul>
                    <li>
                        <a style="line-height: 80px !important;" href="/">Магазин</a>
                    </li>
                    <li class="">
                        <a href="{{ route('front.category.index') }}">Каталог</a>
                        <ul class="mega-menu-style d mega-menu-mrg-1 p-4 rounded-1 category-hover">
                            @foreach ($categories as $category)
                                <li class="parent m-0 border-bottom p-1"><a class="fw-bolder py-3 w-100 d-flex align-items-center justify-content-between font-kyiv" href="{{ route('front.category.show', $category->slug) }}">{{ $category->title }}
                                    </a>
                                    @if ($category->children->isNotEmpty())
                                        <ul class="overflow-hidden ">
                                            <li class="mb-0 w-100"><a class="fw-bolder py-2 w-100 d-flex align-items-center justify-content-between font-kyiv" href="{{ route('front.category.show', $category->slug) }}">{{ $category->title }}
                                                </a>
                                            </li>
                                            @foreach ($category->children as $child)
                                                <li class="mb-0 w-100"><a class="py-2 w-100 d-flex align-items-center justify-content-between font-kyiv" href="{{ route('front.category.show', $child->slug) }}">• {{ $child->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a style="line-height: 80px !important;" href="{{route('about.index')}}">О нас</a></li>
                    <li><a style="line-height: 80px !important;" href="{{route('blog.index')}}">Блог</a></li>
                    <li><a style="line-height: 80px !important;" href="{{route('contact.index')}}">Контакты</a></li>
                </ul>
            </div>
        </div>
        <div class="language-currency-wrap language-currency-wrap-modify">
            <ul>
                <li class="d-flex mobile-icon">
                    <livewire:front.cart.cart-count/>
                    <a class="off-canvas-close cart-active position-relative ps-2">
                        <p class="ps-2 font-kyiv">Корзина</p>
                    </a>
                </li>
                <li class="d-flex mobile-icon">
                    <livewire:front.wishlist.wishlist-count/>
                    <a class="d-flex ps-2" href="{{route('front.wishlist.index')}}">
                        <p class="ps-2 font-kyiv">Пожеланий</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="pb-5 p-3 position-absolute bottom-0 end-0 start-0 single-input-item btn-hover">
            @if(auth()->user())
                <a href="{{ route('front.profile.index') }}">
                    <div class="p-2 bg-light d-flex align-items-center justify-content-center">
                        <svg class="dark-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="9" r="3" stroke="#232323" stroke-width="1.5"/>
                            <circle cx="12" cy="12" r="10" stroke="#232323" stroke-width="1.5"/>
                            <path d="M17.9692 20C17.8101 17.1085 16.9248 15 12 15C7.07527 15 6.18997 17.1085 6.03082 20" stroke="#232323" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <p class="ps-2 m-0 d-flex justify-content-center align-items-center">{{auth()->user()->name}}</p>
                    </div>
                </a>
                <button class="mt-2 w-100 check-btn sqr-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</button>
            @else
                <a onclick="showReg()" class="off-canvas-close d-block p-2 fw-bolder font-kyiv bg-light text-center mt-2 w-100 check-btn sqr-btn">Вход</a>
            @endif
        </div>
    </div>
</div>
<livewire:verification/>
