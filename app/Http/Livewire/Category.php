<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Category extends Component
{
    public $categories;
    public $category;
    public $background;
    public $icon;
    public $products;

    public function mount()
    {
        $this->categories = \App\Models\Category::all();
        $this->products = \App\Models\Product::all();
        $this->category = \App\Models\Category::firstOrFail();
    }

    public function check($productid) {
        return WishlistProduct::where('user_id', auth()->user()->id)->where('product_id', $productid)->exists();
    }

    public function addProduct($productid)
    {
        if (Auth::check()) {
            if ($this->check($productid)) {
                session()->flash('message', 'Already added product to wishlist');
                return false;
            } else {
                WishlistProduct::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productid
                ]);
            }
        }

    }


    public
    function render()
    {
        return view('livewire.category');
    }
}
