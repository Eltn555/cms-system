<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Livewire\Component;
use App\Models\Portfolio;

class Portfolios extends Component
{
    public $portfolios = [];
    public $delete;

    protected $listeners = ['load' => 'loader'];

    public function mount(){
        $this->portfolios = Portfolio::orderBy('created_at', 'desc')->get();
    }

    public function loader(){
        $this->portfolios = Portfolio::orderBy('created_at', 'desc')->get();
    }

    public function delete($deletion){
        $this->delete = $deletion;
    }

    public function confirm(){
        $portfolio = Portfolio::findOrFail($this->delete);
        $portfolio->delete();
        $this->portfolios = Portfolio::orderBy('created_at', 'desc')->get();
        $this->delete = null;
    }

    public function render()
    {
        return view('livewire.admin.portfolio.portfolios')->extends('admin')->section('content');
    }
}
