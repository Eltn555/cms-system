<?php

namespace App\Http\Livewire\Admin\Slider;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Slider;


class Create extends Component
{

    public Slider $slider;

    public function mount(Slider $slider)
    {
        $this->slider = $slider;
        dd($this->slider);

    }

    public function uploadImage()
    {
        dd(request()->file('image'));
    }


    public function submit()
    {
        $this->validate();
        $this->slider->save();
        return 'Works';
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
