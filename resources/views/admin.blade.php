<!DOCTYPE html>
<html lang="en" class="theme-4">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('individual/main-black-cut.png') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumen LUX | Admin</title>
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"/>
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet'
          type='text/css'/>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="{{ asset('dist/css/bootstrapicons-iconpicker.css') }}" rel="stylesheet">
    @yield('styles')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    {{--    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>--}}
</head>
<body class="py-5 md:py-0">


@include('sections.mobileMenu')
@include('sections.topMenu')
<div class="flex overflow-hidden">
    @include('sections.sidebar')
    <div class="content">
{{--<textarea id="default-editor">
  <p><em>Hello</em>, <span style="text-decoration: underline;"><strong>World!</strong></span></p>
</textarea>--}}

        @yield('content')
    </div>
</div>

<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
<script>
    let editor = new FroalaEditor('#editorfield');
    tinymce.init({
        selector: 'textarea#default-editor',
        plugins: 'code',
        toolbar: 'undo redo | formatselect | bold italic backcolor | ' +
            'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ' +
            '| removeformat | link image | code',
        promotion: false
    });
</script>
{{--<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('dist/js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1VDDWMRSTH"></script>
<script type="text/javascript" src="{{asset('dist/js/uploadfile.js')}}"></script>
@yield('script')
</body>
</html>
