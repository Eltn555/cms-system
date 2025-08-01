<?php

namespace App\Http\Livewire\Admin\Calculator;

use Livewire\Component;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $categories;
    public $calc_options;

    // Spot
    public $allSpotCategory = [];
    public $currentSpotType = [];
    public $currentSpotLocation = [];
    public $roomTypes = [];
    public $currentRoomType = [];
    public $spotTypes = [];
    public $spotLocations = [];

    // Led
    public $currentLedRoom = [];
    public $ledRooms = [];
    public $allLedCategory = [];
    public $allPowerBlockCategory = [];
    public $allLedAccessoryCategory = [];

    // Magnet reels
    public $reelTypes = [];
    public $currentReelType = [];
    public $allMagnetReelCategory = [];
    public $allReelPowerBlockCategory = [];
    public $allReelAccessoryCategory = [];

    public $updating = [ 'id' => 0, 'var' => '' ];
    public $delete = '';

    public $rules = [
        'allSpotCategory.setting_value' => 'required|integer',
        'allLedCategory.setting_value' => 'required|integer',
        'allPowerBlockCategory.setting_value' => 'required|integer',
        'allLedAccessoryCategory.setting_value' => 'required|integer',
        'allMagnetReelCategory.setting_value' => 'required|integer',
        'allReelPowerBlockCategory.setting_value' => 'required|integer',
        'allReelAccessoryCategory.setting_value' => 'required|integer',
    ];

    public function mount()
    {
        $this->categories = Category::all();
        $this->res();
    }

    public function validation($var){
        return $this->validate([
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
    }

    public function updateCategories($var){
        if(isset($this->$var['id'])){
            Setting::find($this->$var['id'])->update([
                'title' => $this->categories->where('id', $this->$var['setting_value'])->first()->title,
                'setting_value' => $this->$var['setting_value'],
            ]);
        }else{
            $this->$var = Setting::create([
                'title' => $this->categories->where('id', $this->$var['setting_value'])->first()->title,
                'setting_value' => $this->$var['setting_value'],
                'setting_group' => 'calculator',
                'setting_key' => $var
            ]);
        }
        $this->res();
    }

    public function res(){
        $this->calc_options = Setting::getByGroup('calculator');

        if($this->calc_options){
            $this->allSpotCategory = $this->calc_options->where('setting_key', 'spot_category')->values()->first();
            $this->roomTypes = $this->calc_options->where('setting_key', 'room_types')->values() ?? collect();
            $this->ledRooms = $this->calc_options->where('setting_key', 'led_rooms')->values() ?? collect();
            $this->spotTypes = $this->calc_options->where('setting_key', 'spot_types')->values() ?? collect();
            $this->spotLocations = $this->calc_options->where('setting_key', 'spot_locations')->values() ?? collect();
            $this->allLedCategory = $this->calc_options->where('setting_key', 'led_category')->values()->first();
            $this->allPowerBlockCategory = $this->calc_options->where('setting_key', 'power_block_category')->values()->first();
            $this->allLedAccessoryCategory = $this->calc_options->where('setting_key', 'led_accessory_category')->values()->first();
            $this->reelTypes = $this->calc_options->where('setting_key', 'reel_types')->values() ?? collect();
            $this->allMagnetReelCategory = $this->calc_options->where('setting_key', 'allMagnetReelCategory')->values()->first();
            $this->allReelPowerBlockCategory = $this->calc_options->where('setting_key', 'allReelPowerBlockCategory')->values()->first();
            $this->allReelAccessoryCategory = $this->calc_options->where('setting_key', 'allReelAccessoryCategory')->values()->first();
        }
        $this->updating = [ 'id' => 0, 'var' => '' ];
        $this->currentLedRoom = [ 'title' => '', 'description' => '', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'led_rooms' ];
        $this->currentRoomType = [ 'title' => '', 'description' => '', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'room_types' ];
        $this->currentSpotType = [ 'title' => '', 'description' => 'desc', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'spot_types' ];
        $this->currentSpotLocation = [ 'title' => '', 'description' => 'desc', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'spot_locations' ];
        $this->currentReelType = [ 'title' => '', 'description' => 'desc', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'reel_types' ];
    }

    public function createNew($var){
        $data = $this->validation($var);

        if($var == 'currentSpotType' || $var == 'currentSpotLocation' || $var == 'currentLedRoom' || $var == 'currentReelType'){
            $data[$var]['media'] = $this->saveFile($data[$var]['media']);
        }

        Setting::create($data[$var]);
        $this->res();
    }

    public function edit($id, $var){
        if($this->updating['id']==$id){
            $this->res();
        }else{
            $this->$var = Setting::find($id)->toArray();
            $this->updating['id'] = $id;
            $this->updating['var'] = $var;
        }
    }

    public function delete($id){
        $this->delete = $id;
    }

    public function cancelDelete(){
        $this->delete = '';
    }

    public function confirmDelete(){
        $setting = Setting::find($this->delete);
        if($setting){
            if($setting->setting_key == 'spot_types' || $setting->setting_key == 'spot_locations' || $setting->setting_key == 'led_rooms'){
                Storage::disk('public')->delete($setting->media);
            }
            $setting->delete();
        }
        $this->delete = '';
        $this->res();
    }

    public function update($var){
        $id = $this->updating['id'];
        $data = $this->validation($var);
        if($var == 'currentSpotType' || $var == 'currentSpotLocation' || $var == 'currentLedRoom' || $var == 'currentReelType'){
            if($data[$var]['media'] && !is_string($data[$var]['media'])){
                // Delete old file if it exists
                $oldSetting = Setting::find($id);
                if($oldSetting && $oldSetting->media) {
                    Storage::disk('public')->delete($oldSetting->media);
                }
                // Upload new file
                $data[$var]['media'] = $this->saveFile($data[$var]['media']);
            }
        }
        Setting::find($id)->update($data[$var]);
        $this->res();
    }

    public function saveFile($media){
        $filename = date('YmdHis') . '-' . rand(10000, 99999).'_'.rand(10000, 99999).'.'.$media->getClientOriginalExtension();
        $filename = $media->storeAs('calc', $filename, 'public');
        return $filename;
    }

    public function render()
    {
        return view('livewire.admin.calculator.index')->extends('admin')->section('content');
    }
}
