        <div class="product-wrap h-100 d-flex flex-column">
            <div class="product-img img-zoom mb-25">
                <a wire:click="showProduct('{{ $product->slug }}')">
                    <img src="{{asset(($image) ? 'storage/'.$image->image : 'no_photo.jpg')}}" alt="">
                </a>
                <div
                    class="product-badge flex justify-end badge-top badge-right badge-pink">
                        @foreach($tags as $tag)
                            <div class="p-1 mb-1 rounded-1 text-white fw-semibold tag-view">{{ $tag->visible === 1 ? $tag->title : '' }}</div>
                        @endforeach
                </div>
                <div class="product-action-wrap">
                    @livewire('front.wishlist.wishlist-button', ['product' => $product], key($product->id))
{{--                    <button class="product-action-btn-1" title="Quick View"--}}
{{--                            data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                        <i class="pe-7s-look"></i>--}}
{{--                    </button>--}}
                </div>
                @livewire('front.cart.cart-count-btn', ['product' => $product], key($product->id))
            </div>
            <div class="product-content d-flex justify-content-between flex-column flex-grow-1">
                <div>
                    <h3 class=" p-1 mb-0 card-brand"><a class="card-brand" wire:click="showProduct('{{ $product->slug }}')" style="cursor: pointer;">Asscher • Спальная</a></h3>
{{--                    <h3 class=" p-1 mb-0"><a class="" wire:click="showProduct('{{ $product->slug }}')" style="font-size: 10px">{{$info}}</a></h3>--}}
                    <h3 class="fw-semibold fs-6 p-1 mb-1"><a wire:click="showProduct('{{ $product->slug }}')" style="cursor: pointer;">{{ $product->title }}</a></h3>
                </div>
                <div class="font-kyiv">
                    <span class="p-1 {{($product->discount_price == "") ? 'visually-hidden hidden' : 'new-price-card'}}">{{$product->discount_price}}  {{$product->discount_price > 10000 ? 'сум' : '$'}}<br></span>
                    <span class="p-1 {{($product->discount_price == "") ? 'new-price-card' : 'old-price-card'}}">{{$product->price}} {{$product->price > 10000 ? 'сум' : '$'}}</span>
                </div>
            </div>
        </div>

