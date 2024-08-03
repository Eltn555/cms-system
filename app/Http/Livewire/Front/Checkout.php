<?php

namespace App\Http\Livewire\Front;

use App\Models\CartProduct;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Http\Request;

class Checkout extends Component
{
    public $user;
    public $usd;
    public $disc;
    public $overall;
    public $truePrice;
    public $collect;
    public $address;
    public $addressCollected;
    public $payment;
    public $flashMessage;
    public $itemAmount;
    public $sale;
    public $saleItems;

    protected $listeners = ['Address', 'check', 'cartUpdated' => 'check'];

    public function mount(Request $request)
    {
        $this->payment = '';
        $this->addressCollected = '';
        $this->address  = ['city'=>'', 'state'=>'', 'address'=>'', 'home'=>''];
        $this->collect = '';
        $this->user = Auth::user();
        $this->text = $request->input('textareaValue');
    }

    public function check(){
        $this->usd = 12700;
        $this->disc = 0;
        $this->overall = 0;
        $this->truePrice = 0;
        $sales = [];

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
                    $this->itemAmount += $item['amount'];
                    $sales[] = [
                        'name' => $product->title,
                        'slug' => $product->slug,
                        'product_id' => $product->id,
                        'user_id' => $this->user->id,
                        'price' => $product->price,
                        'discount' => $product->discount_price ?? $product->price,
                        'amount' => $item['amount'],
                        'overall' => $price * $item['amount']
                    ];
                }
            }
            $this->saleItems = $sales;
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
            $products = '';
            $saleDb = Sale::create($this->sale);
            foreach ($this->saleItems as $item) {
                $slug = $item['slug'];
                $name = $item['name'];
                unset($item['name']);
                unset($item['slug']);
                $item['sales_id'] = $saleDb->id;
                SaleItem::create($item);
                $url = route('front.product.show', ['slug' => $slug]);
                $products .= "<a href='".$url."'><i>".$name."</i> - ".$item['amount']." x ".$item['discount']." = ".$item['overall']."</a>\n";
            }
            CartProduct::where('user_id', auth()->user()->id)->delete();
            $text = '<b>Id:'.$saleDb->id.'
Клиент:'.$this->user->name.'
Номер тел:<code>'.$this->user->phone.'</code>
Адрес:'.$this->sale['address_place'].'
Тип доставки:'.$this->sale['collecting_type'].'
Продукты:
'.$products.'Скидка: '.$this->truePrice - $this->overall.'
Общая цена:'.$this->overall.'
Форма оплата:'.$this->payment.'
Дата:'.$saleDb['created_at'].'</b>';

            $this->submitForm($text);
            if ($this->payment === 'click') {
                $clickUrl = $this->generateClickPaymentUrl($saleDb->id, $this->overall);
                Payment::create([
                        'order_id' => $saleDb->id,
                        'click_trans_id' => 00000, // This will be updated after Click sends the completion request
                        'amount' => $this->overall,
                        'status' => 'pending',
                ]);
                return redirect($clickUrl);
            }

            $this->flashMessage = "Спасибо! Ваш заказ принят.Ожидайте звонка от менеджера для уточнения деталей заказа.";
            $this->dispatchBrowserEvent('flashMessage', ['message' => "Спасибо!\n\n\Ваш заказ принят.Ожидайте звонка от менеджера для уточнения деталей заказа.", 'style' => 'bg-success']);
        }
    }

    private function generateClickPaymentUrl($transactionId, $amount)
    {
        $queryParams = http_build_query([
            'service_id' => env('CLICK_SERVICE_ID'),
            'merchant_id' => env('CLICK_MERCHANT_ID'),
            'amount' => $amount,
            'transaction_param' => $transactionId,
            'return_url' => route('front.profile.index', ['orders']),
        ]);

        return "https://my.click.uz/services/pay?$queryParams";
    }

    public function submitForm($text)
    {
        // Validate form fields
        $telegramBotToken = '7089662981:AAGLhqK0L3VeeOy2KLfeWo1zvswVogy3K_c';
        $chatId = ['791430493', '-1002108174754']; //-1002108174754 1641704306 You'll need to obtain your chat ID from your bot
        $inlineKeyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'Получено', 'callback_data' => 'Получено'],
                ],
                [
                    ['text' => 'Доставляется', 'callback_data' => 'Доставляется']
                ],
                [
                    ['text' => 'В ожидании', 'callback_data' => 'В ожидании']
                ]
            ]
        ];

        foreach ($chatId as $chat){
            $response = Http::post("https://api.telegram.org/bot{$telegramBotToken}/sendMessage", [
                'chat_id' => $chat,
                'text' => $text,
                'parse_mode' => 'HTML',
                'reply_markup' => $inlineKeyboard,
            ]);
        }
    }

    public function checker(){
        if ($this->overall != 0){
            $sales = [
                'user_id' => $this->user->id,
                'price' => $this->overall,
                'discount' => $this->truePrice - $this->overall,
                'total_amount' => $this->itemAmount,
                'status' => 'В ожидании',
            ];
            if($this->payment == ''){
                $this->flashMessage = 'Выберите способ оплаты, пожалуйста';
                $this->dispatchBrowserEvent('flashMessage', ['message' => 'Выберите способ оплаты, пожалуйста', 'style' => 'bg-danger']);
                return null;
            }elseif($this->payment){
                $sales['payment'] = $this->payment;
            }
            if (!$this->collect && !$this->addressCollected){
                $this->flashMessage = 'Напишите адрес или выберите пункт самовывоза, пожалуйста';
                $this->dispatchBrowserEvent('flashMessage', ['message' => 'Напишите адрес или выберите пункт самовывоза, пожалуйста', 'style' => 'bg-danger']);
                return null;
            }elseif ($this->collect){
                $sales['address_place'] = $this->collect;
                $sales['collecting_type'] = 'Самовывоз';
            }elseif($this->addressCollected){
                if ($this->address['address'] && $this->address['state'] && $this->address['city']){
                    $sales['address_place'] = $this->addressCollected;
                    $sales['collecting_type'] = 'Доставка';
                }else{
                    $this->flashMessage = 'Пожалуйста, выберите город, район и улицу';
                    $this->dispatchBrowserEvent('flashMessage', ['message' => 'Пожалуйста, выберите город, район и улицу', 'style' => 'bg-danger']);
                    return null;
                }
            }
        } else {
            $this->flashMessage = 'Выберите продукты, чтобы продолжить';
            $this->dispatchBrowserEvent('flashMessage', ['message' => 'Выберите продукты, чтобы продолжить', 'style' => 'bg-danger']);
            return null;
        }
        return $sales;
    }

    public function render()
    {
        $this->check();
        return view('livewire.front.checkout')->extends('front.layout')->section('content');
    }
}
