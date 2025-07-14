<?php

namespace App\Http\Livewire\Front\Calculator;

use Livewire\Component;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Support\Collection;

class Spot extends Component
{
    public $calculator;
    public $roomTypes;
    public $spotLocations;
    public $roomTypeValue;
    public $spotLocationValue;
    public $roomColor = 0.6;
    public $roomSize = [
        'length' => '',
        'width' => '',
        'height' => '',
    ];
    public $roomCube;
    public $lux;
    public $defaultCategory;
    public $error = '';
    public $categoryId;
    public $products;
    public $categoryChanged = false;
    public $pagesize = 24;
    public $allProducts;

    public function mount()
    {
        $this->calculator = Setting::getByGroup('calculator');

        if($this->calculator){
            $this->roomTypes = $this->calculator->where('setting_key', 'room_types')->values() ?? collect();
            $this->spotLocations = $this->calculator->where('setting_key', 'spot_locations')->values() ?? collect();
            $this->categoryId = $this->calculator->where('setting_key', 'spot_category')->values()->first()->setting_value ?? null;
        }
        
        $this->setProducts($this->categoryId);
    }

    public function upRoomColor($value){
        $this->roomColor = $this->roomColor == $value ? 0.6 : $value;
    }

    public function upSpotLocationValue($value){
        $this->spotLocationValue = $this->spotLocationValue == $value ? '' : $value;
        $this->categoryChanged = true;
    }

    public function calculate(){
        if($this->roomSize['length'] && $this->roomSize['width'] && $this->roomSize['height']){
            $this->roomCube = $this->roomSize['length'] * $this->roomSize['width'] * ($this->roomSize['height'] > 3 ? 1.5 : 1.25);
        } else {
            $this->roomCube = 0;
        }
        if($this->roomCube > 0 && $this->roomTypeValue){
            $this->lux = $this->roomCube * $this->roomTypeValue / $this->roomColor;
        } else {
            $this->error = '* Выберите тип помещения и введите размеры помещения';
            $this->lux = 0;
            return;
        }

        $this->error = '';

        // Add default category if no specific selections are made
        if ($this->categoryChanged && !$this->spotLocationValue && $this->lux > 0) {
            $this->setProducts($this->categoryId);
        }elseif($this->spotLocationValue && $this->lux > 0){
            $this->setProducts($this->spotLocationValue);
        }
    }

    public function setProducts($categoryId){
        $this->categoryChanged = false;
        $category = Category::find($categoryId);
        if ($category) {
            $this->products = $category->products()->
            select('products.id', 'title', 'slug', 'price', 'discount_price', 'amount', 'lumen')->
            with('images', 'tags')->
            where('status', 1)->get();
        } else {
            $this->products = collect();
        }
    }

    public function loadNext(){
        $this->pagesize += 24;
    }
    
    public function render()
    {
        $products = $this->products->take($this->pagesize);
        return view('livewire.front.calculator.spot', [
            'convertedProducts' => $products,
            'lux' => $this->lux,
            'showMore' => $this->pagesize < $this->products->count()
        ])->extends('front.layout')->section('content');
    }
}
