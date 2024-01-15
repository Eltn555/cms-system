<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Category extends Component
{
    public $categories;
    public $category;
    public $background;
    public $icon;

    public function mount()
    {

        $this->categories = \App\Models\Category::all();
        $this->category = \App\Models\Category::firstOrFail();
    }

    public function render()
    {
        return view('livewire.category');
    }
}
