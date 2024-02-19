<?php

namespace App\Http\Livewire\Front\Component;

use App\Models\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Product;
use App\Models\Tag;

class ProductCard extends Component
{
    public $tags;
    public $product;
    public $image;
    public function mount($product){
        $this->product = $product;
        $this->tags = $product->tags()->where('visible', 1)->take(3)->get();
        $this->image = $product->images()->first();
    }

    public function check($productid)
    {
        return Auth::check() ? WishlistProduct::where('user_id', auth()->user()->id)->where('product_id', $productid)->exists() : false;
    }

    public function addProduct($productid)
    {
        if (Auth::check()) {
            if ($this->check($productid)) {
                session()->flash('message', 'Already added product to wishlist');
                return false;
            } else {
                $this->emit('wishlistAddUpdated');
                WishlistProduct::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productid
                ]);
            }
        }

    }

    public function showProduct($slug)
    {
        return redirect()->to('/product/' . $slug);
    }

    public function render()
    {
        return view('livewire.front.component.product-card');
    }
}
