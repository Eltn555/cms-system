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

    }

    public function uploadImage()
    {
        dd(request()->file('image'));
    }


    public function submit()
    {
        $this->validate();

        $this->slider->save();

        return redirect()->route('admin.slider.index');
    }

    protected function rules(): array
    {
        return [
            'slider.href' => [
                ''
            ],
            'slider.title' => [
                ''
            ],
            'slider.subtitle' => [
                ''
            ],
        ];
    }

    public function render()
    {
        return view('livewire.admin.slider.create');
    }

}
