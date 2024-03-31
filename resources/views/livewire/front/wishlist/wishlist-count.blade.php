<div class="header-action-style {{ $wishlistCount !== "" ? 'header-action-cart' : '' }}" style="z-index: 1">
    <a class="" title="Wishlist" href="{{route('front.wishlist.index')}}"><i class="pe-7s-like"></i>
        @if($wishlistCount !== "")
        <span class="wishlist-count bg-black">{{$wishlistCount}}</span>
        @endif
    </a>
</div>
