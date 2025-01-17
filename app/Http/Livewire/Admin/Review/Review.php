<?php

namespace App\Http\Livewire\Admin\Review;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Review extends Component
{
    public $reviews;
    public $review;
    public $rate;
    public $text;
    public $status;
    public $users = [];
    public $userSearch;
    public $products = [];
    public $productSearch;
    public $deleted = false;

    public function mount($review){
        if ($review){
            $this->review = $review;
            $this->users = User::orderBy('created_at', 'desc')->take(10)->get();
            $this->products = Product::orderBy('created_at', 'desc')->where('status', '!=', 0)->take(10)->get();
            $this->text = $review->text;
        }else{
            $this->review = null;
            $this->users = collect(); // Empty collection
            $this->products = collect(); // Empty collection
            $this->text = '';
        }
    }

    public function updatedUserSearch()
    {
        if (strlen($this->userSearch) > 2) {
            $this->users = User::where('name', 'like', '%' . $this->userSearch . '%')
                ->orWhere('lastname', 'like', '%' . $this->userSearch . '%')
                ->orWhere('phone', 'like', '%' . $this->userSearch . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $this->users = User::orderBy('created_at', 'desc')->take(10)->get();
        }
    }

    public function updatedProductSearch()
    {
        if (strlen($this->productSearch) > 2) {
            $this->products = Product::where('title', 'like', '%' . $this->productSearch . '%')
                ->orWhere('price', 'like', '%' . $this->productSearch . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $this->products = Product::orderBy('created_at', 'desc')->take(10)->get();
        }
    }

    public function updateR($rev, $value, $data){
        $review = \App\Models\Review::find($rev);
        if (!$review){
            session()->flash('error', 'Review not found.');
            return;
        }
        if ($value == 'text'){
            $value = $this->text;
        }
        $review->$data = $value;
        $review->save();
        $this->userSearch = '';
        $this->productSearch = '';
        $this->review = $review;
        session()->flash('success', ucfirst($data) . ' updated successfully!');
    }

    public function render()
    {
        if (!$this->review){
            return view('livewire.admin.review.empty');
        }
        return view('livewire.admin.review.review');
    }
}
