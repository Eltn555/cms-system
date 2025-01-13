<?php

namespace App\Http\Livewire\Front\Form;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use App\Models\Image;

class SendForm extends Component
{
    use WithFileUploads;

    public $name;
    public $phone;
    public $msg;
    public $images = [];
    public $flashMessage;
    public $imageIds;

    protected $listeners = ['updateImageIds' => 'setImageIds'];

    public function setImageIds($imageIds)
    {
        $this->imageIds = $imageIds;
    }
    public function submitForm()
    {
        $imagePaths = Image::whereIn('id', explode(',', $this->imageIds))->pluck('image')->map(function ($path) {
            return storage_path('app/public/' . $path); // Adjust the path prefix as needed
        })->toArray();

        $response = null;
        $imageUrls = [];
        $telegramBotToken = env('TG');
        $chatId = '-1002108174754'; // You'll need to obtain your chat ID from your bot 791430493
        $message = "New form submission:\nName: {$this->name}\nPhone: {$this->phone}\nImages: " . implode(', ', $imageUrls);
        $text = "Имя: {$this->name}\nНомер: {$this->phone}\n\nТекст: {$this->msg}";

        // Process image uploads (if any)
        if($this->name && strlen($this->name) > 2 && $this->phone && strlen(preg_replace('/\D/', '', $this->phone)) > 8){
            if ($this->imageIds){
                $mediaGroup = [];
                $request = Http::asMultipart();

                foreach ($imagePaths as $key => $imagePath) {
                    $mediaGroup[] = [
                        'type' => 'photo',
                        'media' => 'attach://' . basename($imagePath),
                        'caption' => $key == 0 ? $text : '',
                    ];

                    $request = $request->attach(basename($imagePath), file_get_contents($imagePath), basename($imagePath));
                }

                $response = $request->post("https://api.telegram.org/bot{$telegramBotToken}/sendMediaGroup", [
                    'chat_id' => $chatId,
                    'media' => json_encode($mediaGroup),
                ]);
            }else{
                $response = Http::post("https://api.telegram.org/bot{$telegramBotToken}/sendMessage", [
                    'chat_id' => $chatId,
                    'text' => $text,
                ]);
            }
            if (isset($response)) {
                if ($response->successful()) {
                    $this->dispatchBrowserEvent('FormInfo', ['text' => $message]);
                    $this->reset(['name', 'phone', 'msg', 'images']);
                    $this->flashMessage = 'Ваше сообщение успешно отправлено';
                    $this->dispatchBrowserEvent('flashMessage', [
                        'message' => $this->flashMessage,
                        'type' => 'success',
                        'style' => 'bg-success',
                    ]);
                } else {
                    // Log error details
                    Log::error('Telegram API Error', [
                        'status' => $response->status(),
                        'body' => $response->body(),
                    ]);

                    $this->flashMessage = 'Произошла ошибка. Проверьте соединение или данные.';
                    $this->dispatchBrowserEvent('flashMessage', [
                        'message' => 'Произошла ошибка. Проверьте соединение или данные.',
                        'type' => 'error',
                        'style' => 'bg-danger',
                    ]);
                }
            } else {
                Log::error('No Response from Telegram API');
                $this->flashMessage = 'Произошла ошибка. Нет ответа от Telegram API.';
                $this->dispatchBrowserEvent('flashMessage', [
                    'message' => $this->flashMessage,
                    'type' => 'error',
                    'style' => 'bg-danger',
                ]);
            }
        }else{
            $this->flashMessage = 'Пожалуйста, введите корректное имя (более 3 символов) и номер телефона (более 9 цифр).';
            $this->dispatchBrowserEvent('flashMessage', [
                'message' => 'Пожалуйста, введите корректное имя (более 3 символов) и номер телефона (более 9 цифр).',
                'type' => 'error',
                'style' => 'bg-danger',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.front.form.send-form');
    }
}
