<?php

namespace App\Http\Livewire\Admin\Slider;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Slider;


class Create extends Component
{

    public Slider $slider;

    public string $title = '';
    public string $subtitle = '';
    public string $href = '';

    /*protected $rules = [
        'slider.href' => 'string',
        'slider.title' => 'string',
        'slider.subtitle' => 'string',
        'image' => 'file'
    ];*/

    public function mount(Slider $slider)
    {
        $this->slider = $slider;

    }

    public function uploadImage()
    {
        dd(request()->file('image'));
    }


    public function submit()
    {
        $data = $this->validate();
        $slider = Slider::create([
            'subtitle'=>$this->subtitle,
            'title'=>$this->title,
            'href'=>$this->href,
            'image'=>'asdfsaf'
        ]);
        return redirect()->route('admin.slider.index');
    }

    protected function rules(): array
    {
        return [
            'slider.href' => [
                'string'
            ],
            'slider.title' => [
                'string'
            ],
            'slider.subtitle' => [
                'string'
            ],
        ];
    }

    public function render()
    {
        return view('livewire.admin.slider.create');
    }

}
