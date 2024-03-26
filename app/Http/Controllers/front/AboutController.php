<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        // You can return a view here to display your About page
        return view('front.about.index', compact('partners'));
    }
}
