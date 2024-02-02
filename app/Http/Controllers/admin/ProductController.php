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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Melihovv\Base64ImageDecoder\Base64ImageDecoder;

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
        $categories = Category::all();
        $tags = Tag::all();
        $next = Product::orderBy('id','desc')->first()->id + 1;
        return view('products.create', compact('categories', 'tags', 'next'));
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
        preg_match_all('/src="([^"]*)"/', $data['short_description'], $matches);

        foreach ($matches[0] as $value) {
            $encode = substr($value, 5, strlen($value)-6);
            $decoder = new Base64ImageDecoder($encode,['jpeg', 'jpg','png', 'gif']);
            $fileName = 'images/' . Carbon::now()->format('Y-m-d_His') . '.' . $decoder->getFormat();
            Storage::put($fileName, $decoder->getDecodedContent());
            $data['short_description'] = str_replace($encode, asset('storage/' . $fileName), $data['short_description']);
        }

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
