<!DOCTYPE html>
<html lang="en" class="theme-4">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('individual/main-black-cut.png') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Business House | Admin</title>
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"/>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="{{ asset('dist/css/bootstrapicons-iconpicker.css') }}" rel="stylesheet">
    @yield('styles')
    <style type="text/css">
        .backgroundimage{
            position: fixed;
            width: 60%;
            top: 50%;
            left: 55%;
            transform: translate(-50%, -50%);
            opacity:0.1;
            align-items: center;
            height: 70vh;
        }
        </style>
</head>
<body class="py-5 md:py-0">
@include('sections.mobileMenu')
@include('sections.topMenu')
<div class="flex overflow-hidden">
    @include('sections.sidebar')
    <div class="content">
        @yield('content')
    </div>
</div>
<script
    src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('dist/js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1VDDWMRSTH"></script>
<script>
    $('#main-search').on('keyup', function () {
        let pattern = $('#main-search').val()

        $.ajax({
            url: '{{ URL::to('/search') }}',
            data: {
                'data': pattern
            },
            type: 'GET',
            success: function (data) {
                console.log(data)
                let table = document.getElementById('search-result__content')
                table.innerHTML = data
            }
        })

    })
</script>
@yield('script')

</body>
</html>
