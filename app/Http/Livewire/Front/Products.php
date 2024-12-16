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
    public $viewed;
    public $profit;
    public $profPercent;

    public function mount($slug){
        $this->product = Product::with('images', 'tags', 'additional_tags', 'categories')->where('slug', $slug)->firstOrFail();

        $this->viewed = $this->product->image ?? 0;
        $this->viewed += 1;
        $this->product->update(['image' => $this->viewed]);
        $disc = $this->product->discount_price ?? 0;
        $this->profit = $this->product->price - $disc;
        $this->profPercent = ($this->profit / $this->product->price) * 100;

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
        if (is_array($this->product->categories) && array_key_exists(0, $this->product->categories) && $this->product->status == 1){
            return view('livewire.front.products')->extends('front.layout')->section('content');
        }
        return response()->view('errors.404', [], 404);
    }
}
