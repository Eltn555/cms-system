<?php

namespace App\Http\Livewire\Front;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $product;
    public $relatedProducts;
    public $additionalProducts;
    public $firstImage;

    public function mount($slug){
        $this->product = Product::with('images', 'tags', 'additional_tags', 'category')->where('slug', $slug)->firstOrFail();
        $this->relatedProducts = $this->product->tags()->take(10)->get();
        $this->additionalProducts = $this->product->additional_tags()->take(10)->get();
    }

    public function render()
    {
//        dd($this->additionalProducts);
        return view('livewire.front.products')->extends('front.layout')->section('content');
    }
}
