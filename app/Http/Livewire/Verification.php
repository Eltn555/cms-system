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

    public function showModal()
    {
        $this->resetForm();
        $this->showModal = true;
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
            ['phone' => 'required|digits:9']
        )->validate();

        $this->phone = '998'.$this->phone;
        $this->status = 'verifying';
        $this->verificationSent = true;
        $this->showResendButton = false;
        $this->code = mt_rand(1000, 9999);
        $this->sendMessage($this->phone, "Your verification code is: {$this->code}");

        $this->verificationAttempts = 0;
    }

    public function sendMessage($phoneNumber, $message, $messageId = '123', $originator = '3700')
    {
        $this->client = new Client();
        try {
            $response = $this->client->post('https://send.smsxabar.uz/broker-api/send', [
                'auth' => ['lumenlux', '|RU1&C#It6}s'],
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
                $this->emit('userLoggedIn');
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
        $this->sendMessage($this->phone, "Your new verification code is: {$this->code}");
        $this->showResendButton = false;
        $this->verificationAttempts = 0;
        $this->status = 'verifying';
    }

    public function register()
    {
        $validatedData = Validator::make(
            ['name' => $this->name, 'phone' => $this->phone],
            ['name' => 'required|string|max:255', 'phone' => 'required']
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
