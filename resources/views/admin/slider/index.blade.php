@extends('admin')
@section('content')

    <h2 class="intro-y text-lg font-medium mt-10">
        Slider
    </h2>

    <div class="intro-y box lg:mt-5 w-2/3 2xl:w-full">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                Display Information
            </h2>
        </div>
        <div class="p-5">
            <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col-reverse xl:flex-row flex-col">
                    <div class="flex-1 mt-6 xl:mt-0">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-10 2xl:col-span-8">
                                <div>
                                    <label for="slider-title" class="form-label">Slider Title</label>
                                    <input id="slider-title" type="text" class="form-control" name="title"
                                           placeholder="Slider Title" value="{{ $slider->title }}">
                                </div>
                                <div class="mt-3">
                                    <label for="slider-subtitle" class="form-label">Slider Subtitle</label>
                                    <input id="slider-subtitle" type="text" class="form-control" name="subtitle"
                                           placeholder="Slider Subtitle" value="{{ $slider->subtitle }}">
                                </div>
                                <div class="mt-3">
                                    <label for="slider-link" class="form-label">Slider Link</label>
                                    <input id="slider-link" type="text" class="form-control" name="href"
                                           placeholder="https://www.lumenlux.uz" value="{{ $slider->href }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
                    </div>
                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                        <div
                            class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                <img id="profile" class="rounded-md" alt="Midone - HTML Admin Template"
                                     src="{{ asset('storage/' . $slider->image) }}">
                                <div
                                    class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" icon-name="x" data-lucide="x"
                                         class="lucide lucide-x w-4 h-4">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </div>
                            <div class="mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                <input type="file" name="image" id="input-file"
                                       class="w-full h-full top-0 left-0 absolute opacity-0">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('script')

    <script>
        let profile = document.getElementById("profile");
        let inputFile = document.getElementById("input-file");

        inputFile.onchange = function () {
            profile.src = URL.createObjectURL(inputFile.files[0]);
        }
    </script>

@endsection
