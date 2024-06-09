<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request) {
        $perPage = $request->input('perPage', 10);
        if (request()->has('category')){
            $news = Blog::where('category_id', $request['category'])->orderBy('created_at', 'desc')->paginate($perPage);
        }else{
            $news = Blog::orderBy('created_at', 'desc')->paginate($perPage);
        }
        foreach ($news as $item) {
            $item->created_at = Carbon::parse($item->created_at);
        }
        return view('admin.blog.index', compact('news', 'perPage'));
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
        $data['author_id'] = auth()->user()->id;
        Blog::create($data);
        return redirect()->route('admin.blog.index');
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        // Update the blog record with the new data
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->content = $request['content'];

        // Check if a new image file was uploaded
        if ($request->hasFile('image')) {
            // Store the new image file
            $imagePath = Storage::put('/images', $request['image']);
            // Update the blog's image path
            $blog->image = $imagePath;
        }

        // Save the updated blog record
        $blog->save();

        // Redirect back with success message
        return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully.');

    }

    public function edit($id)
    {
        $categories = BlogCategory::all();
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function show($id) {
        $news = Blog::find($id);
        $date = Carbon::parse($news->created_at);
        return view('admin.blog.show', compact('news', 'date'));
    }

    public function destroy($id)
    {
        $category = Blog::findOrFail($id);
        $category->delete();

        return [
            'response' => "News/Blog deleted successfully"
        ];
    }
}
