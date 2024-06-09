<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class SearchBar extends Component
{
    public $search;
    public $results;

    public function render()
    {
        $this->results = Product::where(function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('short_description', 'like', '%' . $this->search . '%')
                ->orWhere('long_description', 'like', '%' . $this->search . '%');
        })->where('status', '!=', 0)->take(10)->get();

        return view('livewire.search-bar');
    }
}
