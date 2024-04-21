<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Category;
use Behat\Transliterator\Transliterator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index() {
        $categories = BlogCategory::all();
        return view('admin.blog.category.index', compact('categories'));
    }

    public function update(Request $request, BlogCategory $category): array
    {
        $field = $request->input('field');
        $value = $request->input('value');
        $data = [$field => $value];

        $category->update($data);
        return ['response' => $value];
    }

    public function create() {
        return view('admin.blog.category.create');
    }

    public function store(Request $request) {
        $data = $request->all();
        BlogCategory::create($data);
        return redirect()->route('admin.blog.categories.index');
    }

    public function destroy($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();

        return [
            'response' => "Category deleted successfully"
        ];
    }
}
