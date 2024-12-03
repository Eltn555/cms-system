        <div class="product-wrap h-100 d-flex flex-column">
            <div class="product-img img-zoom mb-25">
                <a href="{{route('front.product.show', ['slug' => $product->slug])}}">
                    <img class="image{{$product->id}}" src="{{asset(($image) ? 'storage/'.$image->image : 'no_photo.jpg')}}" alt="{{$product->title}}" loading="lazy">
                </a>
                <div
                    class="product-badge rounded-0 flex justify-end badge-pink" style="top: 5px; left: 5px;">
                        @foreach($tags as $tag)
                            <div class="px-2 mb-1 d-flex justify-content-center align-items-center rounded-0 text-white fw-semibold tag-view">{{ $tag->visible == 1 ? $tag->title : '' }}</div>
                        @endforeach
                </div>
                @if($product->amount > 0)
                    <div class="position-absolute bottom-0 end-0">
                        <div class="px-2 mb-1 me-1 rounded-1 text-success text-uppercase" style="background-color: rgba(180,180,180,0.45)">
                            <p class="mb-0 fw-bolder">В наличии</p>
                        </div>
                    </div>
                @endif
                <div class="product-action-wrap">
                    @livewire('front.wishlist.wishlist-button', ['product' => $product], key($product->id))
{{--                    <button class="product-action-btn-1" title="Quick View"--}}
{{--                            data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                        <i class="pe-7s-look"></i>--}}
{{--                    </button>--}}
                </div>
                @if($product->amount > 0)
                    @livewire('front.cart.cart-count-btn', ['product' => $product, 'type' => 'cart'], key($product->id))
                @endif
            </div>
            <div class="product-content d-flex justify-content-between flex-column flex-grow-1">
                <div>
                    <h3 class=" p-1 mb-0 card-brand"><a class="card-brand" href="{{route('front.product.show', ['slug' => $product->slug])}}" ')" style="cursor: pointer;">Lumen Lux</a></h3>
{{--                    <h3 class=" p-1 mb-0"><a class="" wire:click="showProduct('{{ $product->slug }}')" style="font-size: 10px">{{$info}}</a></h3>--}}
                    <h3 class="fw-semibold fs-6 p-1 mb-1"><a href="{{route('front.product.show', ['slug' => $product->slug])}}" style="cursor: pointer;">{{ $product->title }}</a></h3>
                </div>
                <div class="font-kyiv">
                    <span class="p-1 {{($product->discount_price == "") ? 'visually-hidden hidden' : 'new-price-card'}}">{{number_format($product->discount_price, 0, '.', ' ')}}  {{$product->discount_price > 999 ? 'сум' : '$'}}<br></span>
                    <span class="p-1 {{($product->discount_price == "") ? 'new-price-card' : 'old-price-card'}}">{{number_format($product->price, 0, '.', ' ')}} {{$product->price > 999 ? 'сум' : '$'}}</span>
                </div>
            </div>
        </div>

