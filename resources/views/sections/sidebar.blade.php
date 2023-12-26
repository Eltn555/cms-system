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
            <a href="{{ route('admin.tags.index') }}" class="side-menu side-menu{{ request()->is("dairy") ? "--active" : "" }}">
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
            <a href="javascript:;.html"
               class="side-menu {{ request()->is("settings") || request()->is('settings/*')  ? "side-menu--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="align-justify"></i>
                </div>
                <div class="side-menu__title">
                    Blog
                    <div
                        class="side-menu__sub-icon {{ request()->is("settings") || request()->is('settings/*') ? "transform rotate-180" : "" }}">
                        <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
            <ul class="{{ request()->is("settings") || request()->is('settings/*')  ? "side-menu__sub-open" : "" }}">
                <li>
                    <a href=""
                       class="side-menu side-menu{{ request()->is("settings/apartments") || request()->is('settings/apartments/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">Categories</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-2.html"
                       class="side-menu side-menu{{ request()->is("parking") || request()->is('/parking/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">Items</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- END: Side Menu -->
