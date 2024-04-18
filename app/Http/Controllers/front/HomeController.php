<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\Banner;
use Illuminate\Http\Request;
use Behat\Transliterator\Transliterator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $sliders = Slider::all();
        $slider = Slider::all();
        $categories = Category::with('images')->where('is_active', 1)->get();
        $partners = Partner::all();
        $tagsIndex = Tag::take(4)->get();
        /*foreach ($tagsIndex as $tag) {
            foreach ($tag->products as $product){
                dump($product->toArray());
            }
        }
        die();*/
//        foreach ($categories as $category){
//            $slug = Str::slug(Transliterator::transliterate($category->title), '-');
//            $data = [
//                'slug' => $slug,
//            ];
//            $category->update($data);
//        }
        return view('front.home.index', compact('slider', 'categories', 'partners', 'tagsIndex', 'banners'));
    }
}
