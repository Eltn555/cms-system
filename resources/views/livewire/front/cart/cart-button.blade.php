<div>
    @if($exists)
        <div class="payment product-action-2-wrap single-product-cart btn-hover w-100 text-center toPayment{{$product->id}}">
            <a href="/cartItems" class="callProduct{{$product->id}}  w-100 p-2 text-white bg-success">Перейти к оплате</a>
        </div>
        <div class="addCart d-none product-action-2-wrap single-product-cart btn-hover w-100 text-center add__Cart{{$product->id}}">
            <a wire:click="add" data-fly-to-basket="image{{$product->id}}" onclick="showNotification('{{$product->title}}', '{{asset(($product->images()->first()) ? 'storage/'.$product->images()->first()->image : 'no_photo.jpg')}}')" class="fly-to-basket w-100 p-2 text-dark callProduct{{$product->id}}">Добавить в корзину</a>
        </div>
    @else
        <div class="payment d-none product-action-2-wrap single-product-cart btn-hover w-100 text-center toPayment{{$product->id}}">
            <a href="/cartItems" class="callProduct{{$product->id}} w-100 p-2 text-white bg-success">Перейти к оплате</a>
        </div>
        <div class="addCart product-action-2-wrap single-product-cart btn-hover w-100 text-center add__Cart{{$product->id}}">
            <a wire:click="add" data-fly-to-basket="image{{$product->id}}" onclick="showNotification('{{$product->title}}', '{{asset(($product->images()->first()) ? 'storage/'.$product->images()->first()->image : 'no_photo.jpg')}}')" class="w-100 p-2 fly-to-basket text-dark callProduct{{$product->id}}">Добавить в корзину</a>
        </div>
    @endif
</div>
