<?php

namespace App\Http\Livewire\Front\Portfolio;

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
        return view('livewire.front.portfolio.portfolios-collection')->extends('front.layout')->section('content');
    }
}
