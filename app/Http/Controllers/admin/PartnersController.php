<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $image = Storage::put('/images', $data['image']);

        Partner::create([
            'image' => $image
        ]);

        return redirect()->back();
    }
}
