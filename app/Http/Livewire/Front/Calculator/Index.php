<?php

namespace App\Http\Livewire\Front\Calculator;

use Livewire\Component;
use App\Models\Category;
use App\Models\Setting;
class Index extends Component
{
    public $lux;
    public $categories;
    public $products;
    protected $listeners = ['setProducts'];

    public function mount()
    {
        $category = Setting::where('setting_key', 'spot_category')->first();
        $this->setProducts(null, [$category->setting_value]);
    }

    public function setProducts($lux, $categories)
    {
        $this->lux = $lux;
        
        $this->categories = Category::whereIn('id', $categories)->with('products')->get();

        $categoryProducts = $this->categories->map(function ($category) {
            return $category->products->pluck('id')->toArray();
        })->toArray();

        $commonProductIds = count($categoryProducts) > 1
            ? array_intersect(...$categoryProducts)
            : ($categoryProducts[0] ?? []);

        $this->products = collect($this->categories->flatMap->products)
            ->where('status', 1)
            ->unique('id')
            ->whereIn('id', $commonProductIds)
            ->take(20)
            ->values();
    }

    public function render()
    {
        return view('livewire.front.calculator.index', [
            'products' => $this->products,
            'lux' => $this->lux
        ])->extends('front.layout')->section('content');
    }
}
