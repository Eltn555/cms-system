<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Slider;
use Illuminate\Http\Request;
use Behat\Transliterator\Transliterator;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        $slider = Slider::all()[$sliders->count()-1];
        $categories = Category::with('images')->get();
        $partners = Partner::all();
//        foreach ($categories as $category){
//            $slug = Str::slug(Transliterator::transliterate($category->title), '-');
//            $data = [
//                'slug' => $slug,
//            ];
//            $category->update($data);
//        }
        return view('front.home.index', compact('slider', 'categories', 'partners'));
    }
}
