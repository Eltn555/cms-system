<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Livewire\Component;

class BlogDetails extends Component
{
    public $news;
    public $blog;
    public $latest;
    public $categories;

    public function mount($id) {
        $this->latest =  Blog::latest()->take(4)->get();
        $this->news = \App\Models\Blog::find($id);
        $this->news->created_at = Carbon::parse($this->news->created_at);
        $this->categories = BlogCategory::all();
        $this->blog = \App\Models\Blog::orderBy('created_at', 'DESC')->take(3)->get();
        foreach ($this->blog as $item) {
            $item->created_at = Carbon::parse($item->created_at);
        }
    }

    public function render()
    {
        return view('livewire.blog-details')->extends('front.layout')->section('content');
    }
}
