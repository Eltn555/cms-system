<?php

namespace App\Http\Livewire\Front\Calculator;

use Livewire\Component;
use App\Models\Setting;
use App\Models\Category;

class Led extends Component
{   
    public $ledRoomTypes;
    public $ledRoomType;
    public $ledCategory;
    public $allProducts;
    public $ledMeter = '';
    public $error = '';
    public $pagesize = 24;
    public $watt = 0;
    public $products;
    public $allPowerBlocks;
    public $allAccessories;

    public function mount()
    {
        $calculator = Setting::getByGroup('calculator');

        if($calculator){
            $this->ledRoomTypes = $calculator->where('setting_key', 'led_rooms')->values() ?? collect();
            $this->ledCategory = $calculator->where('setting_key', 'led_category')->values()->first() ?? collect();
            $ledAccessoriesCategory = $calculator->where('setting_key', 'led_accessory_category')->values()->first() ?? collect();
            $ledPowerBlocksCategory = $calculator->where('setting_key', 'power_block_category')->values()->first() ?? collect();
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

        $powerBlockCategory = Category::find($ledPowerBlocksCategory->setting_value);

        if($powerBlockCategory){
            $this->allPowerBlocks = $powerBlockCategory->products()->
            select('products.id', 'title', 'slug', 'price', 'discount_price', 'amount', 'watt', 'kelvin')->
            with('images', 'tags')->
            where('status', 1)->take(24)->get();
        } else {
            $this->allPowerBlocks = collect();
        }

        $accessoriesCategory = Category::find($ledAccessoriesCategory->setting_value);

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
            'meter' => $this->ledMeter,
            'showMore' => $this->pagesize < $this->allProducts->count()
        ]);
    }
}
