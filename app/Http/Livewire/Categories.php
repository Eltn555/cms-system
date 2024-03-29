<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Tag;
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
    public $tag;
    public $tags;
    public $price;


    public function mount($slug = null)
    {
        $this->categories = Category::all();
        $this->tags = Tag::all();
        if ($slug) {
            $this->setCategory($slug);
        }
    }

    public function gotoPage($page)
    {
        $this->setPage($page);
        $this->dispatchBrowserEvent('urlChanged', ['url' => $this->category->slug . "?page=" . $page]);
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setCategory($slug)
    {
        $this->resetPage();
        $this->category = Category::with('images')->where('slug', $slug)->firstOrFail();
        $this->dispatchBrowserEvent('metaChanged', [
            'title' => 'Lumen Lux | ' . $this->category->title,
            'description' => $this->category->seo_description ?? 'Бра, споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет',
            'keywords' => $this->category->seo_title.' '.$this->category->seo_description // Assuming you have seo_keywords
        ]);
        $this->dispatchBrowserEvent('urlChanged', ['url' => $this->category->slug]);
        $this->tag = null;
    }

    public function setTag($id)
    {
        $this->tag = Tag::find($id);
        $tagId = $this->tag->id;
    }

    public function render()
    {

        if ($this->category && $this->tag === null) {
            $products = $this->category->products();
        } else if ($this->tag && $this->category) {
            $tagId = $this->tag->id;
            $products = Product::where('category_id', $this->category->id)
                ->whereHas('tags', function ($query) use ($tagId) {
                    $query->whereIn('tags.id',[$tagId]);
                });
        } else {
            $products = new Product;
        }
        $products = $products->where(function ($query) {
            $query->where('title', 'LIKE', '%' . $this->search . '%')->
            orWhere('short_description', 'LIKE', '%' . $this->search . '%')->
            orWhere('long_description', 'LIKE', '%' . $this->search . '%')->
            orWhere('price', 'LIKE', '%' . $this->search . '%')->
            orWhere('discount_price', 'LIKE', '%' . $this->search . '%')->
            orWhere('additional', 'LIKE', '%' . $this->search . '%');
        })->orderBy('created_at', 'desc')->paginate(12);
        return view('livewire.category', compact('products'))->extends('front.layout')
            ->section('content');
    }
}
