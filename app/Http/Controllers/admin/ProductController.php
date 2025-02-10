<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\WishlistProduct;
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
        $currentPageNumber = $request->query('page', 1); // Default to page 1 if not provided
        $perPage = $request->input('perPage', 10); // Default to 10 items per page
        $categories = Category::all();
        $tags = Tag::all();

        $productsQuery = Product::orderBy('created_at', 'desc');
        // If there is a search query
        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $productsQuery->where(function($query) use ($searchQuery) {
                $query->where('title', 'like', '%'.$searchQuery.'%')
                    ->orWhere('short_description', 'like', '%'.$searchQuery.'%')
                    ->orWhere('long_description', 'like', '%'.$searchQuery.'%')
                    ->orWhere('price', 'like', '%'.$searchQuery.'%')
                    ->orWhere('discount_price', 'like', '%'.$searchQuery.'%')
                    ->orWhere('seo_title', 'like', '%'.$searchQuery.'%')
                    ->orWhere('seo_description', 'like', '%'.$searchQuery.'%');
            });
        }

        // Get paginated products with perPage parameter
        $products = $productsQuery->paginate($perPage)->appends([
            'perPage' => $perPage,
            'search' => $request->input('search') // Preserve the search query
        ]);

        return view('products.index', compact('products', 'overall', 'categories', 'tags', 'perPage', 'currentPageNumber'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $next = Product::orderBy('id', 'desc')->first()->id + 1;
        $images = ProductImage::where('product_id', $next)->with('image')->get();
        if ($images){
            foreach ($images as $image){
                ProductImage::destroy($image->id);
            }
        }else{
            dd('Images deleted', $images);
        }
        return view('products.create', compact('categories', 'tags', 'next'));
    }

    public function image(Request $request)
    {
        $images = $request->file('images');
        $id = [];
        $alt = $request->has('title') ? $request->input('title') : ' ';
        // Iterate through each uploaded file
        if (is_array($images)){
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
        }else{
            return ['Response' => 'Empty', 'id' => 'null'];
        }
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
            'amount' => $data['amount'],
            'additional' => $data['additional'],
            'seo_title' => $data['seo_title'],
            'seo_description' => $data['seo_description'],
            'status' => $data['status'],
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
        if (array_key_exists('additional_products', $data)){
            foreach ($data['additional_products'] as $additional_product) {
                $tag = Tag::firstOrCreate([
                    'title' => $additional_product
                ], [
                    'visible' => 0
                ]);
                $product->additional_tags()->attach($tag->id);
            }
        }

        if (array_key_exists('categories', $data)){
            foreach ($data['categories'] as $categoryName) {
                $slug = Str::slug(Transliterator::transliterate($categoryName), '-');
                $category = Category::firstOrCreate(['title' => $categoryName], ['isActive' => 1, 'slug' => $slug]);
                $product->categories()->attach($category->id);
            }
        }

        if (array_key_exists('tags', $data)) {
            foreach ($data['tags'] as $tagName) {
                $tag = Tag::firstOrCreate([
                    'title' => $tagName
                ], [
                    'visible' => 0
                ]);
                $product->tags()->attach($tag->id);
            }
        }
        return redirect()->route('admin.products.index')->with('message', "This is Success Created");
    }

    public function edit($id, Request $request)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $products = Product::findOrFail($id);
        $currentPageNumber = $request['page'];
        return view('products.edit', compact('products', 'categories', 'tags', 'currentPageNumber'));
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
            $wishlistItem = WishlistProduct::where('product_id', $productDestroy->id)->get();
            if ($wishlistItem) {
                // Delete the Wishlist item
                $wishlistItem->each->delete();
            }
            $cartItem = CartProduct::where('product_id', $productDestroy->id)->get();
            if ($cartItem) {
                // Delete the Wishlist item
                $cartItem->each->delete();
            }
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
            $decoder = new Base64ImageDecoder($encode, ['jpeg', 'jpg', 'png', 'gif',]);
            $fileName = 'images/' . Carbon::now()->format('Y-m-d_His') . '.' . $decoder->getFormat();
            Storage::put($fileName, $decoder->getDecodedContent());
            $data['short_description'] = str_replace($encode, asset('storage/' . $fileName), $data['short_description']);
        }
        // END

        $product = Product::find($id)->update([
            'title' => $data['title'],
            'short_description' => $data['short_description'],
            'long_description' => $data['long_description'],
            'price' => $data['price'],
            'discount_price' => $data['discount_price'],
            'amount' => $data['amount'],
            'additional' => $data['additional'],
            'seo_title' => $data['seo_title'],
            'seo_description' => $data['seo_description'],
            'status' => $data['status'],
            'slug' => Str::slug(Transliterator::transliterate($data['title']), '-').'-'.$id,
        ]);

        $product = Product::find($id);
        /*// Images process
        foreach ($data['images'] as $image) {
            $storage = Storage::put('/images', $image);

            dump($storage);
            $storedImage = Image::create([
                'image' => $storage,
                'alt' => $product->title
            ]);
            $product->images()->attach($storedImage->id);
        }*/
        // Additional products (tags) process

        $categoryIds = [];
        foreach ($request->input('categories', []) as $categoryName) {
            $slug = Str::slug(Transliterator::transliterate($categoryName), '-');
            $category = Category::firstOrCreate(['title' => $categoryName], ['isActive' => 1, 'slug' => $slug]);
            $categoryIds[] = $category->id;
        }
        $product->categories()->sync($categoryIds);

        if (!empty($request['tags'])) {
            $tagIds = [];
            // Update or attach tags
            foreach ($request->input('tags', []) as $tagName) {
                $tag = Tag::firstOrCreate(['title' => $tagName], ['visible' => 0]);
                $tagIds[] = $tag->id;
            }
            $product->tags()->sync($tagIds);
        }

        // Update or attach additional products
        if (!empty($request['additional_products'])){
            $tagAddIds = [];
            foreach ($request->input('additional_products', []) as $additionalProductName) {
                $additionalProduct = Tag::firstOrCreate(['title' => $additionalProductName], ['visible' => 0]);
                $tagAddIds[] = $additionalProduct->id;
            }
            $product->additional_tags()->sync($tagAddIds); // Sync additional products without detaching existing ones
        }
        return redirect()->route('admin.products.index', ['page' => $data['page']])
            ->with('message', 'Product updated successfully');
    }
}

