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
        
        if (count($categories) === 1) {
            // If only one category, get all products from that category
            $this->categories = Category::whereIn('id', $categories)->with('products')->get();
            $this->products = $this->categories->flatMap(function($category) {
                return $category->products->where('status', 1)->take(20);
            });
        } else {
            // If multiple categories, get products that exist in all categories
            $this->categories = Category::whereIn('id', $categories)->with('products')->get();
            
            // Get all products from the first category
            $firstCategoryProducts = $this->categories->first()->products;
            
            // Filter products that exist in all other categories
            $this->products = $firstCategoryProducts->filter(function($product) {
                return $this->categories->every(function($category) use ($product) {
                    //get 20 products from category where is_active is 1
                    $products = $category->products->where('status', 1)->take(20);
                    return $products->contains('id', $product->id);
                });
            });
        }
    }

    public function render()
    {
        return view('livewire.front.calculator.index', [
            'products' => $this->products,
            'lux' => $this->lux
        ])->extends('front.layout')->section('content');
    }
}
