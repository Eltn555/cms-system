<?php

namespace App\Http\Livewire\Front\Wishlist;

use Livewire\Component;
use App\Models\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class WishlistButton extends Component
{
    public $product;
    public $isInWishlist;
    public $wishlistCount;
    public $wishList;

    public function mount($product)
    {
        $this->wishList = json_decode(Cookie::get('wishlist', '[]'), true);
        $this->product = $product;
        $this->updateWishlistData();
    }

    public function render()
    {
        return view('livewire.front.wishlist.wishlist-button');
    }

    public function toggleWishlist()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $wishlistProduct = WishlistProduct::where('user_id', $user->id)
                ->where('product_id', $this->product->id)
                ->first();

            if ($wishlistProduct) {
                $wishlistProduct->delete();
            } else {
                WishlistProduct::create([
                    'user_id' => $user->id,
                    'product_id' => $this->product->id
                ]);
            }
        } else {
            // Handle adding/removing product from cookie
            $this->wishList = json_decode(Cookie::get('wishlist', '[]'), true);
            if (in_array($this->product->id, $this->wishList)) {
                // Remove product from wishlist
                $this->wishList = array_diff($this->wishList, [$this->product->id]);
            } else {
                // Add product to wishlist
                $this->wishList[] = $this->product->id;
            }

            Cookie::queue('wishlist', json_encode($this->wishList), 60 * 24 * 30);
            // Update wishlist count and check if product is in wishlist
        }
        $this->updateWishlistData();
    }

    private function updateWishlistData()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $this->wishlistCount = WishlistProduct::where('user_id', $user->id)->count();
            $this->isInWishlist = WishlistProduct::where('user_id', $user->id)
                ->where('product_id', $this->product->id)
                ->exists();
        } else {
            $this->wishlistCount = count($this->wishList);
            $this->isInWishlist = in_array($this->product->id, $this->wishList);
            $this->dispatchBrowserEvent('console', ['console' => $this->wishList]);
        }
        $this->dispatchBrowserEvent('wishlistUpdated', ['count' => $this->wishlistCount]);
    }
}
