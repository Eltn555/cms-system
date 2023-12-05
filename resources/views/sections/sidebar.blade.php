<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <ul>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="{{ route('products.index') }}" class="side-menu side-menu{{ request()->is("admin/products") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="cart"></i></div>
                <div class="side-menu__title">Продукты</div>
            </a>
        </li>
        <li>
            <a href="" class="side-menu side-menu{{ request()->is("dairy") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="edit"></i></div>
                <div class="side-menu__title">Авто</div>
            </a>
        </li>
        <li>
            <a href=""
               class="side-menu side-menu{{ request()->is("clients") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="users"></i></div>
                <div class="side-menu__title">Клиенты</div>
            </a>
        </li>
        <li>
            <a href=""
               class="side-menu side-menu{{ request()->is("safe") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
                <div class="side-menu__title">Сейф</div>
            </a>
        </li>
        <li>
            <a href=""
               class="side-menu side-menu{{ request()->is("articles") || request()->is("articles/*") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide=""></i></div>
                <div class="side-menu__title">Статьи</div>
            </a>
        </li>
        <li>
            <a href=""
               class="side-menu side-menu{{ request()->is("payments") || request()->is("payments/*") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="dollar-sign"></i></div>
                <div class="side-menu__title">Оплаты</div>
            </a>
        </li>
        <li>
            <a href=""
               class="side-menu side-menu{{ request()->is("report") || request()->is("report/*") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="dollar-sign"></i></div>
                <div class="side-menu__title">Отчеты</div>
            </a>
        </li>
        <li>
            <a href="javascript:;.html"
               class="side-menu {{ request()->is("settings") || request()->is('settings/*')  ? "side-menu--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="align-justify"></i>
                </div>
                <div class="side-menu__title">
                    Настройки
                    <div class="side-menu__sub-icon {{ request()->is("settings") || request()->is('settings/*') ? "transform rotate-180" : "" }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </div>
            </a>
            <ul class="{{ request()->is("settings") || request()->is('settings/*')  ? "side-menu__sub-open" : "" }}">
                <li>
                    <a href=""
                       class="side-menu side-menu{{ request()->is("settings/apartments") || request()->is('settings/apartments/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Квартиры</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-2.html"
                       class="side-menu side-menu{{ request()->is("parking") || request()->is('/parking/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title"> Парковка</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-3.html"
                       class="side-menu side-menu{{ request()->is("commercial") || request()->is('/commercial/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Коммерческий</div>
                    </a>
                </li>
                <li>
                    <a href=""
                       class="side-menu side-menu{{ request()->is("commercial") || request()->is('/commercial/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Файлы</div>
                    </a>
                </li>
                <li>
                    <a href=""
                       class="side-menu side-menu{{ request()->is("commercial") || request()->is('/commercial/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Пользователь</div>
                    </a>
                </li>
                <li>
                    <a href=""
                       class="side-menu side-menu{{ request()->is("settings") || request()->is('/settings/info') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">О компании</div>
                    </a>
                </li>
                <li>
                    <a href=""
                       class="side-menu side-menu{{ request()->is("settings") || request()->is('/settings/report') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Отчёты</div>
                    </a>
                </li>
            </ul>
        </li>
        {{--<li>
            <a href="side-menu-light-inbox.html" class="side-menu">
                <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
                <div class="side-menu__title"> Clients</div>
            </a>
        </li>--}}

    </ul>
</nav>
<!-- END: Side Menu -->
