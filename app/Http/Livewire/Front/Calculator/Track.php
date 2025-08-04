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

        // Add default category if no specific selections are made
        if ($this->categoryChanged && !$this->trackSizeValue && $this->lux > 0) {}
        return;
    }

    public function render()
    {
        return view('livewire.front.calculator.track');
    }
}
