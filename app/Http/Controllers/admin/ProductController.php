<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\WishlistProduct;
use Behat\Transliterator\Transliterator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Melihovv\Base64ImageDecoder\Base64ImageDecoder;
use App\Services\extractData;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $currentPageNumber = $request->query('page', 1); // Default to page 1 if not provided
        $perPage = $request->input('perPage', 10); // Default to 10 items per page
        $categories = Category::all();
        $tags = Tag::all();

        $productsQuery = Product::orderBy('created_at', 'desc');
        $overall = count($productsQuery->get());
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
        if($data['short_description']){
            $data['short_description'] = $this->handleShortDescription($data['short_description']);
        }
        
        if($data['additional']){
            $extraction = new extractData();
            $extractedData = $extraction->extractData($data['additional']);
            $data['watt'] = $extractedData['watt'];
            $data['lumen'] = $extractedData['lumen'];
            $data['kelvin'] = $extractedData['kelvin'];
        }

        $categories = $data['categories'];
        $tags = $data['tags'];
        $additional_products = $data['additional_products'];

        // remove additional_products from data
        unset($data['additional_products']);
        unset($data['categories']);
        unset($data['tags']);
        
        $next = Product::orderBy('id', 'desc')->first()->id + 1;
        $data['slug'] = Str::slug(Transliterator::transliterate($data['title']), '-')."-".$next;

        // Create product
        $product = Product::create($data);
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
        if ($additional_products != null){
            foreach ($additional_products as $additional_product) {
                $tag = Tag::firstOrCreate([
                    'title' => $additional_product
                ], [
                    'visible' => 0
                ]);
                $product->additional_tags()->attach($tag->id);
            }
        }
        

        if ($categories != null){
            foreach ($categories as $categoryName) {
                $slug = Str::slug(Transliterator::transliterate($categoryName), '-');
                $category = Category::firstOrCreate(['title' => $categoryName], ['isActive' => 1, 'slug' => $slug]);
                $product->categories()->attach($category->id);
            }
        }

        if ($tags != null) {
            foreach ($tags as $tagName) {
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

            if ($productDestroy->images) {
                foreach ($productDestroy->images as $image) {
                    Storage::delete('public/' . $image->image);
                    $image->delete();
                }
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
        if($data['short_description']){
            $data['short_description'] = $this->handleShortDescription($data['short_description']);
        }
        
        if($data['additional']){
            $extraction = new extractData();
            $extractedData = $extraction->extractData($data['additional']);
            $data['watt'] = $extractedData['watt'];
            $data['lumen'] = $extractedData['lumen'];
            $data['kelvin'] = $extractedData['kelvin'];
        }

        $data['slug'] = Str::slug(Transliterator::transliterate($data['title']), '-').'-'.$id;
        $categories = $data['categories'];
        $tags = $data['tags'];
        $additional_products = $data['additional_products'];

        // remove additional_products from data
        unset($data['additional_products']);
        unset($data['categories']);
        unset($data['tags']);
        $product = Product::find($id);
        $product->update($data);

        $categoryIds = [];
        foreach ($categories as $categoryName) {
            $slug = Str::slug(Transliterator::transliterate($categoryName), '-');
            $category = Category::firstOrCreate(['title' => $categoryName], ['isActive' => 1, 'slug' => $slug]);
            $categoryIds[] = $category->id;
        }
        $product->categories()->sync($categoryIds);

        if ($tags != null) {
            $tagIds = [];
            // Update or attach tags
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['title' => $tagName], ['visible' => 0]);
                $tagIds[] = $tag->id;
            }
            $product->tags()->sync($tagIds);
        }

        // Update or attach additional products
        if ($additional_products != null){
            $tagAddIds = [];
            foreach ($additional_products as $additionalProductName) {
                $additionalProduct = Tag::firstOrCreate(['title' => $additionalProductName], ['visible' => 0]);
                $tagAddIds[] = $additionalProduct->id;
            }
            $product->additional_tags()->sync($tagAddIds); // Sync additional products without detaching existing ones
        }
        return redirect()->route('admin.products.index', ['page' => $data['page']])
            ->with('message', 'Product updated successfully');
    }

    private function handleShortDescription($shortDescription){
        // Process Short description images
        preg_match_all('/src="([^"]*)"/', $shortDescription, $matches);

        foreach ($matches[0] as $value) { // Process Short description images
            $encode = substr($value, 5, strlen($value) - 6); // Get the base64 encoded image
            $decoder = new Base64ImageDecoder($encode, ['jpeg', 'jpg', 'png', 'gif']); // Decode the image
            $fileName = 'images/' . Carbon::now()->format('Y-m-d_His') . '.' . $decoder->getFormat(); // Get the file name
            Storage::put($fileName, $decoder->getDecodedContent()); // Save the image
            $shortDescription = str_replace($encode, asset('storage/' . $fileName), $shortDescription); // Replace the image with the new image
        }
        return $shortDescription;
    }
}

