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
        return view('livewire.front.wishlist.empty')->extends('front.layout')->section('content');
    }
}


