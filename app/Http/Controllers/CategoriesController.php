<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
        $validatedData = $request->validate([
            'title' => 'required|unique:categories|max:255',
            'description' => 'nullable',
            // Add validation rules for other fields as needed
        ]);

        Category::create($validatedData);

        return 'sample created';
//        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    // Show the form to edit a specific category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    // Update the specified category in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|unique:categories,title,' . $id,
            'description' => 'nullable',
            // Add validation rules for other fields as needed
        ]);

        $category = Category::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    // Remove the specified category from the database
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
