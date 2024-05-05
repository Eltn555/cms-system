<!DOCTYPE html>
<html lang="en" class="theme-4">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumen LUX | Admin</title>
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"/>
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">--}}
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    @yield('styles')
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
<script>
    $(document).ready(function() {
        $('#main-search').on("keyup", function(e) {
            var query = $('#main-search').val();
            $.ajax({
                type: 'GET',
                url: '/admin/search',
                data: { query: query },
                success: function(response) {
                    var searchResultContent = $('#search-result__content');
                    searchResultContent.empty();

                    // Check if there are any results
                    if (response.users.length || response.products.length || response.categories.length || response.tags.length) {
                        // Iterate over products
                        if (response.products.length) {
                            var productsHtml = '<h3 class="text-lg font-semibold">Products</h3>';
                            productsHtml += '<div class="grid grid-cols-3 gap-4">';
                            response.products.slice(0, 3).forEach(function(product) {
                                productsHtml += '<div class="col-span-1">' + product.title + '</div>';
                            });
                            productsHtml += '</div>';
                            searchResultContent.append(productsHtml);
                        }

                        // Iterate over categories
                        if (response.categories.length) {
                            var categoriesHtml = '<h3 class="text-lg font-semibold">Categories</h3>';
                            categoriesHtml += '<div class="grid grid-cols-3 gap-4">';
                            response.categories.slice(0, 3).forEach(function(category) {
                                categoriesHtml += '<div class="col-span-1">' + category.title + '</div>';
                            });
                            categoriesHtml += '</div>';
                            searchResultContent.append(categoriesHtml);
                        }

                        // Iterate over tags
                        if (response.tags.length) {
                            var tagsHtml = '<h3 class="text-lg font-semibold">Tags</h3>';
                            tagsHtml += '<div class="grid grid-cols-3 gap-4">';
                            response.tags.slice(0, 3).forEach(function(tag) {
                                tagsHtml += '<div class="col-span-1">' + tag.title + '</div>';
                            });
                            tagsHtml += '</div>';
                            searchResultContent.append(tagsHtml);
                        }

                        // Iterate over users
                        if (response.users.length) {
                            var usersHtml = '<h3 class="text-lg font-semibold">Users</h3>';
                            usersHtml += '<div class="grid grid-cols-3 gap-4">';
                            response.users.slice(0, 3).forEach(function(user) {
                                usersHtml += '<div class="col-span-1">' + user.name + '</div>';
                            });
                            usersHtml += '</div>';
                            searchResultContent.append(usersHtml);
                        }
                    } else {
                        // Display a message if there are no results
                        searchResultContent.html('<p>No results found.</p>');
                    }

                    // Show the search result container
                    searchResultContent.removeClass('hidden');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@yield('script')
</body>
</html>
