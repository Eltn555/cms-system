<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lumen LUX | @yield('title')</title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keyword')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="https://htmldemo.hasthemes.com/urdan/index.html"/>

    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Lumen LUX | @yield('title')"/>
    <meta property="og:url" content="https://htmldemo.hasthemes.com/urdan/index.html"/>
    <meta property="og:site_name" content="Lumen Lux"/>
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#"/>
    <meta property="og:description"
          content="@yield('description')"/>
    <!-- Add site Favicon -->

    <!-- All CSS is here
	============================================ -->
    <link rel="icon" type="image/png" href="{{asset('title.png')}}">
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
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5JV7Z7GS');</script>
    <!-- End Google Tag Manager -->

    @livewireStyles
    @stack('styles')
    @yield('style')
    @livewireScripts
    <script src='https://salebot.pro/js/salebot.js?v=1' charset='utf-8'></script>
    <script>  SaleBotPro.init({    onlineChatId: '2893'  });</script>
</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JV7Z7GS"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="main-wrapper main-wrapper-2">
    <x-header></x-header>
    @yield('content')
    <x-footer></x-footer>
</div>
<!-- All JS is here -->
<script src="{{asset('assets/js/plugins/aos.js')}}"></script>
<script src="{{asset('assets/js/vendor/modernizr-3.11.7.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/wow.js')}}"></script>
<script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
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

<script>
    window.addEventListener('wishlistUpdated', event => {
        document.querySelector('.wishlist-count').innerText = event.detail.count;
    });
    window.addEventListener('cartUpdate', event => {
        $('.cartItem'+event.detail.id).text(event.detail.count);
        if (event.detail.count == 0){
            $('.toPayment'+event.detail.id).addClass('d-none');
            $('.add__Cart'+event.detail.id).removeClass('d-none');
        } else {
            $('.toPayment'+event.detail.id).removeClass('d-none');
            $('.add__Cart'+event.detail.id).addClass('d-none');
        }
    });
    window.addEventListener('console', event => {
        console.log(event.detail.console);
    });
</script>
<!-- Main JS -->
@yield('scripts')
@stack('scripts')
<script>
    window.addEventListener('flashMessage', event => {
        const flashMessage = document.querySelector('.flash-message');
        flashMessage.text = event.detail.message;
        flashMessage.classList.remove('hiddenmsg');
        flashMessage.classList.add(event.detail.style);
        if (event.detail.style === 'bg-success') {
            modal = document.querySelector('.close');
            modal.click();
        }
        setTimeout(() => flashMessage.classList.add('hiddenmsg'), 2000);
    });
    function onlyNumber(input) {
        // Get the input value
        let inputValue = $(input).val();
        // Remove non-numeric characters
        inputValue = inputValue.replace(/\D/g, '');
        // Update the input value
        $(input).val(inputValue);
    }
    $('.tel').on('input', function() {
        // Get the input value
        let inputValue = $(this).val();
        // Remove non-numeric characters and '+' sign
        inputValue = inputValue.replace(/[^0-9+]/g, '');
        // Update the input value
        $(this).val(inputValue);
    });
    $(".onCategory").on('mouseenter', function () {
        $('.categoryBack').addClass('categoryBackActive');
        $('.megaCat').addClass('activeCategory');
    })
    $('.categoryBack').on('click', function () {
        $('.categoryBack').removeClass('categoryBackActive');
        $('.megaCat').removeClass('activeCategory');
    })
    $(".searchFocuser").click(function() {
        setTimeout(function(){ $('#InputSearch'). focus (); }, 200);
    });
        $('#InputSearch').keypress(function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                var searchUrl = $('#searchBtN').attr('href'); // Get the URL from the anchor tag
                window.location.href = searchUrl; // Navigate to the URL
            }
        });
    function showReg() {
        Livewire.emit('showReg');
    }
    function closeModal() {
        Livewire.emit('closeReg');
    }
    $(function(){
        $('.fly-to-basket').on('click', function () {
            var cart = $('.basketShop');
            var imgtodrag = $( '.'+$(this).attr('data-fly-to-basket') );
            if (imgtodrag.length) {
                var imgclone = imgtodrag.clone()
                    .offset({
                        top: imgtodrag.offset().top,
                        left: imgtodrag.offset().left
                    })
                    .css({
                        'opacity': '1',
                        'position': 'absolute',
                        'height': '150px',
                        'width': '150px',
                        'z-index': '100'
                    })
                    .appendTo($('body'))
                    .animate({
                        'top': cart.offset().top + 10,
                        'left': cart.offset().left - 100,
                        'width': 75,
                        'height': 75
                    }, 700, 'swing');

                setTimeout(function () {
                    cart.effect("shake", {
                        times: 2
                    }, 200);
                }, 1500);

                imgclone.animate({
                    'width': 0,
                    'height': 0
                }, function () {
                    $(this).detach()
                });
            }
        });
    });
</script>
</body>

</html>
