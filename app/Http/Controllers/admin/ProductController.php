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
use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Melihovv\Base64ImageDecoder\Base64ImageDecoder;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10); // Default to 10 items per page
        $categories = Category::all();
        $products = Product::orderBy('created_at', 'desc')->paginate($perPage);
        $tags = Tag::all();

        return view('products.index', compact('products', 'categories', 'tags', 'perPage'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $next = Product::orderBy('id', 'desc')->first()->id + 1;
        return view('products.create', compact('categories', 'tags', 'next'));
    }

    public function image(Request $request)
    {
        $images = $request->file('images');
        $id = [];
        $alt = $request->has('title') ? $request->input('title') : ' ';
        // Iterate through each uploaded file
        if ($images){
            foreach ($images as $image) {
                $path = $image->store('images', 'public');
                $image = Image::create([
                    'image' => $path,
                    'alt' => $alt,
                ]);

                ProductImage::create([
                    'product_id' => $request['id'],
                    'image_id' => $image->id
                ]);
                array_push($id, $image->id);
            }
            return ['Response' => 'Created successfully', 'id' => $id];
        }
        return ['Response' => 'No images to store', 'images' => count($images)];
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
        // Process Short description images
        preg_match_all('/src="([^"]*)"/', $data['short_description'], $matches);

        foreach ($matches[0] as $value) {
            $encode = substr($value, 5, strlen($value) - 6);
            $decoder = new Base64ImageDecoder($encode, ['jpeg', 'jpg', 'png', 'gif']);
            $fileName = 'images/' . Carbon::now()->format('Y-m-d_His') . '.' . $decoder->getFormat();
            Storage::put($fileName, $decoder->getDecodedContent());
            $data['short_description'] = str_replace($encode, asset('storage/' . $fileName), $data['short_description']);
        }
        // END

        $next = Product::orderBy('id', 'desc')->first()->id + 1;
        // Create product
        $product = Product::create([
            'title' => $data['title'],
            'short_description' => $data['short_description'],
            'long_description' => $data['long_description'],
            'price' => $data['price'],
            'discount_price' => $data['discount_price'],
            //'amount' => $data['amount'],
            'category_id' => $data['category_id'],
            'additional' => $data['additional'],
            'seo_title' => $data['seo_title'],
            'seo_description' => $data['seo_description'],
            //'status' => $data['status'],
            'slug' => Str::slug(Transliterator::transliterate($data['title']), '-')."-".$next,
        ]);

        $images = ProductImage::where('product_id', $next)->with('image')->get();
        // Images process
        foreach ($images as $productImage) {
            // Access image properties, e.g., $productImage->image->id, $productImage->image->url, etc.
            $image = $productImage->image;

            // Check if $productId and $createdProductId are different
            if ($next != $product->id) {
                // Update ProductImage's product_id
                $productImage->update(['product_id' => $product->id]);
            }
            // Update associated Image's alt
            $image->update(['alt' => $data['title']]);
        }

        // Additional products (tags) process
        foreach ($data['additional_products'] as $additional_product) {
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

    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $products = Product::findOrFail($id);
        return view('products.edit', compact('products', 'categories', 'tags'));
    }

    public function ajaxUpdate(Request $request, Product $product){
        $field = $request->input('field');
        $value = $request->input('value');
        $id = $request->input('productID');
        $data = [$field => $value];

        if ($field === 'title') {
            $data['slug'] = Str::slug(Transliterator::transliterate($value), '-');
        } elseif ($field === 'delete'){
            $productDestroy = Product::findOrFail($id);
            $productDestroy->delete();

            return [
                'response' => "Product deleted successfully"
            ];
        }
        Product::find($id)->update($data);
        return ['Response' => 'Updated successfully'];
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        // Process Short description images
        preg_match_all('/src="([^"]*)"/', $data['short_description'], $matches);

        foreach ($matches[0] as $value) {
            $encode = substr($value, 5, strlen($value) - 6);
            $decoder = new Base64ImageDecoder($encode, ['jpeg', 'jpg', 'png', 'gif']);
            $fileName = 'images/' . Carbon::now()->format('Y-m-d_His') . '.' . $decoder->getFormat();
            Storage::put($fileName, $decoder->getDecodedContent());
            $data['short_description'] = str_replace($encode, asset('storage/' . $fileName), $data['short_description']);
        }
        // END

        // Create product
        $product = Product::find($id)->update([
            'title' => $data['title'],
            'short_description' => $data['short_description'],
            'long_description' => $data['long_description'],
            'price' => $data['price'],
            'discount_price' => $data['discount_price'],
            //'amount' => $data['amount'],
            'category_id' => $data['category_id'],
            'additional' => $data['additional'],
            'seo_title' => $data['seo_title'],
            'seo_description' => $data['seo_description'],
            //'status' => $data['status'],
            'slug' => Str::slug(Transliterator::transliterate($data['title']), '-'),
        ]);

        /*// Images process
        foreach ($data['images'] as $image) {
            $storage = Storage::put('/images', $image);

            dump($storage);
            $storedImage = Image::create([
                'image' => $storage,
                'alt' => $product->title
            ]);
            $product->images()->attach($storedImage->id);
        }
        // Additional products (tags) process
        foreach ($data['additional_products'] as $additional_product) {
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
        }*/
        return redirect()->route('admin.products.index')->with('message', "This is Success Created");
    }
}

