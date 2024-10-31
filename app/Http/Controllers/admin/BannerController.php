<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.banner.create', compact('tags'));
    }

    public function edit($id) {
        $banner = Banner::find($id);
        $tags = Tag::all();
        return view('admin.banner.edit', compact('banner', 'tags'));
    }

    public function update(Banner $banner, Request $request) {

        $banner->title = $request->title;
        $banner->tag_id = $request->tag_id;

        if ($request->hasFile('image')) {
            // Store the new image file
            $imagePath = Storage::put('/images', $request['image']);
            // Update the blog's image path
            $banner->image = $imagePath;
        }

        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $image = Storage::put('/images', $data['image']);
        unset($data['image']);
        $data['image'] = $image;
        Banner::create($data);
        return redirect()->route('admin.banner.index');
    }

    public function destroy(Banner $banner) {
        $banner->delete();
        return redirect()->route('admin.banner.index');
    }
}
