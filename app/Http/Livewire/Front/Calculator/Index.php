<?php

namespace App\Http\Livewire\Front\Calculator;

use Livewire\Component;

class Index extends Component
{
    public $activeTab = 'led';

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.front.calculator.index')->extends('front.layout')->section('content');
    }
}
