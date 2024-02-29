<?php

namespace App\Http\Livewire\Front\Wishlist;

use App\Models\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class WishlistCount extends Component
{
    public $wishlistCount;

    protected $listeners = ['wishlistAddUpdated'=>'checkWishlistCount'];

    public function checkWishlistCount()
    {
        if (Auth::check()) {
            // User is logged in, check the database for wishlist count
            return WishlistProduct::where('user_id', auth()->user()->id)->count();
        } else {
            // User is not logged in, check the wishlist stored in cookies
            $wishlistCookie = Cookie::get('wishlist');
            if ($wishlistCookie) {
                $wishlistArray = json_decode($wishlistCookie, true);
                return count($wishlistArray);
            } else {
                return ""; // No wishlist items for non-logged-in users
            }
        }
    }

    public function render()
    {
        $this->wishlistCount = $this->checkWishlistCount();
        return view('livewire.front.wishlist.wishlist-count', ['wishlistCount' => $this->wishlistCount]);
    }
}
