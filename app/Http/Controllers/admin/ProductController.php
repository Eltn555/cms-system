<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $tags = Tag::all();
        return view('products.index', compact('products', 'categories', 'tags'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        //$image = Storage::put('/images', $data['image']);

        $product = Product::create([
            'title' => $data['title'],
            'short_description' => $data['short_description'],
            'long_description' => $data['long_description'],
            'price' => $data['price'],
            'discount_price' => $data['discount_price'],
            //'amount' => $data['amount'],
            'category_id' => $data['category_id'],
            //'additional' => $data['additional'],
            'seo_title' => $data['seo_title'],
            'seo_description' => $data['seo_description'],
            //'status' => $data['status'],
            'additional_products' => $data['additional_products'],
            //'image' => $image,
        ]);

        foreach ($data['tags'] as $tag) {
            ProductTag::create([
               'product_id'=>$product->id,
               'tag_id'=>$tag
            ]);
        }

        return redirect()->route('admin.products.index')->with('message', "This is Success Created");
    }
}
