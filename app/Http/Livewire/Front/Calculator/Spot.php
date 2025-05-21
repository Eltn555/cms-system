<?php

namespace App\Http\Livewire\Front\Calculator;

use Livewire\Component;
use App\Models\Setting;
use App\Models\Category;
class Spot extends Component
{
    public $calculator;
    public $roomTypes;
    public $spotTypes;
    public $spotLocations;
    public $roomTypeValue;
    public $spotTypeValue;
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

    //testing
    public $spotTypeTitle;
    public $spotLocationTitle;

    public function mount()
    {
        $this->res();
    }

    public function updatedRoomSize(){
        $this->lux();
    }

    public function updatedRoomTypeValue(){
        $this->lux();
    }

    public function upRoomColor($value){
        $this->roomColor = $this->roomColor == $value ? 0.6 : $value;
        $this->lux();
    }

    public function upSpotTypeValue($value){
        $this->spotTypeValue = $this->spotTypeValue == $value ? '' : $value;
        $this->lux();
    }

    public function upSpotLocationValue($value){
        $this->spotLocationValue = $this->spotLocationValue == $value ? '' : $value;
        $this->lux();
    }

    public function lux(){
        if($this->roomSize['length'] && $this->roomSize['width'] && $this->roomSize['height']){
            $this->roomCube = $this->roomSize['length'] * $this->roomSize['width'] * ($this->roomSize['height'] > 3 ? 1.5 : 1.25);
        } else {
            $this->roomCube = 0;
        }
        if($this->roomCube > 0 && $this->roomTypeValue){
            $this->lux = $this->roomCube * $this->roomTypeValue / ($this->roomColor != 0 ? $this->roomColor : 1);
        } else {
            $this->lux = 0;
        }

        $categories = [];
            
        // Add default category if no specific selections are made
        if (!$this->spotTypeValue && !$this->spotLocationValue) {
            $categories[] = $this->defaultCategory->setting_value;
        }
        
        // Add spot type if selected
        if ($this->spotTypeValue) {
            $categories[] = $this->spotTypeValue;
            $this->spotTypeTitle = Category::find($this->spotTypeValue)->title;
        }
        
        // Add spot location if selected
        if ($this->spotLocationValue) {
            $categories[] = $this->spotLocationValue;
            $this->spotLocationTitle = Category::find($this->spotLocationValue)->title;
        }
            
        if($this->lux > 0){
            $this->emit('setProducts', $this->lux, $categories);
        } else {
            $this->emit('setProducts', null, $categories);
        }
    }

    public function res(){
        $this->calculator = Setting::getByGroup('calculator');

        if($this->calculator){
            $this->roomTypes = $this->calculator->where('setting_key', 'room_types')->values() ?? collect();
            $this->spotTypes = $this->calculator->where('setting_key', 'spot_types')->values() ?? collect();
            $this->spotLocations = $this->calculator->where('setting_key', 'spot_locations')->values() ?? collect();
            $this->defaultCategory = $this->calculator->where('setting_key', 'spot_category')->values()->first() ?? null;
        }
    }

    
    public function render()
    {
        return view('livewire.front.calculator.spot');
    }
}
