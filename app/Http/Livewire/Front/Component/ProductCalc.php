<?php

namespace App\Http\Livewire\Front\Component;

use App\Models\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class ProductCalc extends Component
{
    public $tags;
    public $product;
    public $image;
    public $info;
    public $buttonClass;
    public $profit;
    public $profPercent;
    public $lux;
    public $meter;
    public $infoCalc;
    public $type;
    public $morePcs = 1.1; // 10% more pcs

    public function mount($product, $value, $type){
        $this->updatedProduct($product, $value, $type);
    }

    public function updatedProduct($product, $value, $type){
        $this->product = $product;
        $this->tags = $product->tags()->where('visible', 1)->take(3)->get() ?? collect();
        $this->image = $product->images()->first();
        $disc = $product->discount_price ?? 0;
        $this->profit = $product->price - $disc;
        $this->profPercent = ($this->profit / $product->price) * 100;
        $this->type = $type;

        switch($type){
            case 'spot':
                $this->lux = $value;
                $this->infoCalc = $this->getPcsByLm(); // pcs by lm
                break;
            case 'led':
                $this->meter = $value;
                $this->infoCalc = $this->getWattByM(); // watt by m
                break;
            case 'power':
                $this->infoCalc = $product->watt; // pcs by lm
                break;
        }
        
        if($type == 'spot'){
            $this->lux = $value;
            $this->infoCalc = $this->getPcsByLm(); // pcs by lm
        }elseif($type == 'led' || $type == 'power'){
            $this->meter = $value;
            $this->infoCalc = $this->getWattByM(); // watt by m
        }
    }
    
    public function check($productid){
        if (Auth::check()) {
            // Check for logged-in user's wishlist
            return WishlistProduct::where('user_id', auth()->user()->id)
                ->where('product_id', $productid)
                ->exists();
        } else {
            // Check for non-logged-in user's wishlist stored in cookies
            $wishlistCookie = Cookie::get('wishlist');
            if ($wishlistCookie) {
                // Deserialize the cookie string into an array
                $wishlistArray = json_decode($wishlistCookie, true);

                // Check if the product id is in the array
                return in_array($productid, $wishlistArray);
            }

            return false;
        }
    }

    public function addProduct($productid){
        if (Auth::check()) {
            if ($this->check($productid)) {
                WishlistProduct::where('user_id', auth()->user()->id)
                    ->where('product_id', $productid)
                    ->delete();
                return false;
            } else {
                WishlistProduct::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productid
                ]);
            }
            $this->emit('wishlistAddUpdated');
        } else {
            // User is not logged in, save data in cookies
            $wishlistCookie = Cookie::get('wishlist') ?? '[]'; // Default to an empty JSON array string if the cookie is not set

            // Decode the JSON string into an array
            $wishlistArray = json_decode($wishlistCookie, true);

            if (!in_array($productid, $wishlistArray)) {
                // Product is not in the wishlist cookie
                $wishlistArray[] = $productid;
            } else {
                // Product is already in the wishlist cookie, remove it
                $wishlistArray = array_diff($wishlistArray, [$productid]);
            }

            // Encode the array back to JSON
            $updatedWishlistCookie = json_encode($wishlistArray);

            Cookie::queue('wishlist', $updatedWishlistCookie, 60 * 24 * 30); // 30 days expiration, adjust as needed
            $this->emit('wishlistAddUpdated');
            $this->info = Cookie::get('wishlist');
        }
    }

    public function getWattByM(){
        $watt = $this->product->watt;
        if($watt && $this->meter){
            return $watt * $this->meter .' Вт';
        }
        return null;
    }

    public function getPcsByLm(){
        $lumen = $this->product->lumen; // lumens

        if (!$lumen || !$this->lux) {
            return null;
        }

        return ceil($this->lux * $this->morePcs / $lumen).' шт';
    }

    public function showProduct($slug)
    {
        return redirect()->to('/product/' . $slug);
    }

    public function render()
    {
        return view('livewire.front.component.product-calc');
    }
}
