{{--<livewire:category-banner :background="$background" :category="$category" :icon="$icon"/> , ['background'=>$background, 'icon'=>$icon, 'category'=>$category]--}}

@livewire('category-banner', ['background' => $background, 'icon' => $icon, 'category' => $category])

<div class="shop-area shop-page-responsive pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-topbar-wrapper mb-40">
                    <div class="shop-topbar-left">
                        <div class="showing-item">
                            <span>Showing 1–12 of 60 results</span>
                        </div>
                    </div>
                    <div class="shop-topbar-right">
                        <div class="shop-sorting-area">
                            <select class="nice-select nice-select-style-1" style="display: none;">
                                <option>Default Sorting</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by latest</option>
                            </select>
                            <div class="nice-select nice-select-style-1" tabindex="0"><span class="current">Default Sorting</span>
                                <ul class="list">
                                    <li data-value="Default Sorting" class="option selected">Default Sorting</li>
                                    <li data-value="Sort by popularity" class="option">Sort by popularity</li>
                                    <li data-value="Sort by average rating" class="option">Sort by average rating
                                    </li>
                                    <li data-value="Sort by latest" class="option">Sort by latest</li>
                                </ul>
                            </div>
                        </div>
                        <div class="shop-view-mode nav" role="tablist">
                            <a class="active" href="#shop-1" data-bs-toggle="tab" aria-selected="true" role="tab"><i
                                    class=" ti-layout-grid3 "></i> </a>
                            <a href="#shop-2" data-bs-toggle="tab" class="" aria-selected="false" tabindex="-1"
                               role="tab"><i class=" ti-view-list-alt "></i></a>
                        </div>
                    </div>
                </div>
                <livewire:products-list/>
            </div>
        </div>
        @livewire('category', ['categories'=>$categories])
{{--        <livewire:category :categories="$categories"/>--}}
    </div>
</div>
</div>
@section('scripts')

   <script type="text/javascript">

       // Changing Title

       function changeTitle(id) {
            console.log(id)
           $.ajax({
               url: '{{ route('front.category.search') }}',
               method: 'GET',
               encode: true,
               data: {
                   id: id,
               },
               success: function (response) {
                   $('#main-title').html(response.title)
                   $('#product-list').html(response.productsList)
                   console.log(response.productsList);
               },
               error: function (error) {
                   console.error('Update failed:', error);
               }
           });

       }

   </script>

@endsection
