<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $slider = Slider::firstOrFail();
        $categories = Category::all();
        return view('front.home.index', compact('slider', 'categories'));
    }
}
