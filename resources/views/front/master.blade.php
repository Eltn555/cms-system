<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lumen LUX</title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description"
          content="Urdan Minimal eCommerce Bootstrap 5 Template is a stunning eCommerce website template that is the best choice for any online store.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="https://htmldemo.hasthemes.com/urdan/index.html"/>

    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Urdan - Minimal eCommerce HTML Template"/>
    <meta property="og:url" content="https://htmldemo.hasthemes.com/urdan/index.html"/>
    <meta property="og:site_name" content="Urdan - Minimal eCommerce HTML Template"/>
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#"/>
    <meta property="og:description"
          content="Urdan Minimal eCommerce Bootstrap 5 Template is a stunning eCommerce website template that is the best choice for any online store."/>
    <!-- Add site Favicon -->
    <link rel="icon" href="{{asset('assets/images/favicon/cropped-favicon-32x32.png" sizes="32x32')}}"/>
    <link rel="icon" href="{{asset('assets/images/favicon/cropped-favicon-192x192.png" sizes="192x192')}}"/>
    <link rel="apple-touch-icon" href="{{asset('assets/images/favicon/cropped-favicon-180x180.png')}}"/>
    <meta name="msapplication-TileImage" content="{{asset('assets/images/favicon/cropped-favicon-270x270.png')}}"/>

    <!-- All CSS is here
	============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/vendor/pe-icon-7-stroke.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/vendor/themify-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/vendor/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/plugins/aos.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery-ui.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/plugins/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/plugins/easyzoom.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/plugins/slinky.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
    @livewireStyles

    @livewireScripts
</head>

<body>
<div class="main-wrapper main-wrapper-2">
    <x-header></x-header>
    @yield('content')
    <!-- mini cart start -->
    <div class="sidebar-cart-active">
        <div class="sidebar-cart-all">
            <a class="cart-close" href="#"><i class="pe-7s-close"></i></a>
            <div class="cart-content">
                <h3>Shopping Cart</h3>
                <ul>
                    <li>
                        <div class="cart-img">
                            <a href="#"><img src="assets/images/cart/cart-1.jpg" alt=""></a>
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
                            <a href="#"><img src="assets/images/cart/cart-2.jpg" alt=""></a>
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
    <x-footer></x-footer>


<div class="modal fade quickview-modal-style" id="login-register" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><i class=" ti-close "></i></a>
            </div>
            <div class="modal-body">
                <div class="login-register-wrapper m-5">
                    <div class="login-register-tab-list nav" role="tablist">
                        <a class="active" data-bs-toggle="tab" href="#lg1" aria-selected="true" role="tab">
                            <h4> login </h4>
                        </a>
                        <a data-bs-toggle="tab" href="#lg2" aria-selected="false" tabindex="-1" role="tab">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active" role="tabpanel">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <input type="text" name="email" placeholder="Username">
                                        <input type="password" name="password" placeholder="Password">
                                        <div class="login-toggle-btn">
                                            <input type="checkbox">
                                            <label>Remember me</label>
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                        <div class="button-box btn-hover">
                                            <button type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane" role="tabpanel">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        <input type="text" name="user-name" placeholder="Username">
                                        <input type="password" name="user-password" placeholder="Password">
                                        <input name="user-email" placeholder="Email" type="email">
                                        <div class="button-box btn-hover">
                                            <button type="submit">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- All JS is here -->
<script src="{{asset('assets/js/vendor/modernizr-3.11.7.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/wow.js')}}"></script>
<script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('assets/js/plugins/aos.js')}}"></script>
<script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/swiper.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-ui-touch-punch.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.counterup.js')}}"></script>
<script src="{{asset('assets/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/easyzoom.js')}}"></script>
<script src="{{asset('assets/js/plugins/slinky.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/ajax-mail.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
@yield('scripts')
</body>

</html>
