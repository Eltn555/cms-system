<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class CartButton extends Component
{
    public $product;
    public $cartCount;
    public $exists;
    public $productCount;
    public $updatedCount;
    public $cookie;

    protected $listeners = ['refreshCountButton' => '$refresh'];

    public function mount($product){
        $productCount = 0;
        $this->product = $product;
        $cartCookie = Cookie::get('cart');
        $this->cookie = $cartCookie ? json_decode($cartCookie, true) : [];
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
            $this->cookie = $cartCookie ? json_decode($cartCookie, true) : [];
            $amount = 0; // Default amount value
            foreach ($this->cookie as $key => $item) {
                if ($item['product_id'] == $this->product->id) {
                    $amount = $item['amount'];
                    if ($amount == 1 && $action == 'remove') {
                        unset($this->cookie[$key]); // Remove the item from the array
                        $this->exists = null;
                        $this->updatedCount = 0;
                    } elseif ($amount > 1 && $action == 'remove') {
                        $this->cookie[$key]['amount'] = --$amount; // Update the amount
                        $this->updatedCount = --$amount;
                    } elseif ($action == 'add') {
                        $this->cookie[$key]['amount'] = ++$amount; // Update the amount
                        $this->updatedCount = ++$amount;
                    }
                }
            }

            if ($amount == 0 && $action == 'add') {
                $this->cookie[] = ['product_id' => $this->product->id, 'amount' => $amount+1];
                $this->updatedCount = 1;
            }

//            $this->dispatchBrowserEvent('cartUpdate', ['count' => $this->cookie]);
            Cookie::queue('cart', json_encode($this->cookie), 60 * 24 * 30);
        }
        $this->update();
        $this->updateState();
        $this->dispatchBrowserEvent('cartUpdate', ['count' => $this->productCount, 'id' => $this->product->id]);
    }

    public function add(){
        dd('hey');
        if ($this->productCount != $this->product->amount){
            $this->check('add');
        }
    }

    public function remove(){
        if ($this->productCount != 0){
            $this->check('remove');
        }
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'cookie') {
            $this->updateState();
        }
    }

    public function update(){
        if (Auth::check()){
            $user = Auth::user();
            $this->exists = CartProduct::where('user_id', $user->id)->where('product_id', $this->product->id)->first();
            if ($this->exists){
                $this->productCount = $this->exists->amount;
            }
        }else{
            $cookie = $this->cookie;
            if ($cookie){
                foreach ($cookie as $item) {
                    if ($item['product_id'] == $this->product->id) {
                        $this->exists = true;
                        $this->productCount = $item['amount'];
                    }
                }
            }
        }
    }

    public function updateState()
    {
        $this->update();
        $this->emit('render');
        $this->emit('checkCount');

    }

    public function render()
    {
        return view('livewire.front.cart.cart-button');
    }
}
