<div class="sidebar-cart-all">
        <a class="cart-close"><i class="pe-7s-close"></i></a>
        <h1 class="font-cormorant fw-bolder pb-4 border-bottom border-1 mb-5">Корзина</h1>
        <div class="cart-content">
            <ul>
                @foreach($items as $item)
                    <li>
                        <div class="cart-img d-flex align-items-center">
                            <a href="{{route('front.product.show', ['slug' => $item->slug])}}"><img src="{{asset(($item->images()->first()) ? 'storage/'.$item->images()->first()->image : 'no_photo.jpg')}}" alt="{{$item->title}}"></a>
                        </div>
                        <div class="cart-title w-100">
                            <h4><a href="{{route('front.product.show', ['slug' => $item->slug])}}">{{mb_strimwidth($item->title, 0, 33, '..')}}</a></h4>
                            <span class="span">{{mb_strimwidth($item->short_description, 0, 42, '..')}}</span>
                            <div class="product-details-action-wrap font-kyiv">
                                <div class="product-details-price py-3">
                                    <span class="p-1 fs-6 {{($item->discount_price == "") ? 'd-none' : 'new-price'}}">{{$item->discount_price}}  {{$item->discount_price > 10000 ? 'сум' : '$'}}</span>
                                    <span class="p-1 fs-6 {{($item->discount_price == "") ? 'new-price' : 'old-price'}}">{{$item->price}} {{$item->price > 10000 ? 'сум' : '$'}}</span>
                                </div>
                            </div>
                            <div class="row w-100 d-flex justify-content-between m-0 p-0">
                                <div class="col-9 col-sm-6 cart-buttons p-0">
                                    @livewire('front.cart.cart-count-btn', ['product' => $item], key($item->id))
                                </div>
                                <div class="col-2 d-flex justify-content-end p-0">
                                    <button wire:click="delete({{$item->id}})" class="border-0 bg-transparent">
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="18" cy="18" r="18" fill="#F4F4F4"/>
                                            <path d="M10.5 13.4365C10.5 13.1078 10.7723 12.8413 11.1081 12.8413H15.0982C15.1036 12.1402 15.1796 11.1792 15.8753 10.5139C16.4228 9.99032 17.1734 9.66667 18 9.66667C18.8266 9.66667 19.5772 9.99032 20.1247 10.5139C20.8204 11.1792 20.8963 12.1402 20.9018 12.8413H24.8919C25.2277 12.8413 25.5 13.1078 25.5 13.4365C25.5 13.7653 25.2277 14.0317 24.8919 14.0317H11.1081C10.7723 14.0317 10.5 13.7653 10.5 13.4365Z" fill="#CBCBCB"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.663 26.3333H18.337C20.6559 26.3333 21.8154 26.3333 22.5693 25.5951C23.3231 24.8568 23.4003 23.6458 23.5545 21.2238L23.7768 17.7338C23.8605 16.4197 23.9023 15.7626 23.5241 15.3462C23.1459 14.9298 22.5073 14.9298 21.23 14.9298H14.77C13.4927 14.9298 12.8541 14.9298 12.4759 15.3462C12.0977 15.7626 12.1395 16.4197 12.2232 17.7338L12.4455 21.2238C12.5997 23.6458 12.6769 24.8568 13.4307 25.5951C14.1846 26.3333 15.3441 26.3333 17.663 26.3333ZM16.5386 18.1571C16.5042 17.7955 16.1979 17.5317 15.8545 17.5679C15.511 17.6041 15.2604 17.9264 15.2948 18.288L15.7114 22.674C15.7458 23.0355 16.0521 23.2993 16.3955 23.2631C16.739 23.227 16.9896 22.9046 16.9552 22.543L16.5386 18.1571ZM20.1455 17.5679C20.489 17.6041 20.7396 17.9264 20.7052 18.288L20.2886 22.674C20.2542 23.0355 19.9479 23.2993 19.6045 23.2631C19.261 23.227 19.0104 22.9046 19.0448 22.543L19.4614 18.1571C19.4958 17.7955 19.8021 17.5317 20.1455 17.5679Z" fill="#CBCBCB"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="cart-bottom">
            <div class="border-bottom border-1 text-secondary d-flex justify-content-between">
                <p class="font-kyiv fs-5">Промежуточный итог:</p>
                <p class="font-kyiv fs-5 fw-bolder text-black">{{$overall}}</p>
            </div>
            <div class="pt-2">
                <p class="text-secondary font-kyiv">Налоги, стоимость доставки рассчитывается при оформлении заказа.</p>
            </div>
            <div class="row">
                <div class="single-product-cart btn-hover pe-sm-1 p-0 pb-2 text-center col-12 col-sm-6">
                    <a href="{{ route('front.cartItems.index') }}" class="w-100 text-dark bg-light border border-1">Посмотреть корзину</a>
                </div>
                <div class="single-product-cart btn-hover ps-sm-1 p-0 pb-2 text-center col-12 col-sm-6">
                    <a href="#" class="w-100 text-dark">Перейти к оплате</a>
                </div>
            </div>
        </div>
    </div>
