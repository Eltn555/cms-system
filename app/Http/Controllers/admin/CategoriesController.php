<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;

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
        return 'show';
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
        try {
            $validatedData = $request->validate([
                'parent_category_id' => 'nullable|integer',
                'order_id' => 'nullable|integer',
                'title' => 'required',
                'description' => 'nullable|unique:categories|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
                'seo_title' => 'nullable',
                'seo_description' => 'nullable',
                'is_active' => 'required|integer',
                // Add validation rules for other fields as needed
            ]);

            $imagePath = $request->file('image')->store('images', 'public');

            Category::create($validatedData);

            return 'sample created';
            // return redirect()->route('categories.index')->with('success', 'Category created successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function image(Request $request) {
        $file = $request->file('image');
        // Process the file, save it, etc.

        $imagePath = $request->file('image')->store('images', 'public');

        return response()->json([
            'message' => $imagePath,
            // Include any other response data you need
        ]);
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
