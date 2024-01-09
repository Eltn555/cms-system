<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryBanner extends Component
{
    public $background;
    public $icon;
    public $category;

    public function mount($background, $icon, $category)
    {
        $this->background = $background;
        $this->icon = $icon;
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.category-banner')
            ->extends('front.master')
            ->section('content');
    }
}
