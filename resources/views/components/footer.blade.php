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
                                <a href="/"><img height="75px" src="{{ asset('logo-white.png') }}" alt="LumenLux"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class=" footer-widget footer-list mb-40">
                            <h3 class="footer-title text-white font-kyiv">Шоурумы</h3>
                            <ul class="text-white font-kyiv">
                                <li><a class="text-white font-kyiv" href="https://yandex.com/maps/-/CDFGjUId">г. Ташкент, Ц5  (Напротив Республиканской пожарки)</a></li>
                                <li><a class="text-white font-kyiv" href="https://yandex.com/maps/-/CDV9z2jh">Ул. Паркентская, дом 241</a></li>
                                <li><a class="text-white font-kyiv" href="https://yandex.com/maps/-/CDV97I1L">г. Самарканд, Микрорайон (Напротив поликлиники)</a></li>
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
                            <h3 class="footer-title text-white font-kyiv"><a href="tel:+998555005444" style="color: #fff">+998 555 005 444</a></h3>
                            <ul>
                                <div style="display: flex;" class="mt-5 p-0 m-0 infoLink">
                                    <div style="width: 10%;" class="p-0 me-1">
                                        <a href="https://www.instagram.com/lumenlux.uz/" class="p-1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.666 2.66675H7.33268C4.76625 2.66675 2.66602 4.76605 2.66602 7.33342V16.6667C2.66602 19.2332 4.76625 21.3334 7.33268 21.3334H16.666C19.2325 21.3334 21.3327 19.2332 21.3327 16.6667V7.33342C21.3327 4.76605 19.2325 2.66675 16.666 2.66675ZM11.9994 15.8889C9.85136 15.8889 8.11046 14.1473 8.11046 12.0002C8.11046 9.85209 9.85136 8.11119 11.9994 8.11119C14.1466 8.11119 15.8884 9.85209 15.8884 12.0002C15.8884 14.1473 14.1466 15.8889 11.9994 15.8889ZM15.8882 6.94453C15.8882 7.58876 16.41 8.11119 17.0549 8.11119C17.6998 8.11119 18.2216 7.58876 18.2216 6.94453C18.2216 6.30029 17.6998 5.77786 17.0549 5.77786C16.41 5.77786 15.8882 6.30029 15.8882 6.94453Z" fill="#F8B301"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div style="width: 10%" class="p-0 ps-1">
                                        <a href="https://www.facebook.com/lumenluxuz/" class="p-1"><svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.48173 7.41675V4.94453C7.48173 4.45179 7.90922 4.02786 8.46244 4.02786H10.9238C11.2756 4.02786 11.5841 3.75413 11.5841 3.38897V1.05564C11.5841 0.690479 11.2756 0.416748 10.9238 0.416748H8.46244C5.84949 0.416748 3.69985 2.43501 3.69985 4.94453V7.41675H1.0782C0.726439 7.41675 0.417969 7.69048 0.417969 8.05564V10.389C0.417969 10.7541 0.726439 11.0279 1.0782 11.0279H3.69985V18.9445C3.69985 19.3097 4.00832 19.5834 4.36009 19.5834H6.8215C7.17326 19.5834 7.48173 19.3097 7.48173 18.9445V11.0279H10.1034C10.3794 11.0279 10.6344 10.8596 10.7286 10.5959L10.7289 10.5948L11.5492 8.26194C11.5493 8.26186 11.5493 8.26177 11.5493 8.26169L11.5494 8.26146L11.3136 8.17853C11.3554 8.0603 11.3341 7.92964 11.257 7.82775L7.48173 7.41675Z" fill="#F8B301" stroke="#F8B301" stroke-width="0.5"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div style="width: 10%" class="p-0">
                                        <a href="https://t.me/lumen_lux_light" class="p-1">
                                            <img id="image0_2361_14441" width="18.67" height="18.67" src="{{ asset('telegram.png') }}">
                                        </a>
                                    </div>
                                    <div style="width: 10%" class="p-0">
                                        <a href="tel:+998555005444" class="p-1"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.666 3C13.666 3 15.866 3.2 18.666 6C21.466 8.8 21.666 11 21.666 11" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round"/>
                                                <path d="M13.873 6.53564C13.873 6.53564 14.863 6.81849 16.3479 8.30341C17.8328 9.78834 18.1157 10.7783 18.1157 10.7783" stroke="#F8B301" stroke-width="1.5" stroke-linecap="round"/>
                                                <path d="M9.70361 6.31617L10.3526 7.4791C10.9383 8.52858 10.7032 9.90532 9.78073 10.8278C9.78072 10.8278 9.78073 10.8278 9.78072 10.8278C9.78061 10.8279 8.6619 11.9468 10.6905 13.9755C12.7185 16.0035 13.8374 14.8861 13.8382 14.8853C13.8382 14.8853 13.8382 14.8853 13.8383 14.8853C14.7607 13.9628 16.1374 13.7277 17.1869 14.3134L18.3498 14.9624C19.9346 15.8468 20.1217 18.0692 18.7288 19.4622C17.8918 20.2992 16.8664 20.9505 15.7329 20.9934C13.8248 21.0658 10.5843 20.5829 7.33372 17.3323C4.08314 14.0817 3.60023 10.8412 3.67257 8.93309C3.71554 7.7996 4.36682 6.77423 5.20382 5.93723C6.59677 4.54428 8.81919 4.73144 9.70361 6.31617Z" fill="#F8B301"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
