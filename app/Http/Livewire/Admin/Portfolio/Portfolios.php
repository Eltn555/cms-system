<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Portfolio;

class Portfolios extends Component
{
    public $portfolios = [];

    protected $listeners = ['load' => 'loader', 'deleted' => 'confirm'];

    public function mount(){
        $this->portfolios = Portfolio::orderBy('created_at', 'desc')->get();
    }

    public function loader(){
        $this->portfolios = Portfolio::orderBy('created_at', 'desc')->get();
    }

    public function confirm($id){
        $portfolio = Portfolio::findOrFail($id);
        $this->deletetion($portfolio->video);
        $portfolio->delete();
        $this->portfolios = Portfolio::orderBy('created_at', 'desc')->get();
    }

    public function deletetion($file){
        $storagePath = str_replace(asset('storage/'), '', $file);
        if (Storage::disk('public')->exists($storagePath)) {
            Storage::disk('public')->delete($storagePath);
        }
    }

    public function render()
    {
        return view('livewire.admin.portfolio.portfolios')->extends('admin')->section('content');
    }
}
