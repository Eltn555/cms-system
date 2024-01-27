<?php

namespace App\Http\Livewire\Front\Wishlist;

use App\Models\Product;
use App\Models\Wishlist;
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

    public function deleteproduct()
    {
        $product = Product::find($this->product_wishlist);
        $product->delete();
    }
}
