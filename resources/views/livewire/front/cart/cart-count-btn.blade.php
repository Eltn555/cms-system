<div>
    @if($exists)
        <div class="product-action-2-wrap product-count h4 mb-0 w-100 bg-light">
            <button wire:click="remove" class="border-0 bg-transparent">-</button>
            <span>{{$productCount}}</span>
            <button wire:click="add" class="border-0 bg-transparent">+</button>
        </div>
    @else
        <div class="product-action-2-wrap single-product-cart">
            <a wire:click="add" class="product-action-btn-2 kyiv" title="Add To Cart"><i
                    class="pe-7s-cart"></i> Добавить в корзину
            </a>
        </div>
    @endif
</div>
