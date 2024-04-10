<?php

namespace App\Http\Livewire\Front;

use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use Illuminate\Http\Request;

class Checkout extends Component
{
    public $user;
    public $usd;
    public $disc;
    public $overall;
    public $truePrice;
    public $text;
    public $collect;
    public $address;
    public $addressCollected;
    public $payment;
    protected $listeners = ['Address', 'check'];

    public function mount(Request $request)
    {
        $this->check();
        $this->payment = '';
        $this->addressCollected = '';
        $this->address  = ['city'=>'', 'state'=>'', 'address'=>'', 'home'=>''];
        $this->collect = '';
        $this->user = Auth::user();
        $this->text = $request->input('textareaValue');
    }

    public function check(){
        $this->usd = 12650;
        $this->disc = 0;
        $this->overall = 0;
        $this->truePrice = 0;
        if (Auth::check()){
            $cartArray = CartProduct::where('user_id', auth()->user()->id)->with('product')->get();
            foreach ($cartArray as $item) {
                $product = Product::where('id', $item['product_id'])->first();
                if (isset($item['amount']) && $product != null) {
                    $price1 = $product->discount_price ?? $product->price;
                    $price = ($price1 > 10000) ? $price1 : $price1 * $this->usd;
                    $truePric = ($product->price > 10000) ? $product->price : $product->price * $this->usd;
                    $this->overall += $price * $item['amount'];
                    $this->truePrice += $truePric * $item['amount'];
                }
            }
            $this->disc = $this->truePrice - $this->overall;
        }
    }

    public function delivery($value){
        $this->payment = $value;
    }

    public function updateCollect($value)
    {
        $this->addressCollected = '';
        $this->collect = $value;
    }

    public function Address($field, $value)
    {
        $this->addressCollected = '';
        $this->address[$field] = $value;
        $this->collect = '';
        foreach ($this->address as $ads){
            $this->addressCollected .= ($ads) ? $ads.", " : '';
        }
    }

    public function render()
    {
        return view('livewire.front.checkout')->extends('front.layout')->section('content');
    }
}
