<?php

namespace App\Http\Livewire\Front\Calculator;

use Livewire\Component;
use App\Models\Setting;

class Spot extends Component
{
    public $calculator;
    public $roomTypes;
    public $spotTypes;
    public $spotLocations;
    public $roomTypeValue;
    public $spotTypeValue;
    public $spotLocationValue;
    public $roomColor;
    public $roomSize = [
        'length' => '',
        'width' => '',
        'height' => '',
    ];
    public $roomCube;
    public $lux;
    public $defaultCategory;

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

    public function updatedRoomColor(){
        $this->lux();
    }

    public function updatedSpotTypeValue(){
        $this->lux();
    }

    public function updatedSpotLocationValue(){
        $this->lux();
    }

    public function lux(){
        if($this->roomSize['length'] && $this->roomSize['width'] && $this->roomSize['height']){
            $this->roomCube = $this->roomSize['length'] * $this->roomSize['width'] * $this->roomSize['height'];
        } else {
            $this->roomCube = 0;
        }
        if($this->roomCube > 0 && $this->roomTypeValue){
            $this->lux = $this->roomCube * $this->roomTypeValue * ($this->roomColor != 0 ? $this->roomColor : 1);
        } else {
            $this->lux = 0;
        }

        if($this->lux > 0){
            // check and set spotType or spotLocation values are set
            $categories[] = $this->defaultCategory->setting_value;
            if($this->spotTypeValue){
                $categories[] = $this->spotTypeValue;
                $categories = array_diff($categories, [$this->defaultCategory->setting_value]);
            }
            if($this->spotLocationValue){
                $categories[] = $this->spotLocationValue;
                $categories = array_diff($categories, [$this->defaultCategory->setting_value]);
            }
            $this->emit('setProducts', $this->lux, $categories);
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
