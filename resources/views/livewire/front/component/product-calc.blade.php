@if (!app()->bound('livewire.styles_added'))
    @push('styles')
        <style>
            .product-img  img{
                width: 100% !important;
                height: 100% !important;
                object-fit: cover;
                position:unset !important;
                transform: unset !important;
            }
            .product-img a{
                width: 100% !important;
                height: 100% !important;
            }
            .product-img {
                width: 100% !important;
                aspect-ratio: 1/1;
                overflow: hidden;
                height: unset !important;
            }
            .product-wrap:hover .product-img a img {
                width: 110% !important;
                height: 110% !important;
            }
            .product-wrap:hover .product-action-2-wrap {
                bottom: 0px;
                opacity: 0;
                visibility: hidden;
            }
            .product-wrap:hover .product-action-wrap {
                opacity: 0;
                visibility: hidden;
            }
            @media (min-width: 768px) {
                .product-wrap:hover .product-action-2-wrap {
                    opacity: 1;
                    visibility: visible;
                }
                .product-wrap:hover .product-action-wrap {
                    opacity: 1;
                    visibility: visible;
                }
            }
        </style>
    @endpush
    @php(app()->instance('livewire.styles_added', true))
@endif
<div class="product-wrap h-100 d-flex flex-column">
    <div class="product-img mb-1">
        <a class="overflow-hidden d-flex justify-content-center align-items-center" href="{{route('front.product.show', ['slug' => $product->slug])}}">
            <img class="image{{$product->id}}" src="{{asset(($image) ? 'storage/'.$image->image : 'no_photo.jpg')}}" alt="{{$product->title}}" loading="lazy">
        </a>
        <div class="product-badge rounded-0 flex justify-end badge-pink" style="top: 5px; left: 5px;">
                @foreach($tags as $tag)
                    <div class="px-2 mb-1 d-flex justify-content-center align-items-center rounded-1 text-white fw-semibold" style="background-color: rgba(255, 0, 0, 0.6);">{{ $tag->visible == 1 ? $tag->title : '' }}</div>
                @endforeach
        </div>
        <div class="product-badge rounded-0 flex justify-end badge-pink" style="top: 5px; right: 5px;">
            <div class="px-2 mb-1 d-flex justify-content-center align-items-center rounded-1 text-danger fw-semibold" style="background-color: rgba(250, 250, 250, 0.75);">
                @if($meter && ($type == 'led' || $type == 'power'))
                    <i class="{{$type == 'led' ? 'consumption-icon fa-solid fa-bolt' : 'power-icon fa-solid fa-plug'}} pe-1"></i>
                @endif
                {{ $infoCalc }}
            </div>
        </div>
        @if($product->amount > 0)
            <div class="position-absolute bottom-0 end-0">
                <div class="px-2 mb-1 me-1 rounded-1 text-success text-uppercase" style="background-color: rgba(180,180,180,0.45)">
                    <p class="mb-0 fw-bolder">В наличии</p>
                </div>
            </div>
        @endif
        <div class="product-action-wrap">
            @livewire('front.wishlist.wishlist-button', ['productId' => $product->id], key($product->id))
        </div>
        @if($product->amount > 0)
            @livewire('front.cart.cart-count-btn', ['product' => $product, 'type' => 'cart'], key($product->id))
        @endif
    </div>
    <div class="product-content d-flex justify-content-between flex-column flex-grow-1">
        <div>
            <h3 class=" p-1 mb-0 card-brand"><a class="card-brand" href="{{route('front.product.show', ['slug' => $product->slug])}}" ')" style="cursor: pointer;">Lumen Lux</a></h3>
            <h3 class="fw-semibold fs-6 p-1 mb-1"><a href="{{route('front.product.show', ['slug' => $product->slug])}}" style="cursor: pointer;">{{ $product->title }}</a></h3>
        </div>
        <div class="font-kyiv card-price">
            @if($product->discount_price == "")
                <span class="p-1 second-price" style="color: #232323; font-size: 20px; font-weight: 900;">{{number_format($product->price, 0, '.', ' ')}} {{$product->price > 999 ? 'сум' : '$'}}</span>
            @else
                <span class="p-1 old-price-card d-none d-md-inline" style="font-size: 14px; color: #777777; font-weight: 400;">Скидка:<span style="color: #ED4A67;">-{{number_format($profPercent, 0, '.', ' ')}}%</span> Выгода:<span style="color: #32C77F">{{number_format($profit, 0, '.', ' ')}}{{$product->price > 999 ? 'сум' : '$'}}</span></span><br class="d-none d-md-inline">
                <span class="p-1 first-price text-decoration-line-through" style=" color: #777777; font-size: 20px; font-weight: 900;">{{number_format($product->price, 0, '.', ' ')}}  {{$product->discount_price > 999 ? 'сум' : '$'}}<br></span>
                <span class="p-1 second-price" style="color: #232323; font-size: 20px; font-weight: 900;">{{number_format($product->discount_price, 0, '.', ' ')}}  {{$product->discount_price > 999 ? 'сум' : '$'}}</span>
            @endif
        </div>
    </div>
</div>
