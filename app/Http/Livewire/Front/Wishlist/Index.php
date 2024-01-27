<?php

namespace App\Http\Livewire\Front\Wishlist;


use App\Models\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $products;


    public function mount()
    {
        $user = auth()->user();
        $this->products = $user->wishlists;
    }

    public function render()
    {
        return view('livewire.front.wishlist.index',);
    }

    public function removeProduct($productid)
    {
        if (Auth::check()) {
            if (WishlistProduct::where('user_id', auth()->user()->id)->where('product_id', $productid)->exists()) {
                session()->flash('message', 'Already added product to wishlist');
                return false;
            } else {
                WishlistProduct::destroy([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productid
                ]);
            }
        }
//        WishlistProduct::where('user_id', auth()->user()->id)->where('product_id', $productid)->exists();
//        session()->flash('message', 'Already added product to wishlist');
//        return view('livewire.front.wishlist');
    }

}
