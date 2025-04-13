<?php

namespace App\Http\Livewire\Front\Portfolio;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Support\Carbon;
use Livewire\Component;

class PortfoliosView extends Component
{
    public $portfolio;
    public $latest;
    public $categories;

    public function mount($slug) {
        $this->portfolio = Portfolio::where('info', $slug)->first();
        $this->latest =  Portfolio::where('id', '!=', $this->portfolio->id)->latest()->take(12)->get();
        $this->portfolio->created_at = Carbon::parse($this->portfolio->created_at);
        $this->categories = PortfolioCategory::all();
    }

    public function render()
    {
        return view('livewire.front.portfolio.portfolios-view')->extends('front.layout')->section('content');
    }
}
