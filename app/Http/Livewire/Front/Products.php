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
        $this->product = Product::with('images', 'tags', 'additional_tags', 'categories')->where('slug', $slug)->firstOrFail();

        $relatedTags = $this->product->tags()->with(['products' => function($query) {
            $query->where('status', 1);
        }])->inRandomOrder()->take(10)->get();

        $additionalTags = $this->product->additional_tags()->with(['products' => function($query) {
            $query->where('status', 1);
        }])->inRandomOrder()->take(10)->get();

        $this->relatedProducts = $relatedTags->pluck('products')->flatten()->shuffle()->unique('id')->take(10);
        $this->additionalProducts = $additionalTags->pluck('products')->flatten()->shuffle()->unique('id')->take(10);
    }

    public function render()
    {
        return view('livewire.front.products')->extends('front.layout')->section('content');
    }
}
