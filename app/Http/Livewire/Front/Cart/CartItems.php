<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use App\Models\Product;

class CartItems extends Component
{
    protected $listeners = ['checkItems'];
    public $items;

    public function checkItems(){
        if (Auth::check()) {
            // User is authenticated, fetch products from the database
            return CartProduct::where('user_id', auth()->user()->id)->with('product')->get()->pluck('product');
        } else {
            $cartCookie = Cookie::get('cart');
            if ($cartCookie) {
                // User is not authenticated, fetch products from the cookie
                $cartArray = json_decode($cartCookie, true);
                $productIds = [];
                foreach ($cartArray as $item) {
                    $product = Product::where('id', $item['product_id'])->first();
                    if ($product != null) {
                        array_push($productIds, $product);
                    }else {
                        // Remove the invalid product from the cookie
                        unset($cartArray[array_search($item, $cartArray)]);
                        Cookie::queue('cart', json_encode($cartArray), 60 * 24 * 30);
                    }
                }
                // Fetch products from the database based on the product IDs
                return $productIds;
            }
        }
        return [];
    }

    public function render()
    {
        $this->items = $this->checkItems();
        return view('livewire.front.cart.cart-items');
    }
}
