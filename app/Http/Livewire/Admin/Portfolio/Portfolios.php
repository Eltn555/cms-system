<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Livewire\Component;

class Portfolios extends Component
{
    public function render()
    {
        return view('livewire.admin.portfolio.portfolios')->extends('admin')->section('content');
    }
}
