<?php

namespace App\Http\Livewire\Front\Calculator;

use Livewire\Component;

class Index extends Component
{
    public $activeTab = 'spot';

    // get query as tab=spot or tab=led
    public function mount()
    {
        $this->activeTab = request()->query('tab') ? request()->query('tab') : 'spot';
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
        $this->dispatchBrowserEvent('update-url', ['tab' => $tab]);
    }

    public function render()
    {
        return view('livewire.front.calculator.index')->extends('front.layout')->section('content');
    }
}
