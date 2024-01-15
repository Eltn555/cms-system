<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Category;

class CategoryBanner extends Component
{
    public $background;
    public $icon;
    public $categories;

    public function mount()
    {
        $this->background = '';
        $this->icon = '';
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.category-banner')
            ->extends('front.master')
            ->section('content');
    }
}
