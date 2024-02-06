<?php

namespace App\Http\Livewire\Front;

use App\Models\Product;
use Livewire\Component;
use App\Models\Tag;

class Products extends Component
{
    public $product;
    public $relatedProducts = [];
    public $additionalProducts = [];
    public $categories;

    public function mount($slug){
        $this->product = Product::with('images', 'tags', 'additional_tags', 'category')->where('slug', $slug)->firstOrFail();

        $relatedTags = $this->product->tags()->with('products')->inRandomOrder()->take(10)->get();
        $additionalTags = $this->product->additional_tags()->with('products')->inRandomOrder()->take(10)->get();

        $this->relatedProducts = $relatedTags->pluck('products')->flatten()->shuffle()->take(10);
        $this->additionalProducts = $additionalTags->pluck('products')->flatten()->shuffle()->take(10);
    }

    public function render()
    {
//        dd($this->product->category);
        return view('livewire.front.products')->extends('front.layout')->section('content');
    }
}
