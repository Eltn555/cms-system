<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\WishlistProduct;
use Illuminate\Support\Facades\Auth;
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
    public $search;


    public function mount($slug)
    {
        $this->setCategory($slug);
        $this->categories = Category::all();
    }

    public function check($productid)
    {
        return Auth::check() ? WishlistProduct::where('user_id', auth()->user()->id)->where('product_id', $productid)->exists() : false;
    }

    public function addProduct($productid)
    {
        if (Auth::check()) {
            if ($this->check($productid)) {
                session()->flash('message', 'Already added product to wishlist');
                return false;
            } else {
                $this->emit('wishlistAddUpdated');
                WishlistProduct::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productid
                ]);
            }
        }

    }

    public function gotoPage($page)
    {
        $this->setPage($page);
        $this->dispatchBrowserEvent('urlChanged', ['url' => $this->category->slug . "?page=" . $page]);
    }

    public function setCategory($slug)
    {
        $this->resetPage();
        $this->category = Category::with('images')->where('slug', $slug)->firstOrFail();
        $this->dispatchBrowserEvent('metaChanged', [
            'title' => 'Lumen Lux | ' . $this->category->title,
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
        $products = $this->category->products()->where(function ($query) {
            $query->where('title', 'LIKE', '%' . $this->search . '%')->
            orWhere('short_description', 'LIKE', '%' . $this->search . '%')->
            orWhere('long_description', 'LIKE', '%' . $this->search . '%')->
            orWhere('price', 'LIKE', '%' . $this->search . '%')->
            orWhere('discount_price', 'LIKE', '%' . $this->search . '%')->
            orWhere('additional', 'LIKE', '%' . $this->search . '%');
        })->paginate(12);

        return view('livewire.category', compact('products'))->extends('front.layout')
            ->section('content');
    }
}
