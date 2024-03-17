<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index() {
        $news = Blog::all();
        return view('admin.blog.index', compact('news'));
    }

    public function create() {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request) {
        $data = $request->all();
        /*$data['content'] = htmlspecialchars($data['content']);*/
        $image = Storage::put('/images', $data['image']);
        unset($data['image']);
        $data['image'] = $image;
        Blog::create($data);
        return redirect()->route('admin.blog.index');
    }

    public function show($id) {
        $news = Blog::find($id);
        $date = Carbon::parse($news->created_at);
        return view('admin.blog.show', compact('news', 'date'));
    }
}
