@section('title', 'Избранное')

<div class="wishlist-area pb-100 pt-100">
    <div class="container">
        <div class="mt-4 mb-20 font-cormorant position-relative">
            <h2 class="shadow-text-1 font-cormorant fw-bold">Список<br>пожеланий</h2>
            <h2 class="shadow-text-2 font-cormorant fw-bold">Список<br>пожеланий</h2>
        </div>
        <div class="row">
            @foreach($wishList as $product)
                @if($product)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 align-self-stretch p-2">
                        <livewire:front.component.product-card :product="$product" :key="$product->id" />
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
