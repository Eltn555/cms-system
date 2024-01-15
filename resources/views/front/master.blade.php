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
</head>

<body>
<div class="main-wrapper main-wrapper-2">
    @include('front.header.index')
    @yield('content')
    @include('front.footer.index')
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
