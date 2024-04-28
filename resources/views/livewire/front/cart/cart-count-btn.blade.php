<div>
        <div class="product-action-2-wrap product-count mb-0 w-100 bg-light p-0">
            <button wire:click="remove" data-action="{{$product->id}}" class="callProduct border-0 bg-transparent">-</button>
            <span class="cartItem{{$product->id}}">{{$productCount ?? 0}}</span>
            <button wire:click="add" data-action="{{$product->id}}" class="callProduct border-0 bg-transparent">+</button>
        </div>
</div>
