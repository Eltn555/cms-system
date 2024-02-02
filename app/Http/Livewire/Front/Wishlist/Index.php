<?php

namespace App\Http\Livewire\Front\Wishlist;


use App\Models\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $products;

    protected $listeners = ['wishlistRemove' => 'wishlistRemove'];

    public function mount()
    {
        $user = auth()->user();
        $this->products = $user->wishlists;
    }

    public function wishlistRemove()
    {
        dd('test');
    }

    public function render()
    {
        return view('livewire.front.wishlist.index');
    }
}


