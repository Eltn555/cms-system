<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <ul>
        <li>
            <a href="" class="side-menu side-menu{{--{{ request()->is("admin/products") ? "--active" : "" }}--}}">
                <div class="side-menu__icon"><i data-lucide="home"></i></div>
                <div class="side-menu__title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.sliders.index') }}"
               class="side-menu side-menu{{ request()->is("admin/sliders") ? "--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="monitor"></i>
                </div>
                <div class="side-menu__title">Sliders</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.banner.index') }}"
               class="side-menu side-menu{{ request()->is("admin/banner") || request()->is("admin/banner/*") ? "--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="monitor"></i>
                </div>
                <div class="side-menu__title">Banners</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.index') }}"
               class="side-menu side-menu{{ request()->is("admin/products") ? "--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="shopping-cart"></i>
                </div>
                <div class="side-menu__title">Products</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.categories.index') }}"
               class="side-menu side-menu{{ request()->is("admin/categories") ? "--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="indent"></i>
                </div>
                <div class="side-menu__title">Categories</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.tags.index') }}"
               class="side-menu side-menu{{ request()->is("dairy") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="tag"></i></div>
                <div class="side-menu__title">Tags</div>
            </a>
        </li>
        <li>
            <a href=""
               class="side-menu side-menu{{ request()->is("clients") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="users"></i></div>
                <div class="side-menu__title">Sales</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.reviews.index') }}"
               class="side-menu side-menu{{ request()->is("safe") ? "--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="star"></i>
                </div>
                <div class="side-menu__title">Review</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="shopping-bag" data-lucide="shopping-bag" class="lucide lucide-shopping-bag">
                        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 01-8 0"></path>
                    </svg>
                </div>
                <div class="side-menu__title">
                    Blog
                    <div class="side-menu__sub-icon ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.blog.index') }}" class="side-menu">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">News</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.categories.index') }}" class="side-menu">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Categories</div>
                    </a>
                </li>
            </ul>
        </li>


        <li>
            <a href="{{ route('admin.partners.index') }}"
               class="side-menu side-menu{{ request()->is("parking") || request()->is('/parking/*') ? "--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="users"></i>
                </div>
                <div class="side-menu__title">Partners</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.account.index') }}"
               class="side-menu side-menu{{ request()->is("account") || request()->is('account/*') ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="users"></i></div>
                <div class="side-menu__title">Accounts</div>
            </a>
        </li>
    </ul>
</nav>
<!-- END: Side Menu -->
