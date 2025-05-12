<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <ul>
        <li>
            <a href="" class="side-menu">
                <div class="side-menu__icon"><i data-lucide="home"></i></div>
                <div class="side-menu__title">Dashboard</div>
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
               class="side-menu side-menu{{ request()->is("admin/tags") ? "--active" : "" }}">
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
               class="side-menu side-menu{{ request()->is("admin/reviews") ? "--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="star"></i>
                </div>
                <div class="side-menu__title">Review</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon">
                    <i data-lucide="briefcase-business"></i>
                </div>
                <div class="side-menu__title">
                    Portfolio
                    <div class="side-menu__sub-icon ">
                        <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.portfolio.index') }}" class="side-menu side-menu{{ request()->is("admin/portfolio") ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <i data-lucide="images"></i>
                        </div>
                        <div class="side-menu__title">Portfolios</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.portfolioCategories.index') }}" class="side-menu side-menu{{ request()->is("admin/portfolioCategories") ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <i data-lucide="list"></i>
                        </div>
                        <div class="side-menu__title">Categories</div>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon">
                    <i data-lucide="newspaper"></i>
                </div>
                <div class="side-menu__title">
                    Blog
                    <div class="side-menu__sub-icon ">
                        <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.blog.index') }}" class="side-menu side-menu{{ request()->is("admin/blog") ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <i data-lucide="scroll-text"></i>
                        </div>
                        <div class="side-menu__title">News</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.categories.index') }}" class="side-menu side-menu{{ request()->is("admin/blog/categories") ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <i data-lucide="list"></i>
                        </div>
                        <div class="side-menu__title">Categories</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu side-menu{{ request()->is("admin/sliders") || request()->is("admin/banner") || request()->is("admin/calculator") ? "--open side-menu--active" : "" }}">
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
                    <a href="{{ route('admin.sliders.index') }}"
                       class="side-menu side-menu{{ request()->is("admin/sliders") ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <i data-lucide="images"></i>
                        </div>
                        <div class="side-menu__title">Sliders</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.banner.index') }}"
                       class="side-menu side-menu{{ request()->is("admin/banner") || request()->is("admin/banner/*") ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <i data-lucide="panels-top-left"></i>
                        </div>
                        <div class="side-menu__title">Banners</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.calculator.index') }}" class="side-menu side-menu{{ request()->is("admin/calculator") ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <i data-lucide="calculator"></i>
                        </div>
                        <div class="side-menu__title">Calculator</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.partners.index') }}"
                       class="side-menu side-menu{{ request()->is("admin/partners") || request()->is('admin/partners/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <i data-lucide="handshake"></i>
                        </div>
                        <div class="side-menu__title">Partners</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.account.index') }}"
               class="side-menu side-menu{{ request()->is("admin/account") || request()->is('admin/account/*') ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="users"></i></div>
                <div class="side-menu__title">Accounts</div>
            </a>
        </li>
    </ul>
</nav>
<!-- END: Side Menu -->
