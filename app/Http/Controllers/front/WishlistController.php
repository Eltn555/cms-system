<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index()
    {
        return view('front.wishlist.index');
    }
}

