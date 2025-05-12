<?php

namespace App\Http\Livewire\Admin\Calculator;

use Livewire\Component;
use Livewire\WithValidation;
use App\Models\Setting;

class Index extends Component
{
    public $calc_options;
    public $roomTypes = [];
    public $spotTypes = [];
    public $spotLocations = [];
    public $newRoomType = [];
    public $newSpotType = [];
    public $newSpotLocation = [];

    public function mount()
    {
        $this->res();
    }

    public function createNew($var)
    {
        $data = $this->validate([
            "$var.*.title" => 'required',
            "$var.*.description" => 'required',
            "$var.*.media" => 'required',
            "$var.*.setting_value" => 'required',
        ], [
            "$var.*.title.required" => 'Название обязательно',
            "$var.*.description.required" => 'Описание обязательно',
            "$var.*.media.required" => 'Иконка обязательна',
            "$var.*.setting_value.required" => 'Настройки обязательны',
        ]);
        Setting::create($data);
        $this->res();
    }

    public function res(){
        if(Setting::getByGroup('calculator')->count() == 0){
            $this->calc_options = Setting::getByGroup('calculator');
            $this->roomTypes = $this->calc_options->where('setting_key', 'room_types') ?? [];
            $this->spotTypes = $this->calc_options->where('setting_key', 'spot_types') ?? [];
            $this->spotLocations = $this->calc_options->where('setting_key', 'spot_locations') ?? [];
        }

        $this->newRoomType = [ 'title' => '', 'description' => '', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'room_types' ];
        $this->newSpotType = [ 'title' => '', 'description' => '', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'spot_types' ];
        $this->newSpotLocation = [ 'title' => '', 'description' => '', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'spot_locations' ];
    }

    public function render()
    {
        return view('livewire.admin.calculator.index')->extends('admin')->section('content');
    }
}
