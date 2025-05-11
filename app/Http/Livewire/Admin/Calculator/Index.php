<?php

namespace App\Http\Livewire\Admin\Calculator;

use Livewire\Component;
use App\Models\Setting;

class Index extends Component
{
    public $roomTypes;
    public $spotTypes;
    public $spotLocations;

    public function mount()
    {
        $this->roomTypes = Setting::getByGroup('room_types');
        $this->spotTypes = Setting::getByGroup('spot_types');
        $this->spotLocations = Setting::getByGroup('spot_locations');
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
