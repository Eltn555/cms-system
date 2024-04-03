<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public $profile;

    public function mount() {
        $this->profile = auth()->user();
    }

    public function render()
    {
        if($this->profile){
            return view('livewire.profile-page')->extends('front.layout')->section('content');
        }else{
            return view('livewire.profile-login-register')->extends('front.layout')->section('content');
        }
    }
}
