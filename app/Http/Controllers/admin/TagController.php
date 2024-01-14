<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    public function show($id) {
        $tag = Tag::find($id);
        $products = $tag->products;
        foreach ($products as $product){
        }
        return view('admin.tag.show', compact('tag', 'products'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'title'=>'required'
        ]);
        $data['visible'] = 1;
        Tag::create($data);
        return redirect()->route('admin.tags.index');
    }
}
