<?php

namespace App\Http\Livewire\Front;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;

class Checkout extends Component
{
    public $user;
    public $text;
    public $collect;
    public function mount(Request $request)
    {
        $this->collect = '';
        $this->user = Auth::user();
        $this->text = $request->input('textareaValue');
    }

    public function updateCollect($value)
    {
        $this->collect = $value;
    }

    public function render()
    {
        return view('livewire.front.checkout')->extends('front.layout')->section('content');
    }
}
