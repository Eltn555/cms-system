<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryImage;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Make sure to import your Category model

class CategoriesController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = Category::orderBy('order_id', 'asc')->get();
        return view('categories.index', compact('categories'));
    }

    // Show a specific category
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $data = '';

        foreach ($category->images as $image){
            $data .= '<img src="'.  asset('storage/' . $image->image) . '" alt="' . $image->alt .'"> <br><br>';
        }
        return $data;
//        return view('categories.show', ['category' => $category]);

    }

    // Add other CRUD methods as needed (create, store, edit, update, delete)

    // Show the form to create a new category
    public function create()
    {
        return 'create';
//        return view('categories.create');
    }

    // Store a newly created category in the database
    public function store(Request $request)
    {
        $data = $request->all();
        $icon = $data['icon'];
        $background = $data['background'];
        unset($data['images']);
        unset($data['icon']);
        unset($data['background']);
        if ($data['order_id'] == null){
            unset($data['order_id']);
        }

        $name = Storage::put('images', $icon);
        $icon = Image::create([
            'image' => $name,
            'alt' => "icon " . $data['title'],
        ]);
        $name2 = Storage::put('images', $background);
        $background = Image::create([
            'image' => $name2,
            'alt' => "background " . $data['title'],
        ]);

        array_key_exists('is_active', $data) ? $data['is_active'] = 1 : $data['is_active'] = 0;

        $created = Category::create($data);
        CategoryImage::create([
            'category_id' => $created->id,
            'image_id' => $icon->id
        ]);
        CategoryImage::create([
            'category_id' => $created->id,
            'image_id' => $background->id
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }

    public function image(Request $request){
            $placeImg = $request->has('icon') ? 'icon' : 'background';
            $value = $request->file($placeImg);

            $category = Category::findOrFail($request->input('id'));

            $existingImage = $category->images->first(fn($image) => strpos($image->alt, $placeImg) !== false);
            if ($existingImage) {
                $existingImage->delete();
            }

            $name = Storage::put('images', $value);
            $img = Image::create([
                'image' => $name,
                'alt' => $placeImg . " " . $category->title,
            ]);
            CategoryImage::create([
                'category_id' => $category->id,
                'image_id' => $img->id
            ]);

            return [
                'Response' => 'Image uploaded successfully.',
            ];
    }

    // Show the form to edit a specific category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    // Update the specified category in the database
    public function update(Request $request, Category $category): array
    {
        $field = $request->input('field');
        $value = $request->input('value');

        $data = [
            $field => $value,
        ];
        if ($field != 'image'){
            $category->update($data);
        } else{
            unset($data['images']);
            $name = Storage::put('public/storage', $value);
            $img = Image::create([
                'image'=> $name,
                'alt' =>$category->title,
            ]);
            CategoryImage::create([
                'category_id'=> $category->id,
                'image_id' => $img->id
            ]);
        }


        return [
            'response' => $value,
        ];
    }

    // Remove the specified category from the database
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return [
            'response' => "Category deleted successfully"
        ];
    }
}
