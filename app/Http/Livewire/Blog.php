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

    public function setBlog($id){
        $this->categoryId = $id;
        $this->dispatchBrowserEvent('refresh', ['id' => $id]);
    }

    public function mount()
    {
        $this->categories = BlogCategory::all();
    }

    public function render()
    {
        $this->news = ($this->categoryId) ? \App\Models\Blog::where('category_id', $this->categoryId)->take(8)->get() : \App\Models\Blog::take(8)->get();
        foreach ($this->news as $item) {
            $item->created_at = Carbon::parse($item->created_at);
        }
        return view('livewire.blog')->extends('front.layout')->section('content');
    }
}
