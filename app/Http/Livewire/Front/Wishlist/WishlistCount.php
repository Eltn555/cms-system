<?php

namespace App\Http\Livewire\Front\Wishlist;

use App\Models\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistCount extends Component
{
    public $wishlistCount;

    protected $listeners = ['wishlistAddUpdated'=>'checkWishlistCount'];

    public function checkWishlistCount()
    {
        if (Auth::check()) {
            return $this->wishlistCount = WishlistProduct::where('user_id', auth()->user()->id)->count();
        } else {
            return $this->wishlistCount = 0;
        }
    }

    public function render()
    {
        $this->wishlistCount = $this->checkWishlistCount();
        return view('livewire.front.wishlist.wishlist-count', ['wishlistCount' => $this->wishlistCount]);
    }
}
