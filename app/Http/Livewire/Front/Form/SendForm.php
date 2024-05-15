<?php

namespace App\Http\Livewire\Front\Form;

use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class SendForm extends Component
{
    use WithFileUploads;

    public $name;
    public $phone;
    public $msg;
    public $images = [];
    public $flashMessage;

    public function submitForm()
    {
        $response = null;
        $imageUrls = [];

        $telegramBotToken = '7089662981:AAGLhqK0L3VeeOy2KLfeWo1zvswVogy3K_c';
        $chatId = ['791430493',  '-1002108174754']; // You'll need to obtain your chat ID from your bot
        $message = "New form submission:\nName: {$this->name}\nPhone: {$this->phone}\nImages: " . implode(', ', $imageUrls);
        $text = "Имя: {$this->name}\nНомер: {$this->phone}\n\nТекст: {$this->msg}";

        // Process image uploads (if any)
        if ($this->images){
            foreach ($this->images as $image) {
                $imageData = file_get_contents($image->getRealPath());
                foreach ($chatId as $chat){
                    $response = Http::attach('photo', $imageData, $image->getClientOriginalName())
                        ->post("https://api.telegram.org/bot{$telegramBotToken}/sendPhoto", [
                            'chat_id' => $chat,
                            'caption' => $text,
                        ]);
                }
            }
        }else{
            if ($this->name && $this->phone){
                foreach ($chatId as $chat){
                    $response = Http::post("https://api.telegram.org/bot{$telegramBotToken}/sendMessage", [
                        'chat_id' => $chat,
                        'text' => $text,
                    ]);
                }
            }else{
                $this->flashMessage = 'Пожалуйста, введите номер телефона и имя, чтобы связаться с вами';
                $this->dispatchBrowserEvent('flashMessage', ['message' => 'Пожалуйста, введите номер телефона и имя, чтобы связаться с вами', 'type' => 'error', 'style' => 'bg-danger']);
                return $this->flashMessage;
            }
        }
        if ($response){
            $this->dispatchBrowserEvent('FormInfo', ['text' => $message]);
            // Clear form fields after submission
            $this->reset(['name', 'phone', 'msg', 'images']);
            $this->flashMessage = 'Ваше сообщение успешно отправлено';
            $this->dispatchBrowserEvent('flashMessage', ['message' => 'Ваше сообщение успешно отправлено', 'type' => 'success', 'style' => 'bg-success']);
        }else{
            $this->flashMessage = 'Произошла ошибка. Выберите фотографию размером не более 20 МБ или повторите попытку позже.';
            $this->dispatchBrowserEvent('flashMessage', ['message' => 'Произошла ошибка. Выберите фотографию размером не более 20 МБ или повторите попытку позже.', 'type' => 'error', 'style' => 'bg-danger']);
        }
    }

    public function render()
    {
        return view('livewire.front.form.send-form');
    }
}
