<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Category;

class CategoryBanner extends Component
{
    public $background;
    public $icon;
    public $category;

    public function mount()
    {
        $this->background = '';
        $this->icon = '';
        $this->category = Category::all();
    }

    public function render()
    {
        return view('livewire.category-banner')
            ->extends('front.master')
            ->section('content');
    }
}
