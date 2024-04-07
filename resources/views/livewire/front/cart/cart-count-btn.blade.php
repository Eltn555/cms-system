<div>
    @if($exists)
        <div class="product-action-2-wrap product-count mb-0 w-100 bg-light p-0">
            <button wire:click="remove" class="border-0 bg-transparent">-</button>
            <span>{{$productCount}}</span>
            <button wire:click="add" class="border-0 bg-transparent">+</button>
        </div>
    @else
        <div class="product-action-2-wrap single-product-cart btn-hover w-100 text-center">
            <a wire:click="add" class="w-100 p-3 text-dark">Добавить в корзину</a>
        </div>
    @endif
</div>
