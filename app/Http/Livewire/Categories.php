<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    public $category;
    public $categories;
    public $icon;
    public $background;

    public function mount($slug)
    {
        $this->setCategory($slug);
        $this->categories = Category::all();
    }

    public function gotoPage($page)
    {
        $this->setPage($page);
        $this->dispatchBrowserEvent('urlChanged', ['url' => $this->category->slug."?page=".$page]);
    }

    public function setCategory($slug)
    {
        $this->resetPage();
        $this->category = Category::with('images')->where('slug', $slug)->firstOrFail();
        $this->dispatchBrowserEvent('metaChanged', [
            'title' => 'Lumen Lux | '.$this->category->title,
            'description' => $this->category->seo_description,
            'keywords' => $this->category->seo_title // Assuming you have seo_keywords
        ]);
        $this->icon = null;
        $this->background = null;
        foreach ($this->category->images as $image) {
            if (strpos($image->alt, 'icon') !== false) {
                $this->icon = $image;
            } else {
                $this->background = $image;
            }
        }
        $this->dispatchBrowserEvent('urlChanged', ['url' => $this->category->slug]);
    }

    public function render()
    {
        $products = $this->category
            ? $this->category->products()->paginate(12)
            : collect();

        return view('livewire.category', compact('products'))->extends('front.layout')
            ->section('content');
    }
}
