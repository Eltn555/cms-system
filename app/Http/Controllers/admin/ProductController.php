<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use Behat\Transliterator\Transliterator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $tags = Tag::all();
        $next = Product::orderBy('id','desc')->first()->id + 1;
        return view('products.index', compact('products', 'categories', 'tags', 'next'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('products.create', compact('categories', 'tags'));
    }

    public function image(Request $request){
        $images = $request->file('image');
        $id = [];
        // Iterate through each uploaded file
        foreach ($images as $image) {
            $path = $image->store('images', 'public');
            $image = Image::create([
                'image' => $path,
                'alt' => ' ',
            ]);
            ProductImage::create([
                'product_id' => $request['id'],
                'image_id' => $image->id
            ]);
            array_push($id, $image->id);
            // Store the file in the "images" folder
        }
        return ['Response' => 'Created successfully', 'id' => $id];
    }

    protected function storeImage($product, $file, $type)
    {
        if ($file) {
            $imageName = Storage::put('images', $file);
            $image = Image::create([
                'image' => $imageName,
                'alt' => $type . " " . $product->title,
            ]);
            ProductImage::create([
                'category_id' => $product->id,
                'image_id' => $image->id
            ]);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
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
            'slug' => Str::slug(Transliterator::transliterate($data['title']), '-'),
        ]);
        //$image = Storage::put('/images', $data['image']);

        foreach ($data['additional_products'] as $additional_product){
            $tag = Tag::firstOrCreate([
                'title' => $additional_product
            ], [
                'visible' => 0
            ]);
            $product->additional_tags()->attach($tag->id);
        }

        foreach ($data['tags'] as $tagName) {
            $tag = Tag::firstOrCreate([
                'title' => $tagName
            ], [
                'visible' => 0
            ]);
            $product->tags()->attach($tag->id);
        }
        return redirect()->route('admin.products.index')->with('message', "This is Success Created");
    }
}
