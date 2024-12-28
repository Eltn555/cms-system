<?php

namespace App\Http\Livewire\Front\Component;

use Livewire\Component;
use App\Models\Product;
use App\Models\Review;

class Reviews extends Component
{
    public $product;
    public $rated = 0;

    public function mount($product){
        $this->product = $product;
    }

    public function rate($point){
        $this->rated = $point;
    }

    public function render()
    {
        return view('livewire.front.component.reviews');
    }
}
