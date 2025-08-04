<?php

namespace App\Http\Livewire\Front\Calculator;

use Livewire\Component;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Support\Collection;
use Psy\Command\WhereamiCommand;

class Track extends Component
{
    public $calculator;
    public $roomTypes;
    public $roomTypeValue;
    public $roomSize = [
        'length' => '',
        'width' => '',
        'height' => '',
    ];
    public $roomCube;
    public $trackSizes;
    public $trackSizeValue;
    public $lux;
    public $defaultCategory;
    public $error = '';
    public $categoryId;
    public $products;
    public $categoryChanged = false;
    public $pagesize = 24;
    public $allProducts;
    public $roomColor = 0.6;

    public function mount()
    {
        $this->calculator = Setting::getByGroup('calculator');

        if($this->calculator){
            $this->roomTypes = $this->calculator->where('setting_key', 'room_types')->values() ?? collect();
            $this->trackSizes = $this->calculator->where('setting_key', 'reel_types')->values() ?? collect();
            $this->categoryId = $this->calculator->where('setting_key', 'allMagnetReelCategory')->values()->first()->setting_value ?? null;
        }

        $category = Category::find($this->categoryId);
            $this->products = $category->products()->
            select('products.id', 'title', 'slug', 'price', 'discount_price', 'amount', 'lumen')->
            with('images', 'tags')->
            where('status', 1)
            ->get();
    }

    public function upRoomColor($value){
        $this->roomColor = $this->roomColor == $value ? 0.6 : $value;
    }

    public function upTrackSizeValue($value){
        $this->trackSizeValue = $this->trackSizeValue == $value ? '' : $value;
        $this->categoryChanged = true;
    }

    public function updatedRoomSize(){
        if ($this->roomSize['height'] > 3) {
            $this->roomColor = 1.5;
        } else {
            $this->roomColor = 1.25;
        }
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

        if($this->roomSize['height'] > 3 && !$this->trackSizeValue){ //if height is more than 3 and track size is not selected, show all products except 20mm
            $category = Category::find($this->categoryId);
            $this->products = $category->products()->
            select('products.id', 'title', 'slug', 'price', 'discount_price', 'amount', 'lumen')->
            with('images', 'tags')->
            where('status', 1)
            ->where('title', 'not like', '%20-%')->where('title', 'not like', '%20 %') // remove 20mm track size
            ->get();
        } elseif($this->roomSize['height'] > 3 && str_contains($this->trackSizeValue['title'], '20')) { //if height is more than 3 and track size is 20mm, show error
            $this->error = '* Размер трека не подходит для высоких потолков';
            return;
        } elseif($this->trackSizeValue){ //if track size is selected, show products of this selected size
            $category = Category::find($this->trackSizeValue['setting_value']);
            $this->products = $category->products()->
            select('products.id', 'title', 'slug', 'price', 'discount_price', 'amount', 'lumen')->
            with('images', 'tags')->
            where('status', 1)
            ->get();
        } else { //if no track size is selected, show all products
            $category = Category::find($this->categoryId);
            $this->products = $category->products()->
            select('products.id', 'title', 'slug', 'price', 'discount_price', 'amount', 'lumen')->
            with('images', 'tags')->
            where('status', 1)
            ->get();
        }

        // Add default category if no specific selections are made
        if ($this->categoryChanged && !$this->trackSizeValue && $this->lux > 0) {}
        return;
    }

    public function loadNext(){
        $this->pagesize += 24;
    }

    public function render()
    {
        $products = $this->products->take($this->pagesize);
        return view('livewire.front.calculator.track', [
            'convertedProducts' => $products,
            'lux' => $this->lux,
            'showMore' => $this->pagesize < $this->products->count()
        ]);
    }
}
