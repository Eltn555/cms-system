<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Blog extends Component
{
    public $news;

    public function mount()
    {
        $this->news = \App\Models\Blog::all();
        foreach ($this->news as $item) {
            $item->created_at = Carbon::parse($item->created_at);
        }
    }

    public function render()
    {

        return view('livewire.blog')->extends('front.layout')->section('content');
    }
}
