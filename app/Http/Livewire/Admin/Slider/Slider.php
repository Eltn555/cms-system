<?php

namespace App\Http\Livewire\Admin\Slider;

use Livewire\Component;

class Slider extends Component
{
    public $sliders;


    public function mount()
    {

        $this->sliders = \App\Models\Slider::all();
    }

    public function render()
    {
        return view('livewire.admin.slider.slider');
    }
}
