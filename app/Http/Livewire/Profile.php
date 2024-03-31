<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        if(auth()->user()){
            return view('livewire.profile-page')->extends('front.layout')->section('content');
        }else{
            return view('livewire.profile-login-register')->extends('front.layout')->section('content');
        }
    }
}
