<?php

namespace App\Http\Livewire\Front\Calculator;

use Livewire\Component;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Product;

class Led extends Component
{   
    public $calculator;
    public $ledRoomTypes;
    public $ledRoomType;
    public $ledCategory;
    public $allProducts;
    public $ledAccessoriesCategory;
    public $ledPowerBlocksCategory;
    public $ledMeter = '';
    public $error = '';
    public $pagesize = 24;
    public $watt = 0;
    public $products;
    public $allPowerBlocks;
    public $allAccessories;

    public function mount()
    {
        $this->calculator = Setting::getByGroup('calculator');

        if($this->calculator){
            $this->ledRoomTypes = $this->calculator->where('setting_key', 'led_rooms')->values() ?? collect();
            $this->ledCategory = $this->calculator->where('setting_key', 'led_category')->values()->first() ?? collect();
            $this->ledAccessoriesCategory = $this->calculator->where('setting_key', 'led_accessory_category')->values()->first() ?? collect();
            $this->ledPowerBlocksCategory = $this->calculator->where('setting_key', 'power_block_category')->values()->first() ?? collect();
        }

        $category = Category::find($this->ledCategory->setting_value);

        if($category){
            $this->allProducts = $category->products()->
            select('products.id', 'title', 'slug', 'price', 'discount_price', 'amount', 'watt', 'kelvin')->
            with('images', 'tags')->
            where('status', 1)->get();
        } else {
            $this->allProducts = collect();
        }

        $powerBlockCategory = Category::find($this->ledPowerBlocksCategory->setting_value);

        if($powerBlockCategory){
            $this->allPowerBlocks = $powerBlockCategory->products()->
            select('products.id', 'title', 'slug', 'price', 'discount_price', 'amount', 'watt', 'kelvin')->
            with('images', 'tags')->
            where('status', 1)->take(24)->get();
        } else {
            $this->allPowerBlocks = collect();
        }

        $accessoriesCategory = Category::find($this->ledAccessoriesCategory->setting_value);

        if($accessoriesCategory){
            $this->allAccessories = $accessoriesCategory->products()->
            select('products.id', 'title', 'slug', 'price', 'discount_price', 'amount', 'watt', 'kelvin')->
            with('images', 'tags')->
            where('status', 1)->take(24)->get();
        } else {
            $this->allAccessories = collect();
        }
    }

    public function setLedRoomType($value){
        $this->ledRoomType = $this->ledRoomType == $value ? null : $value;
    }

    public function calculate(){
        $this->error = '';
        $categories = [];

        if(!$this->ledRoomType){
            $this->error = '* Выберите тип помещения';
            return;
        }

        if($this->ledMeter <= 0){
            $this->error = '* Введите метраж ленты';
            return;
        }

        $category = Category::find($this->ledCategory->setting_value);

        if($category){
            $this->allProducts = $category->products()->
            select('products.id', 'title', 'slug', 'price', 'discount_price', 'amount', 'watt', 'kelvin')->
            with('images', 'tags')->
            where('status', 1)->
            where('kelvin', '>', $this->ledRoomType - 500)->
            where('kelvin', '<', $this->ledRoomType + 500)->
            get();

            $this->products = $this->allProducts;
        } else {
            $this->allProducts = collect();
        }
    }

    public function loadNext(){
        $this->pagesize += 24;
    }

    public function render()
    {
        $this->products = $this->allProducts->take($this->pagesize);

        return view('livewire.front.calculator.led', [
            'convertedProducts' => $this->products,
            'kelvin' => $this->ledRoomType,
            'watt' => $this->watt,
            'showMore' => $this->pagesize < $this->allProducts->count()
        ]);
    }
}
