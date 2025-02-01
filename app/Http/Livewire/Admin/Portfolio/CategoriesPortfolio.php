<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Livewire\Component;

class CategoriesPortfolio extends Component
{
    public function render()
    {
        return view('livewire.admin.portfolio.categories-portfolio')->extends('admin')->section('content');
    }
}
