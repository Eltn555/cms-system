<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index() {
        $categories = BlogCategory::all();
        return view('admin.blog.category.index', compact('categories'));
    }

    public function create() {
        return view('admin.blog.category.create');
    }

    public function store(Request $request) {
        $data = $request->all();
        BlogCategory::create($data);
        return redirect()->route('admin.blog.categories.index');
    }
}
