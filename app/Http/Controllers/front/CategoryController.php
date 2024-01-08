<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::firstOrFail();
        $categories = Category::all();

        return view('front.category.index', compact('category', 'categories'));
    }

    public function show(Category $category) {
        $categories = Category::all();
        return view('front.category.index', compact('category', 'categories'));
    }

    public function search() {
        $data = request()->all();
        $category = Category::find((int)$data['id']);
        $products = $category->products;
        $response = [
            'title'=> $category->title,
            'productsList'=> view('front.category.product-card', compact('products'))->render()
        ];
        return $response;
    }
}
