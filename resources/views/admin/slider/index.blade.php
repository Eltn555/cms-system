@extends('admin')
@section('content')

    <h2 class="intro-y text-lg font-medium mt-10">
        Slider
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary shadow-md mr-2">Add New Slider Item</a>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
            @livewire('admin.slider.slider')
    </div>

@endsection
