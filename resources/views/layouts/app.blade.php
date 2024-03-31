<!DOCTYPE html>
<html class="theme-4">
<head>
    <meta charset="utf-8">
    <link href="{{asset('individual/main-black-cut.png')}}" rel="shortcut icon">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"/>
    <title>Lumen LUX</title>
    @yield('styles')
</head>
<body class="login">
@yield('content')
<scripts src="{{asset('dist/js/app.js')}}"></scripts>
@yield('scripts')
</body>
</html>
