<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Categories extends Component
{
    public $category;
    public $categories;
    public $icon;
    public $background;

    public function mount($slug)
    {
        // Load the category based on the provided slug
        $this->category = Category::where('slug', $slug)->firstOrFail();
    }

    public function loadCategory(Category $category)
    {
        $this->categories = Category::all();
        $this->icon = null;
        $this->background = null;

        foreach ($category->images as $image) {
            if (strpos($image->alt, 'icon') !== false) {
                $this->icon = $image;
            } else {
                $this->background = $image;
            }
        }
    }

    public function render()
    {
        // Call the loadCategory method to load category data and images
        $this->loadCategory($this->category);

        // Your Livewire component logic goes here
        return view('livewire.category')->extends('front.layout')
            ->section('content');
    }
}
