<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryImage;
use App\Models\Image;
use Behat\Transliterator\Transliterator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;

// Make sure to import your Category model

class CategoriesController extends Controller
{
    // Show all categories
    public function index()
    {
//        $products = Product::all();
//        foreach ($products as $product) {
//            $category = Category::find($product->category_id);
//            if ($category) {
//                $product->categories()->attach($category->id);
//            }
//        }
        $categories = Category::orderBy('order_id', 'asc')->get();
        $icon = '';
        $background = '';
        return view('categories.index', compact('background','icon','categories'));
    }

    // Show a specific category
    public function show($id)
    {
        $category = Category::findOrFail($id);
       return view('categories.show', ['category' => $category]);

    }

    // Add other CRUD methods as needed (create, store, edit, update, delete)

    // Show the form to create a new category
    public function create()
    {
        return 'create';
//        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->except(['images', 'icon', 'background']);
        $data['slug'] = Str::slug(Transliterator::transliterate($data['title']), '-');
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['image'] = $request->has('image') ? 1 : 0;

        if (empty($data['order_id'])) {
            unset($data['order_id']);
        }

        $category = Category::create($data);

        $this->storeImage($category, $request->file('icon'), 'icon');
        $this->storeImage($category, $request->file('background'), 'background');

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }

    public function image(Request $request)
    {
        $placeImg = $request->has('icon') ? 'icon' : 'background';
        $category = Category::findOrFail($request->input('id'));

        $category->images->first(fn($image) => strpos($image->alt, $placeImg) !== false)?->delete();

        $this->storeImage($category, $request->file($placeImg), $placeImg);

        return ['Response' => 'Image uploaded successfully.'];
    }

    protected function storeImage($category, $file, $type)
    {
        if ($file) {
            $imageName = Storage::put('images', $file);
            $image = Image::create([
                'image' => $imageName,
                'alt' => $type . " " . $category->title,
            ]);
            CategoryImage::create([
                'category_id' => $category->id,
                'image_id' => $image->id
            ]);
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category): array
    {
        $field = $request->input('field');
        $value = $request->input('value');
        $data = [$field => $value];

        if ($field === 'title') {
            $data['slug'] = Str::slug(Transliterator::transliterate($value), '-');
        }elseif ($field === 'images'){
            $data['image'] = $value;
        }
        $category->update($data);
        return ['response' => $value];
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return [
            'response' => "Category deleted successfully"
        ];
    }
}
