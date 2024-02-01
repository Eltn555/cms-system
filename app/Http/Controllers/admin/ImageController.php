<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        // Fetch all images from the database
        $images = Image::all();

        // Return the view with the images
        return view('admin.images.index', compact('images'));
    }

    public function create()
    {
        // Return the view for creating a new image
        return view('admin.images.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new image
        // Example: $image = Image::create($request->all());

        // Redirect to the index page
        return redirect()->route('admin.images.index');
    }

    public function edit(Image $image)
    {
        // Return the view for editing an existing image
        return view('admin.images.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        // Validate and update the image
        // Example: $image->update($request->all());

        // Redirect to the index page
        return redirect()->route('admin.images.index');
    }

    public function delete(Request $request)
    {
        $id = $request->input('ID');
        // Delete the image
        Image::destroy($id);

        // Redirect to the index page
        return ['Response' => 'Image deleted with id:'.$id];
    }

    public function destroy(Image $image)
    {
        // Delete the image
         $image->delete();

        // Redirect to the index page
        return redirect()->route('admin.images.index');
    }
}
