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
    @stack('styles')
    <style>
        .shadowSearch {
            border-radius: 2px;
            box-shadow: 1px 1px 4px 1px #ccc;
            transition: 0.5s;
        }
        .shadowSearch:hover{
            background-color: lightblue;
        }
    </style>
    @livewireStyles
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

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
{{--<script async src="https://www.googletagmanager.com/gtag/js?id=G-1VDDWMRSTH"></script>--}}

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
                            productsHtml += '<div class="grid grid-cols-4 gap-1">';
                            response.products.slice(0, 20).forEach(function(product) {
                                productsHtml += '<div class="shadowSearch col-span-1">' +
                                    '<a href="/admin/products/' + product.id + '/edit" class="flex">' +
                                    '<div class="bg-gray-200 w-16 h-16 flex items-center justify-center p-1">' +
                                    '<img src="' + product.image_url + '" class="object-cover w-full h-full"></div>' +
                                    '<div class="text-sm p-1"><b>' + product.title + '</b><br><span>'+product.price+'</span></div>' +
                                    '</a></div>';
                            });
                            productsHtml += '</div>';
                            searchResultContent.append(productsHtml);
                        }

                        // Iterate over categories
                        if (response.categories.length) {
                            var categoriesHtml = '<h3 class="text-lg font-semibold">Categories</h3>';
                            categoriesHtml += '<div class="grid grid-cols-4 gap-1">';
                            response.categories.slice(0, 18).forEach(function(category) {
                                categoriesHtml += '<a href="category/'+ category.id +'"><div class="shadowSearch p-3 col-span-1">' + category.title + '</div></a>';
                            });
                            categoriesHtml += '</div>';
                            searchResultContent.append(categoriesHtml);
                        }

                        // Iterate over users
                        if (response.users.length) {
                            var usersHtml = '<h3 class="text-lg font-semibold">Users</h3>';
                            usersHtml += '<div class="grid grid-cols-4 gap-1">';
                            response.users.slice(0, 3).forEach(function(user) {
                                usersHtml += '<a href="acoount/'+ user.id +'/edit"><div class="p-3 shadowSearch col-span-1">' + user.name + '</div></a>';
                            });
                            usersHtml += '</div>';
                            searchResultContent.append(usersHtml);
                        }

                        if (response.tags.length) {
                            var tagsHtml = '<h3 class="text-lg font-semibold">Tags</h3>';
                            tagsHtml += '<div class="grid grid-cols-4 gap-1">';
                            response.tags.slice(0, 3).forEach(function(tag) {
                                tagsHtml += '<a href="tags/'+ tag.id +'"><div class="p-3 shadowSearch col-span-1">' + tag.title + '</div></a>';
                            });
                            tagsHtml += '</div>';
                            searchResultContent.append(tagsHtml);
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
@livewireScripts


// Show the search result container




@stack('scripts')
@yield('script')
</body>
</html>
