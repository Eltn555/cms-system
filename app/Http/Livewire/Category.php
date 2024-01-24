<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Category extends Component
{
    public $categories;
    public $category;
    public $background;
    public $icon;
    public $products;

    public function mount()
    {
        $this->categories = \App\Models\Category::all();
        $this->products = \App\Models\Product::all();
        $this->category = \App\Models\Category::firstOrFail();
    }


    public function render()
    {
        return view('livewire.category');
    }
}
