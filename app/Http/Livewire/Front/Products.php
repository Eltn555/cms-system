<?php

namespace App\Http\Livewire\Front;

use App\Models\Product;
use Livewire\Component;
use App\Models\Tag;
use App\Models\Review;

class Products extends Component
{
    public $product;
    public $relatedProducts = [];
    public $additionalProducts = [];
    public $categories;
    public $viewed;
    public $profit;
    public $profPercent;
    public $rate;
    public $rates;
    public $description;

    public function mount($slug){
        $this->product = Product::with('images', 'tags', 'additional_tags', 'categories')->where('slug', $slug)->firstOrFail();
        $this->rate = Review::where('product_id', $this->product->id)->avg('rate');
        $this->rates = Review::where('product_id', $this->product->id)->count('rate');
        $this->viewed = $this->product->image ?? 0;
        $this->viewed += 1;
        $this->product->update(['image' => $this->viewed]);
        $disc = $this->product->discount_price ?? 0;
        $this->profit = $this->product->price - $disc;
        $this->profPercent = ($this->profit / $this->product->price) * 100;
        $desc = $this->product->short_description ?? $this->product->long_description;
        $this->description = strip_tags($desc);

        $relatedTags = $this->product->tags()->with(['products' => function($query) {
            $query->where('status', 1);
        }])->inRandomOrder()->take(12)->get();

        $additionalTags = $this->product->additional_tags()->with(['products' => function($query) {
            $query->where('status', 1);
        }])->inRandomOrder()->take(12)->get();

        $this->relatedProducts = $relatedTags->pluck('products')->flatten()->shuffle()->unique('id')->take(12);
        $this->additionalProducts = $additionalTags->pluck('products')->flatten()->shuffle()->unique('id')->take(12);
    }

    public function render()
    {
        return view('livewire.front.products')->extends('front.layout')->section('content');
    }
}
