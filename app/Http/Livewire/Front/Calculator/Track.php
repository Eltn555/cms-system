<?php

namespace App\Http\Livewire\Front\Calculator;

use Livewire\Component;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Support\Collection;

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
        }
    }

    public function upRoomColor($value){
        $this->roomColor = $this->roomColor == $value ? 0.6 : $value;
    }

    public function upTrackSizeValue($value){
        $this->trackSizeValue = $this->trackSizeValue == $value ? '' : $value;
        $this->categoryChanged = true;
    }

    public function calculate(){
        return;
    }

    public function render()
    {
        return view('livewire.front.calculator.track');
    }
}
