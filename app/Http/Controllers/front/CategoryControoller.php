<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryControoller extends Controller
{
    public function index() {
        $category = Category::firstOrFail();
        $categories = Category::all();

        return view('front.category.index', compact('category', 'categories'));
    }

    public function show($id) {
        $category = Category::find($id);

        dump($category);

        Dump($category->products);
        Dump($category->products[0]->images);

    }

    public function search() {
        $data = request()->all();
        $category = Category::find((int)$data['id']);
        $response = [
            'title'=> $category->title
        ];
        return $response;
    }
}
