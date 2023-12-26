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
        $categories = Category::all();
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
        $images = $data['images'];
        unset($data['images']);
        if ($data['order_id'] == null){
            unset($data['order_id']);
        }

        array_key_exists('is_active', $data) ? $data['is_active'] = 1 : $data['is_active'] = 0;

        $created = Category::create($data);

        foreach ($images as $key => $image){
            $name = Storage::put('public/', $image);
            $img = Image::create([
                'image'=> $name,
                'alt' =>$data['title'] . $key+1
            ]);
            CategoryImage::create([
                'category_id'=> $created->id,
                'image_id' => $img->id
            ]);
        }
        return 'sample created';
        // return redirect()->route('categories.index')->with('success', 'Category created successfully');
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

        $category->update($data);

        return [
            'response' => "Category updated successfully"
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
