<footer class="footer-area">
    <div class="sidebar-cart-active">
        @php
        $sideBar = 'sidebar';
        @endphp
        @livewire('front.cart.cart-items', ['isSidebar' => 'sidebar'])
    </div>
    <div class="bg-gray-2">
        <div class="mx-5">
            <div class="footer-top pt-80 pb-35">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about mb-40">
                            <div class="footer-logo">
                                <a href="index.html"><img height="75px" src="{{ asset('logo-white.png') }}" alt="logo"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class=" footer-widget footer-list mb-40">
                            <h3 class="footer-title text-white font-kyiv">Шоурумы</h3>
                            <ul class="text-white font-kyiv">
                                <li><a class="text-white font-kyiv" href="https://yandex.com/maps/-/CDFGjUId">г. Ташкент, Ц5  (Напротив Респуликанской пожарки)</a></li>
                                <li><a class="text-white font-kyiv" href="https://yandex.com/maps/-/CDFGjYmD">Ул. Паркентская, дом 241</a></li>
                                <li><a class="text-white font-kyiv" href="https://yandex.com/maps/-/CDFc5IMG">г. Самарканд, Микрорайон (Напротив поликлиники)</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-widget-margin-2 footer-address mb-40">
                            <h3 class="footer-title text-white font-kyiv">Интернет магазин</h3>
                            <ul>
                                <li class="text-white font-kyiv"><a href="{{asset('/')}}" class="text-white font-kyiv">Главная</a></li>
                                <li class="text-white font-kyiv"><a href="{{ route('front.category.index') }}" class="text-white font-kyiv">Магазин</a></li>
                                <li class="text-white font-kyiv"><a href="{{asset('/calculator')}}" class="text-white font-kyiv">Калькулятор</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-widget-margin-2 footer-address mb-40">
                            <h3 class="footer-title text-white font-kyiv">О Люмен Люкс</h3>
                            <ul>
                                <li class="text-white font-kyiv"><a href="{{route('about.index')}}" class="text-white font-kyiv">О нас</a></li>
                                <li class="text-white font-kyiv"><a href="{{route('blog.index')}}" class="text-white font-kyiv">Блог</a></li>
                                <li class="text-white font-kyiv"><a href="{{route('contact.index')}}" class="text-white font-kyiv">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-list mb-40">
                            <h3 class="footer-title text-white font-kyiv">+998 555 005 444</h3>
                            <ul>
                                <li class="text-white font-kyiv"><a class="text-white font-kyiv" href="https://lumenlux.uz/profile">My Account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
