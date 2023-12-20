<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        dd($request);
        $request->validate([
            'title' => 'required',
            'short_description' => 'nullable',
            'long_description' => 'nullable',
            'price' => 'required',
            'category_id' => 'required',
            'additional' => 'nullable',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,svg|max:5120',
        ]);
//        $file = $request->file('image');
//        $path = Storage::putFile('/images', $request->file('image'));


//        $data = $request->all();
//        $data['image'] = Storage::put('/images', $request['image']);

        foreach ($request->image as $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $filesize = $file->getSize();
            $file->storeAS('public/', $filename);
            $fileModel = new  Product;
            $fileModel->name = $filename;
            $fileModel->size = $filesize;
            $fileModel->location = 'storage/' . $filename;
            $fileModel->save();
        }
        Product::create($request);

        return redirect()->route('products.index')->with('message', "This is Success Created");
    }
}
