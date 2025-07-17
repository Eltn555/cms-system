<?php

namespace App\Http\Livewire\Front\Calculator;

use Livewire\Component;
use App\Models\Setting;
use App\Models\Category;

class Led extends Component
{   
    public $calculator;
    public $ledRoomTypes;
    public $ledRoomType;
    public $ledCategory;
    public $ledAccessoriesCategory;
    public $ledPowerBlocksCategory;
    public $ledMeter = '';
    public $error = '';

    public function mount()
    {
        $this->res();
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

        // Add default category if no specific selections are made
        if (!$this->ledCategory) {
            $categories[] = $this->ledCategory->setting_value;
        } else{
            $this->error = '* Категория не выбрана в админ панели';
            return;
        }
        
        if($this->ledMeter > 0){
            $this->emit('setProducts', $this->ledMeter, $categories);
        } else {
            $this->emit('setProducts', null, $categories);
        }
    }

    public function res(){
        $this->calculator = Setting::getByGroup('calculator');

        if($this->calculator){
            $this->ledRoomTypes = $this->calculator->where('setting_key', 'led_rooms')->values() ?? collect();
            $this->ledCategory = $this->calculator->where('setting_key', 'led_category')->values()->first() ?? collect();
            $this->ledAccessoriesCategory = $this->calculator->where('setting_key', 'led_accessory_category')->values()->first() ?? collect();
            $this->ledPowerBlocksCategory = $this->calculator->where('setting_key', 'led_power_block_category')->values()->first() ?? collect();
        }
    }

    public function render()
    {
        return view('livewire.front.calculator.led');
    }
}
