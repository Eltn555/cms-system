<?php

namespace App\Http\Controllers\admin;

use App\Models\Tag;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }
}
