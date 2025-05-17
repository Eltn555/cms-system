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
    public $roomSize = [
        'length' => '',
        'width' => '',
        'height' => '',
    ];
    
    public function mount()
    {
        $this->res();
    }

    public function res(){
        $this->calculator = Setting::getByGroup('calculator');

        if($this->calculator){
            $this->roomTypes = $this->calculator->where('setting_key', 'room_types')->values() ?? collect();
            $this->spotTypes = $this->calculator->where('setting_key', 'spot_types')->values() ?? collect();
            $this->spotLocations = $this->calculator->where('setting_key', 'spot_locations')->values() ?? collect();
        }
    }

    
    public function render()
    {
        return view('livewire.front.calculator.spot');
    }
}
