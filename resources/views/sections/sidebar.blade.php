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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-briefcase-business"><path d="M12 12h.01"/><path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/><path d="M22 13a18.15 18.15 0 0 1-20 0"/><rect width="20" height="14" x="2" y="6" rx="2"/></svg>
                </div>
                <div class="side-menu__title">
                    Portfolio
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
                    <a href="{{ route('admin.portfolio.index') }}" class="side-menu">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-images"><path d="M18 22H4a2 2 0 0 1-2-2V6"/><path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18"/><circle cx="12" cy="8" r="2"/><rect width="16" height="16" x="6" y="2" rx="2"/></svg>
                        </div>
                        <div class="side-menu__title">Portfolios</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.portfolioCategories.index') }}" class="side-menu">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list"><path d="M3 12h.01"/><path d="M3 18h.01"/><path d="M3 6h.01"/><path d="M8 12h13"/><path d="M8 18h13"/><path d="M8 6h13"/></svg>
                        </div>
                        <div class="side-menu__title">Categories</div>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scroll-text"><path d="M15 12h-5"/><path d="M15 8h-5"/><path d="M19 17V5a2 2 0 0 0-2-2H4"/><path d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3"/></svg>
                        </div>
                        <div class="side-menu__title">News</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.categories.index') }}" class="side-menu">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list"><path d="M3 12h.01"/><path d="M3 18h.01"/><path d="M3 6h.01"/><path d="M8 12h13"/><path d="M8 18h13"/><path d="M8 6h13"/></svg>
                        </div>
                        <div class="side-menu__title">Categories</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon">
                    <i data-lucide="settings"></i>
                </div>
                <div class="side-menu__title">
                    Settings
                    <div class="side-menu__sub-icon ">
                        <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.calculator.index') }}" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-lucide="calculator"></i>
                        </div>
                        <div class="side-menu__title">Calculator</div>
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
