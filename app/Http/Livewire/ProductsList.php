<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductsList extends Component
{
    public function render()
    {
        return view('livewire.products-list')
            ->extends('front.master')
            ->section('content');
    }
}
