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
        $this->setCategory($slug);
        $this->categories = Category::all();
    }

    public function loadCategory(Category $category)
    {
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

    public function setCategory($slug)
    {
        $this->category = Category::with('images')->where('slug', $slug)->firstOrFail();
        $this->loadCategory($this->category);
    }

    public function render()
    {
        return view('livewire.category')->extends('front.layout')
            ->section('content');
    }
}
