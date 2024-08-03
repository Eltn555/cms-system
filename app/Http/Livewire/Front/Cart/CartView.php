<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CartView extends Component
{
    public $textareaValue;
    public $items = [];
    public $overall = 0;
    public $cartArray;
    protected $listeners = ['render' => 'reRender', 'overall'];
    public $truePrice;
    public $disc;
    public $usd;

    public function overall($overall){
        $this->overall = $overall;
    }

    public function reRender(){
        $this->check();
    }

    public function mount(){
        $cartCookie = Cookie::get('cart');
        $this->cartArray = ($cartCookie) ? json_decode($cartCookie, true) : [];


    }

    public function checkItems(){
        $this->items = [];
        if (Auth::check()) {
            // User is authenticated, fetch products from the database
            $this->items = CartProduct::where('user_id', auth()->user()->id)->with('product')->get()->pluck('product');
        } else {
            // User is not authenticated, fetch products from the cookie
            $productIds = [];
            if ($this->cartArray){
                foreach ($this->cartArray as $item) {
                    $product = Product::where('id', $item['product_id'])->first();
                    if ($product != null) {
                        array_push($productIds, $product);
                    }else {
                        // Remove the invalid product from the cookie
                        unset($this->cartArray[array_search($item, $this->cartArray)]);
                        Cookie::queue('cart', json_encode($this->cartArray), 60 * 24 * 30);
                    }
                }
            }
            // Fetch products from the database based on the product IDs
            $this->items = $productIds;
        }
        $this->check();
    }

    public function delete($product){
        if(Auth::check()){
            $user = Auth::user();
            $cartProduct = CartProduct::where('user_id', $user->id)->where('product_id', $product)->first();
            if($cartProduct){
                $cartProduct->delete();
            }
        } else {
            foreach ($this->cartArray as $key => $item) {
                if ($item['product_id'] == $product) {
                    unset($this->cartArray[$key]); // Remove the item from the array
                    Cookie::queue('cart', json_encode($this->cartArray), 60 * 24 * 30);
                }
            }
        }
        $this->emit('checkCount');
        $this->check();
        $this->render();
        $this->dispatchBrowserEvent('cartUpdate', ['count' => 0, 'id' => $product]);
    }

    public function check(){
        $this->usd = 12700;
        $this->disc = 0;
        $this->overall = 0;
        $this->truePrice = 0;
        if (Auth::check()){
            $cartArray = CartProduct::where('user_id', auth()->user()->id)->with('product')->get();
            foreach ($cartArray as $item) {
                $product = Product::where('id', $item['product_id'])->first();
                if (isset($item['amount']) && $product != null) {
                    $price1 = $product->discount_price ?? $product->price;
                    $price = ($price1 > 999) ? $price1 : $price1 * $this->usd;
                    $truePric = ($product->price > 999) ? $product->price : $product->price * $this->usd;
                    $this->overall += $price * $item['amount'];
                    $this->truePrice += $truePric * $item['amount'];
                }
            }
            $this->disc = $this->truePrice - $this->overall;
        }else{
            $cartCookie = Cookie::get('cart');
            if ($cartCookie){
                $cartArray = json_decode($cartCookie, true);

                foreach ($cartArray as $item) {
                    $product = Product::where('id', $item['product_id'])->first();
                    if (isset($item['amount']) && $product != null) {
                        $price1 = $product->discount_price ?? $product->price;
                        $price = ($price1 > 999) ? $price1 : $price1 * $this->usd;
                        $truePric = ($product->price > 999) ? $product->price : $product->price * $this->usd;
                        $this->overall += $price * $item['amount'];
                        $this->truePrice += $truePric * $item['amount'];
                    }
                }
            }
            $this->disc = $this->truePrice - $this->overall;
        }
    }

    public function render()
    {
        $this->checkItems();
        return view('livewire.front.cart.cartView')->extends('front.layout')->section('content');
    }
}
