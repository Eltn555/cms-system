<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Livewire\Component;
use App\Models\Portfolio;

class Portfolios extends Component
{
    public $portfolios = [];

    public function mount(){
        $this->portfolios = Portfolio::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.admin.portfolio.portfolios')->extends('admin')->section('content');
    }
}
