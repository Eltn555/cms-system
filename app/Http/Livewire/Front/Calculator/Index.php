<?php

namespace App\Http\Livewire\Front\Calculator;

use Livewire\Component;
use App\Models\Category;

class Index extends Component
{
    public $lux;
    public $categories;
    public $products;
    protected $listeners = ['setProducts'];

    public function setProducts($lux, $categories)
    {
        $this->lux = $lux;
        $this->categories = Category::whereIn('id', $categories)->with('products')->get();
        $this->products = $this->categories->flatMap(function($category){
            return $category->products;
        });
    }

    public function render()
    {
        return view('livewire.front.calculator.index')->extends('front.layout')->section('content');
    }
}
