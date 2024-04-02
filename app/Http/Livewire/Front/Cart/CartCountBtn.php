<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class CartCountBtn extends Component
{
    public $product;
    public $cartCount;
    public $exists;
    public $productCount;


    public function mount($product){
        $this->product = $product;
        $this->update();
    }

    public function check($action){
        if(Auth::check()){
            $user = Auth::user();
            $cartProduct = CartProduct::where('user_id', $user->id)->where('product_id', $this->product->id)->first();
            if($cartProduct){
                $amount = $cartProduct->amount;
                if ($amount == 1 && $action == 'remove'){
                    $cartProduct->delete();
                }elseif ($amount > 1 && $action == 'remove'){
                    $cartProduct->update(['amount' => --$amount]);
                }elseif ($action == 'add'){
                    $cartProduct->update(['amount' => ++$amount]);
                }
            } else {
                CartProduct::create([
                   'user_id' => $user->id,
                   'product_id' => $this->product->id,
                    'amount' => 1
                ]);
            }
        } else {
            $cartCookie = Cookie::get('cart');
            $cartArray = $cartCookie ? json_decode($cartCookie, true) : [];

            $amount = 1; // Default amount value

            foreach ($cartArray as &$item) {
                if ($item['product_id'] == $this->product->id) {
                    $amount = $item['amount'];
                    if ($amount == 1 && $action == 'remove') {
                        unset($item);
                    } elseif ($amount > 1 && $action == 'remove') {
                        $item['amount'] = --$amount;
                    } elseif ($action == 'add') {
                        $item['amount'] = ++$amount;
                    }
                    break;
                }
            }

            if ($amount == 1 && $action == 'add') {
                $cartArray[] = ['product_id' => $this->product->id, 'amount' => $amount];
            }

            // Save updated cart data back to the cookie
            Cookie::queue('cart', json_encode($cartArray), 60 * 24 * 30);
        }
        $this->update();
    }

    public function add(){
        $this->check('add');
    }

    public function remove(){
        $this->check('remove');
    }

    public function update(){
        if (Auth::check()){
            $user = Auth::user();
            $this->exists = CartProduct::where('user_id', $user->id)->where('product_id', $this->product->id)->first();
            $this->cartCount = CartProduct::where('user_id', $user->id)->sum('amount');
            if ($this->exists){
                $this->productCount = $this->exists->amount;
            }
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
                $this->cartCount = $totalAmount;
            }
        }
        $this->dispatchBrowserEvent('cartUpdate', ['count' => $this->cartCount]);
    }

    public function render()
    {
        return view('livewire.front.cart.cart-count-btn');
    }
}
