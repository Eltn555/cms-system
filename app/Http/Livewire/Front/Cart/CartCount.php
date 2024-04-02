<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\CartProduct;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCount extends Component
{
    public $cartCount;

    public function checkItems(){
        if (Auth::check()){
            return CartProduct::where('user_id', auth()->user()->id)->sum('amount');
        }else{
            $cartCookie = Cookie::get('cart');
            if ($cartCookie){
                $cartArray = json_decode($cartCookie, true);

                $totalAmount = 0;
                foreach ($cartArray as $item) {
                    if (isset($item['amount'])) {
                        $totalAmount += $item['amount'];
                    }
                }
                return $totalAmount;
            }
        }
        return "0";
    }


    public function render()
    {
        $this->cartCount = $this->checkItems();
        return view('livewire.front.cart.cart-count');
    }
}
