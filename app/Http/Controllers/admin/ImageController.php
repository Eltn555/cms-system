<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    public function upload(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imageIds = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('uploads', 'public');
                $image = Image::create([
                    'image' => $path,
                    'alt' => $file->getClientOriginalName(),
                ]);
                $imageIds[] = $image->id;
            }
        }
        return response()->json(['image_ids' => $imageIds]);
    }

    public function video(Request $request){
        $fileName = preg_replace('/[^A-Za-z0-9\-_\.]/', '_', $request->fileName);
        $chunkIndex = $request->chunkIndex;
        $totalChunks = $request->totalChunks;
        $file = $request->file('video');

        $tempPath = storage_path("app/temp_uploads/{$fileName}");
        if (!file_exists($tempPath)) {
            mkdir($tempPath, 0777, true);
        }

        $file->move($tempPath, "chunk_{$chunkIndex}");

        if (count(scandir($tempPath)) - 2 == $totalChunks) {
            $finalPath = storage_path("/app/public/videos/{$fileName}");
            $finalFile = fopen($finalPath, "wb");

            for ($i = 0; $i < $totalChunks; $i++) {
                $chunkFile = file_get_contents("$tempPath/chunk_$i");
                fwrite($finalFile, $chunkFile);
            }

            fclose($finalFile);
            File::deleteDirectory(storage_path("app/temp_uploads/{$fileName}"));

            return response()->json([
                "message" => "Upload complete!",
                "video_path" => asset("storage/videos/{$fileName}"),
                "name" => $finalPath
            ]);
        }

        return response()->json(["message" => "Chunk {$chunkIndex} uploaded"]);
    }

    public function getVideoPath(Request $request)
    {
        $fileName = $request->query('fileName');
        $videoPath = asset("storage/videos/{$fileName}");

        return response()->json(["video_path" => $videoPath]);
    }
}
