<?php

namespace App\Http\Livewire\Front\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Onclick extends Component
{
    public $name;
    public $phone;
    public $product;
    public $text = 'hey';
    public $flashMessage;
    public $user;

    public function mount(){
        $this->user = Auth::user();
        if (Auth::user()){
            $this->name = $this->user->name;
            $this->phone = substr($this->user->phone, -9);
        }
    }


    public function checker(){
        $this->text = $this->product->title;
        if ($this->phone && $this->name){
            $url = route('front.product.show', ['slug' => $this->product->slug]);
            $text = '<b>Клиент:'.$this->name.'
Номер тел:<code>+998'.$this->phone.'</code>
Продукты:
'."<a href='".$url."'><i>".$this->product->title."</i></a></b>";
            $this->submitForm($text);
            $this->flashMessage = 'Выберите способ оплаты, пожалуйста';
            $this->dispatchBrowserEvent('flashMessage', ['message' => 'Заказ получен, мы вам перезвоним в ближайшее время.', 'style' => 'bg-success']);
        }else{
            $this->flashMessage = 'Выберите способ оплаты, пожалуйста';
            $this->dispatchBrowserEvent('flashMessage', ['message' => 'Пожалуйста, заполните имя и номер телефона', 'style' => 'bg-danger']);
        }
    }

    public function submitForm($text)
    {
        // Validate form fields
        $telegramBotToken = '7089662981:AAGLhqK0L3VeeOy2KLfeWo1zvswVogy3K_c';
        $chatId = ['791430493', '-1002108174754']; //1641704306 You'll need to obtain your chat ID from your bot

        foreach ($chatId as $chat){
            $response = Http::post("https://api.telegram.org/bot{$telegramBotToken}/sendMessage", [
                'chat_id' => $chat,
                'text' => $text,
                'parse_mode' => 'HTML',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.front.component.onclick');
    }
}
