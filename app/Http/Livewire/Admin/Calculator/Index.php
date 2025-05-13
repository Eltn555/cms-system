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
    public $currentRoomType = [];
    public $currentSpotType = [];
    public $currentSpotLocation = [];
    public $updating = 0;

    public function mount()
    {
        $this->res();
    }

    public function createNew($var)
    {
        $data = $this->validate([
            "$var.title" => 'required',
            "$var.description" => 'required',
            "$var.media" => 'required',
            "$var.setting_value" => 'required',
            "$var.setting_group" => 'required',
            "$var.setting_key" => 'required',
        ], [
            "$var.title.required" => 'Название обязательно',
            "$var.description.required" => 'Описание обязательно',
            "$var.media.required" => 'Иконка обязательна',
            "$var.setting_value.required" => 'Настройки обязательны',
        ]);
        Setting::create($data[$var]);
        $this->res();
    }

    public function edit($id){
        if($this->updating==$id){
            $this->res();
        }else{
            $this->currentRoomType = Setting::find($id)->toArray();
            $this->updating = $id;
        }
    }

    public function update($var){
        $id = $this->updating;
        $data = $this->validate([
            "$var.title" => 'required',
            "$var.description" => 'required',
            "$var.media" => 'required',
            "$var.setting_value" => 'required',
            "$var.setting_key" => 'required',
            "$var.setting_group" => 'required',
        ], [
            "$var.title.required" => 'Название обязательно',
            "$var.description.required" => 'Описание обязательно',
            "$var.media.required" => 'Иконка обязательна',
            "$var.setting_value.required" => 'Настройки обязательны',
        ]);
        Setting::find($id)->update($data[$var]);
        $this->res();
    }

    public function res(){
        $this->calc_options = Setting::getByGroup('calculator');

        if($this->calc_options){
            $this->roomTypes = $this->calc_options->where('setting_key', 'room_types')->values() ?? collect();
            $this->spotTypes = $this->calc_options->where('setting_key', 'spot_types')->values() ?? collect();
            $this->spotLocations = $this->calc_options->where('setting_key', 'spot_locations')->values() ?? collect();
        }
        $this->updating = 0;
        $this->currentRoomType = [ 'title' => '', 'description' => '', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'room_types' ];
        $this->currentSpotType = [ 'title' => '', 'description' => '', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'spot_types' ];
        $this->currentSpotLocation = [ 'title' => '', 'description' => '', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'spot_locations' ];
    }

    public function render()
    {
        return view('livewire.admin.calculator.index')->extends('admin')->section('content');
    }
}
