<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCount extends Component
{
    public $cartCount = 0;

    protected $listeners = ['checkCount' => 'checkItems'];

    public function checkItems(){
        if (Auth::check()){
            $this->cartCount = CartProduct::where('user_id', auth()->user()->id)->sum('amount');
        }else{
            $cartCookie = Cookie::get('cart');
            if ($cartCookie){
                $cartArray = json_decode($cartCookie, true);
                $totalAmount = 0;
                foreach ($cartArray as $item) {
                    $product = Product::where('id', $item['product_id'])->first();
                    if (isset($item['amount']) && $product != null) {
                        $totalAmount += $item['amount'];
                    }
                }
                $this->cartCount = $totalAmount;
            }
        }
    }


    public function render()
    {
        $this->checkItems();
        return view('livewire.front.cart.cart-count');
    }
}
