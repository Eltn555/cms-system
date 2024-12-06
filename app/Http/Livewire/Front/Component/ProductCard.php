<?php

namespace App\Http\Livewire\Front\Component;


use App\Models\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use App\Models\Product;
use App\Models\Tag;

class ProductCard extends Component
{
    public $tags;
    public $product;
    public $image;
    public $info;
    public $buttonClass;
    public $profit;
    public $profPercent;
    public function mount($product){
        $this->product = $product;
        $this->info = 'nothing yet';
        $this->tags = $product->tags()->where('visible', 1)->take(3)->get();
        $this->image = $product->images()->first();
        $disc = $product->discount_price ?? 0;
        $this->profit = $product->price - $disc;
        $this->profPercent = ($this->profit / $product->price) * 100;
    }

    public function check($productid)
    {
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

    public function addProduct($productid)
    {
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
//        $this->buttonClass = $this->check($this->product->id) ? 'back-color-primary' : '';
    }

    public function showProduct($slug)
    {
        return redirect()->to('/product/' . $slug);
    }

    public function render()
    {
        return view('livewire.front.component.product-card');
    }
}
