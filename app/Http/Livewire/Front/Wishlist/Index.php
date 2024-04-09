<?php

namespace App\Http\Livewire\Front\Wishlist;


use App\Models\Product;
use App\Models\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Index extends Component
{
    public $wishList = [];

    protected $listeners = ['wishlistRemove' => 'wishlistRemove'];

    public function mount()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cookie = json_decode(Cookie::get('wishlist', '[]'), true);
            if (auth()->check() && !empty($cookie)) {
                $user = auth()->user();
                foreach ($cookie as $productId) {
                    // Check if the product already exists in the user's wishlist
                    $existingWishlistItem = WishlistProduct::where('user_id', $user->id)
                        ->where('product_id', $productId)
                        ->first();

                    if (!$existingWishlistItem) {
                        // Product doesn't exist in the wishlist, create a new entry
                        WishlistProduct::create([
                            'user_id' => $user->id,
                            'product_id' => $productId
                        ]);
                    }
                }
                Cookie::queue(Cookie::forget('wishlist'));
            }
            $this->wishList = WishlistProduct::where('user_id', $user->id)->with('product')->get()->pluck('product');
        } else {
            $cookie = json_decode(Cookie::get('wishlist', '[]'), true);
            if (is_array($cookie) && !empty($cookie)) {
                $this->wishList = Product::whereIn('id', $cookie)->get();
            }
        }
    }

    public function wishlistRemove()
    {
        dd('test');
    }

    public function render()
    {
        if (count($this->wishList) !== 0){
            return view('livewire.front.wishlist.index')->extends('front.layout')->section('content');
        }else{
            return view('livewire.front.wishlist.empty')->extends('front.layout')->section('content');
        }
    }
}


