<header class="header-area header-responsive-padding">
    <div class="header-bottom sticky-bar stick">
        <div class="blurry-backgorund">
            <div class="blurry-content">
                    <div class="row align-items-center mx-5">
                        <div class="col-lg-3 col-md-6 col-6 p-2 " style="z-index: 1">
                            <div class="logo">
                                <a href="/"><img height="75px" src="{{ asset('logo-black.png') }}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block d-flex justify-content-center">
                            <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li>
                                            <a style="line-height: 80px !important;" href="/">Магазин</a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('front.category.index') }}">Каталог</a>
                                            <ul class="mega-menu-style d mega-menu-mrg-1 p-4 rounded-1 category-hover">
                                                {{--Category lists--}}
                                                <li>
                                                    <ul class="d-flex">
                                                        @foreach($categoriesChild as $key => $category)
                                                            <li>
                                                                <a onmouseover="onHover({{$category->id}})" class="dropdown-title text-black">{{ $category->title }}</a>
                                                                <ul>
                                                                    @foreach($category->children as $childKey => $child)
                                                                        <li>
                                                                            <a onmouseover="onHover({{$child->id}})"
                                                                               href="{{ route('front.category.show', $child->slug) }}" class="text-black">{{ $child->title }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                            @endforeach
                                                            <li>
                                                                <ul>
                                                                    @foreach($categories as $category)
                                                                        <li>
                                                                            <a onmouseover="onHover({{$category->id}})"
                                                                               href="{{ route('front.category.show', $category->slug) }}" class="text-black">{{ $category->title }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                            {{--Category lists End--}}
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a style="line-height: 80px !important;" href="{{route('about.index')}}">О нас</a></li>
                                        <li><a style="line-height: 80px !important;" href="{{route('blog.index')}}">Блог</a></li>
                                        <li><a style="line-height: 80px !important;" href="{{route('contact.index')}}">Контакты</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="header-action-wrap">
                                <div class="justify-content-end d-none d-md-none d-lg-flex d-xl-flex d-sm-none">
                                    @livewire('search-bar')
                                    <livewire:front.cart.cart-count/>
                                    <livewire:front.wishlist.wishlist-count/>
                                    <div class="header-action-style" style="z-index: 1">
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
<div class="sidebar-cart-active">
    <div class="sidebar-cart-all">
        <a class="cart-close" href="#"><i class="pe-7s-close"></i></a>
        <div class="cart-content">
            <h3>Shopping Cart</h3>
            <ul>
                <li>
                    <div class="cart-img">
                        <a href="#"><img src="" alt=""></a>
                    </div>
                    <div class="cart-title">
                        <h4><a href="#">Stylish Swing Chair</a></h4>
                        <span> 1 × $49.00	</span>
                    </div>
                    <div class="cart-delete">
                        <a href="#">×</a>
                    </div>
                </li>
                <li>
                    <div class="cart-img">
                        <a href="#"><img src="" alt=""></a>
                    </div>
                    <div class="cart-title">
                        <h4><a href="#">Modern Chairs</a></h4>
                        <span> 1 × $49.00	</span>
                    </div>
                    <div class="cart-delete">
                        <a href="#">×</a>
                    </div>
                </li>
            </ul>
            <div class="cart-total">
                <h4>Subtotal: <span>$170.00</span></h4>
            </div>
            <div class="cart-btn btn-hover">
                <a class="theme-color" href="cart.html">view cart</a>
            </div>
            <div class="checkout-btn btn-hover">
                <a class="theme-color" href="checkout.html">checkout</a>
            </div>
        </div>
    </div>
</div>
<div class="off-canvas-active">
    <div class="off-canvas-wrap">
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
                            {{--Category lists--}}
                            @foreach($categoriesChild as $key => $category)
                                <li>
                                    <a onmouseover="onHover({{$category->id}})" class="dropdown-title text-black">{{ $category->title }}</a>
                                    <ul>
                                        @foreach($category->children as $childKey => $child)
                                            <li>
                                                <a onmouseover="onHover({{$child->id}})"
                                                   href="{{ route('front.category.show', $child->slug) }}" class="text-black">{{ $child->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                            @foreach($categories as $category)
                                <li>
                                    <a onmouseover="onHover({{$category->id}})"
                                       href="{{ route('front.category.show', $category->slug) }}" class="text-black">{{ $category->title }}</a>
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
                <li>
                    <a class="d-flex off-canvas-close cart-active position-relative" style="width: unset; height: unset;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.79424 12.0291C4.33141 9.34329 4.59999 8.00036 5.48746 7.13543C5.65149 6.97557 5.82894 6.8301 6.01786 6.70061C7.04004 6 8.40956 6 11.1486 6H12.8515C15.5906 6 16.9601 6 17.9823 6.70061C18.1712 6.8301 18.3486 6.97557 18.5127 7.13543C19.4001 8.00036 19.6687 9.34329 20.2059 12.0291C20.9771 15.8851 21.3627 17.8131 20.475 19.1793C20.3143 19.4267 20.1267 19.6555 19.9157 19.8616C18.7501 21 16.7839 21 12.8515 21H11.1486C7.21622 21 5.25004 21 4.08447 19.8616C3.87342 19.6555 3.68582 19.4267 3.5251 19.1793C2.63744 17.8131 3.02304 15.8851 3.79424 12.0291Z" stroke="#8C8C8C" stroke-width="1.5"/>
                            <path d="M9 6V5C9 3.34315 10.3431 2 12 2C13.6569 2 15 3.34315 15 5V6" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M9.1709 15C9.58273 16.1652 10.694 17 12.0002 17C13.3064 17 14.4177 16.1652 14.8295 15" stroke="#8C8C8C" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <p class="ps-2 font-kyiv">Корзина</p>
                    </a>
                </li>
                <li>
                    <a class="d-flex" href="{{route('front.wishlist.index')}}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.96173 19.126L9.42605 18.537L8.96173 19.126ZM12 5.71572L11.4596 6.23582C11.601 6.38272 11.7961 6.46572 12 6.46572C12.2039 6.46572 12.399 6.38272 12.5404 6.23582L12 5.71572ZM15.0383 19.126L15.5026 19.715L15.0383 19.126ZM9.42605 18.537C7.91039 17.3422 6.25307 16.1753 4.93829 14.6949C3.64922 13.2433 2.75 11.5496 2.75 9.35219H1.25C1.25 12.0177 2.3605 14.0511 3.81672 15.6909C5.24723 17.3017 7.07077 18.5903 8.49742 19.715L9.42605 18.537ZM2.75 9.35219C2.75 7.20132 3.96537 5.39761 5.62436 4.63928C7.23607 3.90256 9.40166 4.09766 11.4596 6.23582L12.5404 5.19562C10.0985 2.65861 7.26409 2.24047 5.00076 3.27505C2.78471 4.28801 1.25 6.64012 1.25 9.35219H2.75ZM8.49742 19.715C9.00965 20.1188 9.55954 20.5494 10.1168 20.875C10.6739 21.2005 11.3096 21.4651 12 21.4651V19.9651C11.6904 19.9651 11.3261 19.8443 10.8736 19.5799C10.4213 19.3156 9.95208 18.9517 9.42605 18.537L8.49742 19.715ZM15.5026 19.715C16.9292 18.5903 18.7528 17.3017 20.1833 15.6909C21.6395 14.0511 22.75 12.0177 22.75 9.35219H21.25C21.25 11.5496 20.3508 13.2433 19.0617 14.6949C17.7469 16.1753 16.0896 17.3422 14.574 18.537L15.5026 19.715ZM22.75 9.35219C22.75 6.64012 21.2153 4.28801 18.9992 3.27505C16.7359 2.24047 13.9015 2.65861 11.4596 5.19562L12.5404 6.23582C14.5983 4.09766 16.7639 3.90256 18.3756 4.63928C20.0346 5.39761 21.25 7.20132 21.25 9.35219H22.75ZM14.574 18.537C14.0479 18.9517 13.5787 19.3156 13.1264 19.5799C12.6739 19.8443 12.3096 19.9651 12 19.9651V21.4651C12.6904 21.4651 13.3261 21.2005 13.8832 20.875C14.4405 20.5494 14.9903 20.1188 15.5026 19.715L14.574 18.537Z" fill="#8C8C8C"/>
                        </svg>
                        <p class="ps-2 font-kyiv">Пожеланий</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
