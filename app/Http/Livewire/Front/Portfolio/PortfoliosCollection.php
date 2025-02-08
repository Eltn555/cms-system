<?php

namespace App\Http\Livewire\Front\Portfolio;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;

class PortfoliosCollection extends Component
{
    public $news;
    public $categories;
    public $categoryId;
    public $description;

    public function mount()
    {
        $this->description = '';
        $this->categories = PortfolioCategory::all();
        foreach ($this->categories as $category){
            $this->description .= $category->title.', ';
        }
    }

    public function setBlog($id){
        $this->categoryId = $id;
        $category = PortfolioCategory::find($id);
        $this->dispatchBrowserEvent('refresh', ['id' => $id]);
        $this->dispatchBrowserEvent('metaChanged', [
            'title' => 'Lumen Lux | ' . (!isset($category->title) ? 'Блог' : $category->title),
            'description' => 'Lumen Lux, Бра, споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет',
            'keywords' => 'Lumen Lux, Бра, споты, трековые системы, Проектирование и светорасчет, Бесплатная доставка, Гарантия качества до 5 лет',
        ]);
    }

    public function render()
    {
        $this->news = ($this->categoryId) ? Portfolio::where('category_id', $this->categoryId)->take(12)->get() : Portfolio::take(12)->get();
        foreach ($this->news as $item) {
            $item->created_at = Carbon::parse($item->created_at);
        }
        return view('livewire.front.portfolio.portfolios-collection')->extends('front.layout')->section('content');
    }
}
