<?php

namespace App\Http\Livewire\Admin\Portfolio;

use App\Models\Portfolio;
use Livewire\Component;
use App\Models\PortfolioCategory;
use Illuminate\Support\Facades\Storage;

class CategoriesPortfolio extends Component
{
    public $categories;
    public $title;
    public $description;

    protected $listeners = ['deletee' => 'confirmed', 'update' => 'updateField'];

    public function mount(){
        $this->categories = PortfolioCategory::orderBy('created_at', 'desc')->get();
    }

    public function updateField($field, $id, $newValue)
    {
        $record = PortfolioCategory::findOrFail($id);
        $record->update([$field => $newValue]);
        $this->dispatchBrowserEvent('flash-message', ['type' => 'success', 'message' => 'Updated successfully!']);
        $this->categories = PortfolioCategory::orderBy('created_at', 'desc')->get();
    }

    public function create(){
        if ($this->title){
            PortfolioCategory::create([
               'title' => $this->title,
               'description' => $this->description
            ]);
            $this->categories = PortfolioCategory::orderBy('created_at', 'desc')->get();
            $this->title = '';
            $this->description = '';
        }else{
            $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Title required!']);
        }
    }

    public function confirmed($id){
        $portfolio = PortfolioCategory::findOrFail($id);
        $videos = $portfolio->portfolios()->pluck('video');
        if ($videos != []){
            foreach ($videos as $video){
                if ($video != ""){
                    $this->deletetion($video);
                }
            }
        }
        $portfolio->delete();
        $this->categories = PortfolioCategory::orderBy('created_at', 'desc')->get();
    }

    public function deletetion($file){
        $storagePath = str_replace(asset('storage/'), '', $file);
        if (Storage::disk('public')->exists($storagePath)) {
            Storage::disk('public')->delete($storagePath);
        }
    }

    public function render()
    {
        return view('livewire.admin.portfolio.categories-portfolio')->extends('admin')->section('content');
    }
}
