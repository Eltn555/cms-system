<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCount extends Component
{
    public $cartCount = 0;
    public $overall;
    public $cartArray;

    protected $listeners = ['checkCount' => 'checkItems'];

    public function mount(){
        $cartCookie = Cookie::get('cart');
        $this->cartArray = ($cartCookie) ? json_decode($cartCookie, true) : [];

        if(auth()->user() && !empty($this->cartArray)) {
            $user = auth()->user();
            foreach($this->cartArray as $item) {
                // Check if the product already exists in the user's cart
                $existingCartItem = CartProduct::where('user_id', $user->id)
                    ->where('product_id', $item['product_id'])
                    ->first();

                if (!$existingCartItem) {
                    // Product doesn't exist in the cart, create a new entry
                    CartProduct::create([
                        'user_id' => $user->id,
                        'product_id' => $item['product_id'],
                        'amount' => $item['amount']
                    ]);
                }
            }
            // Remove the cart cookie after processing its items
            Cookie::queue(Cookie::forget('cart'));
            // Refresh the cartArray with the user's updated cart items
            $this->cartArray = $user->cartItems->toArray();
            $this->emit('cartUpdated');
        }
    }

    public function checkItems(){
        $this->overall = 0;
        if (Auth::check()){
            $this->cartCount = CartProduct::where('user_id', auth()->user()->id)->sum('amount');
        }else{
            $cartCookie = Cookie::get('cart');
            if ($cartCookie){
                $cartArray = json_decode($cartCookie, true);
                $totalAmount = 0;

                foreach ($cartArray as $item) {
                    $product = Product::where('id', $item['product_id'])->first();
                    if (isset($item['amount']) && $product != null) {
                        $totalAmount += $item['amount'];
                    }
                }
                $this->cartCount = $totalAmount;
            }
        }
    }


    public function render()
    {
        $this->checkItems();
        return view('livewire.front.cart.cart-count');
    }
}
