<?php

namespace App\Http\Livewire\Front;

use App\Models\CartProduct;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
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
    public $flashMessage;
    public $itemAmount;
    public $sale;
    public $saleItems;
    protected $listeners = ['Address', 'check'];

    public function mount(Request $request)
    {
        $this->payment = '';
        $this->addressCollected = '';
        $this->address  = ['city'=>'', 'state'=>'', 'address'=>'', 'home'=>''];
        $this->collect = '';
        $this->user = Auth::user();
        $this->text = $request->input('textareaValue');
        $this->check();
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
                    $this->itemAmount += $item['amount'];
                    $this->saleItems[] = [
                        'product_id' => $product->id,
                        'user_id' => $this->user->id,
                        'price' => $product->price,
                        'discount' => $product->discount_price ?? $product->price,
                        'amount' => $item['amount'],
                        'overall' => $price * $item['amount']
                    ];
                }
            }
            $this->disc = $this->truePrice - $this->overall;
        }
    }

    public function payment($value){
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

    public function button(){
        $this->sale = $this->checker();
        if ($this->sale){
//            dd($this->saleItems);
            $saleDb = Sale::create($this->sale);
            foreach ($this->saleItems as $item) {
                $item['sales_id'] = $saleDb->id;
                SaleItem::create($item);
            }
            CartProduct::where('user_id', auth()->user()->id)->delete();
            return redirect()->route('front.profile.index');
        }
    }

    public function checker(){
        if ($this->overall){
            $sales = [
                'user_id' => $this->user->id,
                'price' => $this->overall,
                'discount' => $this->truePrice - $this->overall,
                'total_amount' => $this->itemAmount,
                'status' => 'Получено',
            ];
            if($this->payment == ''){
                $this->flashMessage = 'Выберите способ оплаты, пожалуйста';
                $this->dispatchBrowserEvent('flashMessage', ['message' => 'Выберите способ оплаты, пожалуйста']);
                return null;
            }elseif($this->payment){
                $sales['payment'] = $this->payment;
            }
            if (!$this->collect && !$this->addressCollected){
                $this->flashMessage = 'Напишите адрес или выберите пункт самовывоза, пожалуйста';
                $this->dispatchBrowserEvent('flashMessage', ['message' => 'Напишите адрес или выберите пункт самовывоза, пожалуйста']);
                return null;
            }elseif ($this->collect){
                $sales['address_place'] = $this->collect;
                $sales['collecting_type'] = 'Забрать';
            }elseif($this->addressCollected){
                if ($this->address['address'] && $this->address['state'] && $this->address['city']){
                    $sales['address_place'] = $this->addressCollected;
                    $sales['collecting_type'] = 'Доставка';
                }else{
                    $this->flashMessage = 'Пожалуйста, выберите город, район и улицу, пожалуйста';
                    $this->dispatchBrowserEvent('flashMessage', ['message' => 'Пожалуйста, выберите город, район и улицу, пожалуйста']);
                    return null;
                }
            }
        }
        return $sales;
    }

    public function render()
    {
        return view('livewire.front.checkout')->extends('front.layout')->section('content');
    }
}
