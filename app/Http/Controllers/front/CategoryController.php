<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::firstOrFail();
        $categories = Category::all();
        $background = $icon = null;
        foreach ($category->images as $image){
            strpos($image->alt, 'icon') !== false ? $icon = $image : $background = $image;
        }
        return view('front.category.index', compact( 'category','categories', 'icon', 'background'));
    }

    public function show(Category $category)
    {
        $categories = Category::all();
        $background = $icon = null;
        foreach ($category->images as $image){
            strpos($image->alt, 'icon') !== false ? $icon = $image : $background = $image;
        }
        return view('front.category.index', compact('category', 'categories', 'icon', 'background'));
    }

    public function search()
    {
        $data = request()->all();
        $category = Category::find((int)$data['id']);
        $products = $category->products;
        $response = [
            'title' => $category->title,
            'productsList' => view('front.category.product-card', compact('products'))->render()
        ];
        return $response;
    }
}
