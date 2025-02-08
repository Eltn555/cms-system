<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\BlogCategory;

class Blog extends Component
{
    public $news;
    public $categories;
    public $categoryId;
    public $description;
    public $category1;
    public $category2;

    public function setBlog($id){
        $this->categoryId = $id;
        $category = BlogCategory::find($id);
        $this->dispatchBrowserEvent('refresh', ['id' => $id]);
        $this->dispatchBrowserEvent('metaChanged', [
            'title' => 'Lumen Lux | ' . (!isset($category->title) ? 'Блог' : $category->title),
            'description' => 'Бра, споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет',
            'keywords' => 'Бра, споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет',
        ]);
    }

    public function mount()
    {
        $this->category1 = BlogCategory::with(['news' => function ($query) {
            $query->take(6);
        }])->first();
        $this->category2 = BlogCategory::with(['news' => function ($query) {
            $query->take(6);
        }])->skip(1)->first();
        $this->description = '';
        $this->categories = BlogCategory::all();
        foreach ($this->categories as $category){
            $this->description .= $category->title.', ';
        }
    }

    public function render()
    {
        $this->news = ($this->categoryId) ? \App\Models\Blog::where('category_id', $this->categoryId)->take(12)->get() : \App\Models\Blog::take(12)->get();
        foreach ($this->news as $item) {
            $item->created_at = Carbon::parse($item->created_at);
        }
        return view('livewire.blog')->extends('front.layout')->section('content');
    }
}
