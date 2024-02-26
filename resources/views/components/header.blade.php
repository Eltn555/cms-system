<header class="header-area header-responsive-padding">
    <div class="header-top d-none d-lg-block bg-gray">
        {{--        <div class="container">--}}
        {{--            <div class="row align-items-center">--}}
        {{--                <div class="col-lg-6 col-6">--}}
        {{--                    <div class="welcome-text">--}}
        {{--                        <p>Default Welcome Msg! </p>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="col-lg-6 col-6">--}}
        {{--                    <div class="language-currency-wrap">--}}
        {{--                        <div class="currency-wrap border-style">--}}
        {{--                            <a class="currency-active" href="#">$ Dollar (US) <i class=" ti-angle-down "></i></a>--}}
        {{--                            <div class="currency-dropdown">--}}
        {{--                                <ul>--}}
        {{--                                    <li><a href="#">Taka (BDT) </a></li>--}}
        {{--                                    <li><a href="#">Riyal (SAR) </a></li>--}}
        {{--                                    <li><a href="#">Rupee (INR) </a></li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="language-wrap">--}}
        {{--                            <a class="language-active" href="#"><img src="assets/images/icon-img/flag.png" alt=""> English <i class=" ti-angle-down "></i></a>--}}
        {{--                            <div class="language-dropdown">--}}
        {{--                                <ul>--}}
        {{--                                    <li><a href="#"><img src="assets/images/icon-img/flag.png" alt="">English </a></li>--}}
        {{--                                    <li><a href="#"><img src="assets/images/icon-img/spanish.png" alt="">Spanish</a></li>--}}
        {{--                                    <li><a href="#"><img src="assets/images/icon-img/arabic.png" alt="">Arabic </a></li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
    <div class="header-bottom sticky-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 col-6 p-2">
                    <div class="logo">
                        <a href="#"><img height="75px" src="{{ asset('logo-black.png') }}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block d-flex justify-content-center">
                    <div class="main-menu text-center">
                        <nav>
                            <ul>
                                <li>
                                    <a style="line-height: 80px !important;" href="/">HOME</a>
                                </li>
                                <li>
                                    <a>CATEGORIES</a>
                                    <ul class="mega-menu-style d mega-menu-mrg-1">
                                        <li>
                                            <ul>
                                                <li>
                                                    <ul>
                                                        @foreach($categories as $category)
                                                            <li><a onmouseover="onHover({{$category->id}})"
                                                                   href="{{ route('front.category.show', $category->slug) }}">{{ $category->title }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li id="categoryImages">
                                                    <a>@foreach($categories as $key => $category)
                                                            @if(!$category->images->isEmpty())
                                                                <img id="categoryImage-{{$category->id}}"
                                                                     style="max-width: 288px"
                                                                     class="{{ $key === 0 ? 'd-block' : 'd-none' }}"
                                                                     src="{{ asset('storage/' . $category->images[0]->image) ?? ''}}"
                                                                     alt="">
                                                            @else
                                                            @endif
                                                        @endforeach
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a style="line-height: 80px !important;" href="{{route('blog.index')}}">BLOG</a>
                                </li>
                                <li><a style="line-height: 80px !important;" href="about-us.html">ABOUT</a></li>
                                <li><a style="line-height: 80px !important;" href="{{route('contact.index')}}">CONTACT
                                        US</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="header-action-wrap">
                        @livewire('search-bar')
                        <div class="header-action-style header-action-cart">
                            <a class="cart-active" href="#"><i class="pe-7s-shopbag"></i>
                                <span class="product-count bg-black">01</span>
                            </a>
                        </div>
                        <div class="header-action-style header-action-cart">
                            <a class="" title="Wishlist"
                               href="@if(auth()->user()){{route('front.wishlist.index')}}@endif"><i
                                    class="pe-7s-like"></i>
                                @if(auth()->user())
                                    <span class="wishlist-count bg-black"><livewire:front.wishlist.wishlist-count/></span>
                                @endif
                            </a>
                        </div>
                        <div class="header-action-style d-block d-lg-none">
                            <a class="mobile-menu-active-button" href="#"><i class="pe-7s-menu"></i></a>
                        </div>
                        <div class="header-action-style">
                            <a title="Login Register" data-bs-toggle="modal" data-bs-target="#login-register"><i
                                    class="pe-7s-user"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
