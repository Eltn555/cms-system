<?php

namespace App\Http\Livewire\Admin\Calculator;

use Livewire\Component;
use Livewire\WithValidation;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $categories;
    public $calc_options;
    public $roomTypes = [];
    public $spotTypes = [];
    public $spotLocations = [];
    public $currentRoomType = [];
    public $currentSpotType = [];
    public $allSpotCategory = [];
    public $currentSpotLocation = [];
    public $updating = [ 'id' => 0, 'var' => '' ];
    public $delete = '';

    public $rules = [
        'allSpotCategory.setting_value' => 'required|integer', // or whatever validation you need
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

    public function updateAllSpotCategory()
    {
        if(isset($this->allSpotCategory['id'])){
            Setting::find($this->allSpotCategory['id'])->update([
                'title' => $this->categories->where('id', $this->allSpotCategory['setting_value'])->first()->title,
                'setting_value' => $this->allSpotCategory['setting_value'],
            ]);
        }else{
            $this->allSpotCategory = Setting::create([
                'title' => $this->categories->where('id', $this->allSpotCategory['setting_value'])->first()->title,
                'setting_value' => $this->allSpotCategory['setting_value'],
                'setting_group' => 'calculator',
                'setting_key' => 'spot_category'
            ]);
        }
        
        $this->res();
    }

    public function res(){
        $this->calc_options = Setting::getByGroup('calculator');

        if($this->calc_options){
            $this->allSpotCategory = $this->calc_options->where('setting_key', 'spot_category')->values()->first();
            $this->roomTypes = $this->calc_options->where('setting_key', 'room_types')->values() ?? collect();
            $this->spotTypes = $this->calc_options->where('setting_key', 'spot_types')->values() ?? collect();
            $this->spotLocations = $this->calc_options->where('setting_key', 'spot_locations')->values() ?? collect();
        }
        $this->updating = [ 'id' => 0, 'var' => '' ];
        $this->currentRoomType = [ 'title' => '', 'description' => '', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'room_types' ];
        $this->currentSpotType = [ 'title' => '', 'description' => 'desc', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'spot_types' ];
        $this->currentSpotLocation = [ 'title' => '', 'description' => 'desc', 'setting_value' => '', 'media' => '', 'setting_group' => 'calculator', 'setting_key' => 'spot_locations' ];
    }

    public function createNew($var){
        $data = $this->validation($var);

        if($var == 'currentSpotType' || $var == 'currentSpotLocation'){
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
            if($setting->setting_key == 'spot_types' || $setting->setting_key == 'spot_locations'){
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
        if($var == 'currentSpotType' || $var == 'currentSpotLocation'){
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
        $filename = $media->getClientOriginalName();
        $filename = preg_replace('/[^a-zA-Z0-9]/', '', $filename);
        $filename = str_replace(' ', '-', $filename);
        $filename = $media->storeAs('calc', $filename, 'public');
        return $filename;
    }

    public function render()
    {
        return view('livewire.admin.calculator.index')->extends('admin')->section('content');
    }
}
