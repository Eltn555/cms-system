<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        $slider = Slider::all()[$sliders->count()-1];
        $categories = Category::with('images')->get();
        return view('front.home.index', compact('slider', 'categories'));
    }
}
