<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store($title, $price, $image)
    {
        Cart::instance('wishlist')->add($title, $price, $image)->associate('App/Models/Product');
        return redirect()->back();
    }
}
