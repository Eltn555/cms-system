<?php

namespace App\Http\Livewire\Admin\Calculator;

use Livewire\Component;
use App\Models\Setting;

class Index extends Component
{
    public $calc_options;
    public $roomTypes = [];
    public $spotTypes = [];
    public $spotLocations = [];

    public function mount()
    {
        try{
            $this->calc_options = Setting::getByGroup('calculator');
            $this->roomTypes = $this->calc_options->where('setting_key', 'room_types')->get();
            $this->spotTypes = $this->calc_options->where('setting_key', 'spot_types')->get();
            $this->spotLocations = $this->calc_options->where('setting_key', 'spot_locations')->get();
        }catch(\Exception $e){
            $this->calc_options = [];
        }
    }

    public function create()
    {
        $this->validate([
            'roomTypes' => 'required',
            'spotTypes' => 'required',
            'spotLocations' => 'required',
        ]);
    }
    public function render()
    {
        return view('livewire.admin.calculator.index')->extends('admin')->section('content');
    }
}
