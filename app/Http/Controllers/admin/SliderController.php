<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::find(1);
        return view('admin.slider.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $image = Storage::put('/images', $data['image']);
        $data['image'] = $image;
        Slider::create($data);
        return redirect()->route('admin.sliders.index');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', ['category' => $slider]);
    }

    public function update($slider, Request $request)
    {
        $data = $request->all();
        $slider = Slider::find($slider);
        $image = Storage::put('/images', $data['image']);
        $slider->update([
           'title' => $data['title'],
            'subtitle' =>$data['subtitle'],
            'href'=>$data['href'],
            'image' => $image
        ]);
        return redirect()->back();
    }

    public function show($id) {
    }

}
