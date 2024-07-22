<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Verification extends Component
{
    public $phone = '';
    public $inputCode = '';
    public $name = '';
    public $showModal = false;
    public $code = '';
    public $checkout = false;
    public $verificationSent = false;
    public $verificationAttempts = 0;
    public $maxVerificationAttempts = 3;
    public $showResendButton = false;
    public $status = 'initial'; // initial, verifying, success, failed

    protected $client;
    protected $listeners = ['showReg' => 'showModal', 'closeReg' => 'closeModal'];

    public function mount()
    {

    }

    public function showModal($isCheckout)
    {
        $this->resetForm();
        $this->showModal = true;
        if ($isCheckout){
            $this->checkout = true;
        }else{
            $this->checkout = false;
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function submitPhoneNumber()
    {
        $this->phone = preg_replace('/\D/', '', $this->phone);

        $validatedData = Validator::make(
            ['phone' => $this->phone],
            ['phone' => 'required|digits:9'],
            [
                'phone.required' => 'Поле телефона обязательно для заполнения.',
                'phone.digits' => 'Номер телефона должен состоять из 9 цифр.'
            ]
        )->validate();

        $this->phone = '998'.$this->phone;
        $this->status = 'verifying';
        $this->verificationSent = true;
        $this->showResendButton = false;
        $this->code = mt_rand(1000, 9999);
        $this->sendMessage($this->phone, "Lumen Lux код подтверждения регистрации: {$this->code}");

        $this->verificationAttempts = 0;
    }

    public function sendMessage($phoneNumber, $message, $messageId = '123', $originator = '3700')
    {
        $this->client = new Client();
        $login = env('PLAY_LOGIN');
        $pass = env('PLAY_PASS');
        dd($login." ".$pass);
        try {
            $response = $this->client->post('https://send.smsxabar.uz/broker-api/send', [
                'auth' => [$login, $pass],
                'json' => [
                    'messages' => [
                        [
                            'recipient' => $phoneNumber,
                            'message-id' => $messageId,
                            'sms' => [
                                'originator' => $originator,
                                'content' => [
                                    'text' => $message,
                                ],
                            ],
                        ],
                    ],
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function verifyCode()
    {
        if ($this->code == $this->inputCode) {
            // Code verification successful
            $this->status = 'success';

            // Check if user account exists
            $user = User::where('phone', '+'.$this->phone)->first();
            if ($user) {
                // Log in user
                Auth::login($user);
                $this->closeModal();
                if ($this->checkout){
                    return redirect()->route('front.checkout.index');
                }else{
                    $this->emit('userLoggedIn');
                }
            } else {
                $this->status = 'register';
            }
        } else {
            // Code verification failed
            $this->verificationAttempts++;

            if ($this->verificationAttempts >= $this->maxVerificationAttempts) {
                $this->showResendButton = true;
                $this->status = 'failed';
            }
        }
    }

    public function resendCode()
    {
        // Resend SMS with verification code
        $this->code = mt_rand(1000, 9999); // Generate new code
        $this->sendMessage($this->phone, "Lumen Lux код подтверждения регистрации: {$this->code}");
        $this->showResendButton = false;
        $this->verificationAttempts = 0;
        $this->status = 'verifying';
    }

    public function register()
    {
        $validatedData = Validator::make(
            ['name' => $this->name, 'phone' => $this->phone],
            [
                'name' => 'required|string|max:255',
                'phone' => 'required'
            ],
            [
                'name.required' => 'Поле имени обязательно для заполнения.',
                'name.string' => 'Имя должно быть строкой.',
                'name.max' => 'Имя не должно превышать 255 символов.',
                'phone.required' => 'Поле телефона обязательно для заполнения.'
            ]
        )->validate();

        // Create new user account
        $user = User::create([
            'name' => $this->name,
            'phone' => '+'.$this->phone,
            'password' => Hash::make(mt_rand(10000000, 99999999)), // Generate a random password
        ]);

        Auth::login($user);
        $this->closeModal();
        $this->emit('userLoggedIn');
    }

    public function resetForm()
    {
        $this->reset(['phone', 'name', 'showModal', 'code', 'verificationSent', 'verificationAttempts', 'showResendButton', 'status']);
    }

    public function render()
    {
        return view('livewire.verification');
    }
}
