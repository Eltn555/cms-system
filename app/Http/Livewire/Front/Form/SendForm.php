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
    public $images = [];

    public function submitForm()
    {
        $imageUrls = [];
        // Validate form fields
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:20480', // Adjust image validation rules as needed
        ]);
        $telegramBotToken = '5757752738:AAEjFYkPsPY3w7p9-x5gZO5n3al-ki7fUFs';
        $chatId = '791430493'; // You'll need to obtain your chat ID from your bot
        $message = "New form submission:\nName: {$this->name}\nPhone: {$this->phone}\nImages: " . implode(', ', $imageUrls);

        // Process image uploads (if any)
        foreach ($this->images as $image) {
            $imageData = file_get_contents($image->getRealPath());
            $response = Http::attach('photo', $imageData, $image->getClientOriginalName())
                ->post("https://api.telegram.org/bot{$telegramBotToken}/sendPhoto", [
                    'chat_id' => $chatId,
                    'caption' => "Name: {$this->name}\nPhone: {$this->phone}",
                ]);
        }
        $this->dispatchBrowserEvent('FormInfo', ['text' => $message]);
        // Clear form fields after submission
        $this->reset(['name', 'phone', 'images']);
        // Show success message (optional)
        session()->flash('message', 'Form submitted successfully!');
    }

    public function render()
    {
        return view('livewire.front.form.send-form');
    }
}
